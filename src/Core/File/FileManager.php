<?php

namespace Core\File;

use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\Contracts\ParameterBagContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\ParameterBag;
use Railken\Laravel\Manager\ResultAction;
use Illuminate\Support\Facades\DB;
use Railken\Laravel\Manager\Tokens;
use Illuminate\Support\Facades\Storage;

class FileManager extends ModelManager
{

    /**
     * List of all attributes
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\Storage\StorageAttribute::class,
        Attributes\Type\TypeAttribute::class,
        Attributes\Path\PathAttribute::class,
        Attributes\Status\StatusAttribute::class,
        Attributes\Checksum\ChecksumAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\DeletedAt\DeletedAtAttribute::class,
        Attributes\UserId\UserIdAttribute::class,
        Attributes\Access\AccessAttribute::class,
        Attributes\Permission\PermissionAttribute::class,
        Attributes\ExpireAt\ExpireAtAttribute::class,
    ];

    /**
     * List of all exceptions
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\FileNotAuthorizedException::class
    ];

    /**
     * Construct
     *
     * @param AgentContract $agent
     *
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new FileRepository($this));
        $this->setSerializer(new FileSerializer($this));
        $this->setAuthorizer(new FileAuthorizer($this));
        $this->setValidator(new FileValidator($this));

        parent::__construct($agent);
    }


    /**
     * Upload a file
     *
     * @param mixed $file
     *
     * @return string path
     */
    public function upload($dir, $content, $filename = null, $ext = null, $access = 'private')
    {   

        // No filename? Generated a new one.
        if (!$filename) {
            do {
                $filename = $dir."/".str_random(32)."-".str_random(32)."-".str_random(32)."-".str_random(32);
            } while ($this->getRepository()->newQueryOneDiskPath($filename)->count() > 0);
        }

        // No extension? Try to detect
        if (!$ext) {
            Storage::disk('local')->put($filename, $content);

            $mimetype = Storage::disk('local')->mimeType($filename);
            $ext = array_search($mimetype, config('filesystems.mime_types'));
        }

        Storage::put($filename.".".$ext, $content, $access === 'public' ? 'public' : null);

        return $filename.".".$ext;
    }

    /**
     * Decode content
     *
     * @param string $encoding
     * @param string $encoded
     *
     * @return string
     */
    public function decode($encoding, $content)
    {
        switch ($encoding) {
            case 'base64': default:
                $content = preg_replace("/^data\:image\/([\w]*)\;base64\,/", "", $content);
                return base64_decode($content);
            break;
        }
    }


    /**
     * Delete a EntityContract.
     *
     * @param EntityContract $entity
     *
     * @return ResultAction
     */
    protected function delete(EntityContract $entity)
    {
        $result = new ResultAction();

        $result->addErrors($this->authorizer->authorize(Tokens::PERMISSION_REMOVE, $entity, ParameterBag::factory([])));

        if (!$result->ok()) {
            return $result;
        }

        try {
            DB::beginTransaction();
            $entity->delete();
            Storage::delete($entity->path);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return $result;
    }


}
