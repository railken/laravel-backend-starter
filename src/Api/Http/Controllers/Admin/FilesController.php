<?php
namespace Api\Http\Controllers\Admin;

use Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Core\File\FileManager;
use Api\Http\Controllers\Traits as RestTraits;
use Api\Http\Controllers\RestController;
use Railken\Bag;
use Illuminate\Support\Collection;

class FilesController extends RestController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestShowTrait;
    use RestTraits\RestRemoveTrait;


    protected static $query = [
        'id',
        'storage',
        'type',
        'path',
        'status',
        'checksum',
        'permission',
        'access',
        'user_id',
        'expire_at',
        'created_at',
        'updated_at'
    ];

    protected static $fillable = [
        'storage',
        'type',
        'path',
        'status',
        'checksum',
        'permission',
        'access',
        'user_id',
        'expire_at',
    ];

    /**
     * Construct
     *
     */
    public function __construct(FileManager $manager)
    {
        $this->manager = $manager;
        parent::__construct();
    }


    /**
     * Upload a file.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $manager = $this->manager;

        $params = new Bag($request->all());

        $result = $manager->create([
            'storage' => 'disk',
            'type' => $params->get('type', 'default'),
            'path' => $manager->upload(
                $params->get('type', 'default'), 
                $manager->decode('base64_decode', $params->get('content')), 
                $params->get('filename', null),
                $params->get('extension', null),
                $params->get('access', 'private')
            ),
            'expire_at' => $params->get('expire_at', null),
            'permission' => null,
            'access' => $params->get('access', 'private'),
            'status' => 'pending'
        ]);

        if (!$result->ok()) {
            return $this->error(['errors' => $result->getSimpleErrors()]);
        }

        return $this->success(['resource' => $this->manager->serializer->serialize($result->getResource(), $this->keys->selectable)->toArray()]);
    }


    /**
     * Create a new instance for query
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function getQuery()
    {
        return $this->manager->repository->getQuery();
    }
}
