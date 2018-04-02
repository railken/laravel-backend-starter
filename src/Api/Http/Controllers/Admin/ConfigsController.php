<?php
namespace Api\Http\Controllers\Admin;

use Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Core\Config\ConfigManager;
use Api\Http\Controllers\Traits as RestTraits;
use Api\Http\Controllers\RestController;

class ConfigsController extends RestController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestCreateTrait;

    protected static $query = [
        'id',
        'key',
        'value',
        'created_at',
        'updated_at',
    ];

    protected static $fillable = [
        'key',
        'value',
    ];

    /**
     * Construct
     *
     */
    public function __construct(\Core\Config\ConfigManager $manager)
    {
        $this->manager = $manager;
        parent::__construct();
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

    /**
     * Create a resource
     *
     * @param integer $id
     * @param \Illuminate\Http\Request $request
     *
     * @return response
     */
    public function create(Request $request)
    {
        $resource = $this->manager->getRepository()->newQuery()->where('key', $request->input('key'))->first();

        $before = $resource ? $this->manager->serializer->serialize($resource)->toArray() : [];

        $params = $request->only($this->keys->fillable);

        $result = $resource ? $this->manager->update($resource, $params) : $this->manager->create($params);


        if ($result->ok()) {

            $m = new \Core\Log\LogManager();
            $m->create([
                'type' => 'api',
                'category' => 'update',
                'message' => null,
                'vars' => [
                    'entity_class' => $this->manager->getRepository()->getEntity(),
                    'entity_id' => $result->getResource()->id,
                    'before' => $before,
                    'after' => $this->manager->serializer->serialize($result->getResource())->toArray(),
                    'user_id' => $this->getUser()->id
                ]
            ]);

            return $this->success([
                'resource' => $this->manager->serializer->serialize($result->getResource(), $this->keys->selectable)->all()
            ]);
        }

        return $this->error([
            'errors' => $result->getSimpleErrors()
        ]);
    }
}
