<?php

namespace Api\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Api\Helper\Paginator;
use Api\Helper\Filter;
use Api\Helper\Sorter;

use Api\Helper\Exceptions\FilterSyntaxException;

trait RestUpdateTrait
{

    /**
     * Display a resource
     *
     * @param integer $id
     * @param \Illuminate\Http\Request $request
     *
     * @return response
     */
    public function update($id, Request $request)
    {
        $resource = $this->manager->getRepository()->findOneById($id);

        if (!$resource) {
            return $this->not_found();
        }

        if ($request->wantsJson()) {

            $raw_content = $request->getContent();
            $content = json_decode($raw_content);

            if ($content) {
                foreach ($content as $name => $var) {
                    $request->request->set($name, $var);
                }

                $request->request->remove($raw_content);
            }

        }

        $params = $request->only($this->keys->fillable);


        $result = $this->manager->update($resource, $params);

        return $result->ok()
            ? $this->success(['resource' => $this->manager->serializer->serialize($result->getResource(), $this->keys->selectable)->all()])
            : $this->error(['errors' => $result->getSimpleErrors()]);
    }
}
