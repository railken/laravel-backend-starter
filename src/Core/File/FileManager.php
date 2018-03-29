<?php

namespace Core\File;

use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\Contracts\ParameterBagContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\ParameterBag;
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
        Attributes\DeletedAt\DeletedAtAttribute::class
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
    public function upload($content)
    {
        do {
            $filename = "public/uploads/".sha1(rand(2, 9999) * rand(2, 9999) * microtime(true));
        } while ($this->getRepository()->newQueryOneDiskPath($filename)->count() > 0);


        Storage::disk('local')->put($filename, $content);

        $mimetype = Storage::disk('local')->mimeType($filename);
        $ext = array_search($mimetype, config('filesystems.mime_types'));

        $mimetype = Storage::disk('local')->move($filename, $filename.".".$ext);

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
}
