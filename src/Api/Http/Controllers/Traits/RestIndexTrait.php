<?php

namespace Api\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Railken\Laravel\ApiHelpers\Paginator;
use Railken\Laravel\ApiHelpers\Filter;
use Railken\Laravel\ApiHelpers\Sorter;
use Railken\Laravel\ApiHelpers\Query\Builder;
use Railken\Laravel\ApiHelpers\Query\Visitors;

use Railken\SQ\Exceptions\QuerySyntaxException;

trait RestIndexTrait
{

    /**
     * Display resources
     *
     * @param Request $request
     *
     * @return response
     */
    public function index(Request $request)
    {   
        return $this->createIndexResponseByQuery($this->getQuery(), $request);
    }

    public function createIndexResponseByQuery($query, Request $request)
    {


        \DB::enableQuerylog();
        # FilterSyntaxException
        try {

            if ($request->input('query')) {

                $query = $this->filterQuery($query, $request);
            }
            
        } catch (QuerySyntaxException $e) {
            return $this->error(["code" => "QUERY_SYNTAX_ERROR", "message" => "syntax error detected in filter"]);
        }

        # Sorter
        $sort = new Sorter();
        $sort->setKeys($this->keys->sortable->toArray());


        # Check if sort field has 
        $sort->add($request->input('sort_field', 'id'), strtolower($request->input('sort_direction', 'desc')));

        foreach ($sort->get() as $attribute)
            $query->orderBy($this->parseKey($attribute->getName()), $attribute->getDirection());


        # Select
        $select = collect(explode(",", $request->input("select", "")));

        $select->count() > 0 && 
            $select = $this->keys->selectable->filter(function($attr) use ($select) { return $select->contains($attr); });

       
        $select->count() == 0 && 
            $select = $this->keys->selectable;


        $selectable = $select
            ->map(function($key){ 
                return $this->parseKey($key);
            });

        # Pagination
        $paginator = new Paginator();
        $paginator = $paginator->paginate($query->count(), $request->input('page', 1), $request->input('show', 10));

        $resources = $query
            ->skip($paginator->get('skip'))
            ->take($paginator->get('take'))
            // ->select($selectable->toArray())
            ->get();

        $response = $this->success([
            'resources' => $resources->map(function($record) use ($select) {
                return $this->serialize($record, $select);
            }),
            'select' => $select->values(),
            'pagination' => $paginator->all(),
            'sort' => $sort
        ]);

        // print_r(\DB::getQueryLog());
        return $response;
    }

    public function filterQuery($query, $request) {

        $filter = new Filter();

        $parser = $filter->getParser();

        $builder = new Builder([]);
        $builder->setVisitors([
            (new \Api\Query\Visitors\KeyVisitor($builder))->setManager($this->manager),
            new Visitors\EqVisitor($builder),
            new Visitors\NotEqVisitor($builder),
            new Visitors\GtVisitor($builder),
            new Visitors\GteVisitor($builder),
            new Visitors\LtVisitor($builder),
            new Visitors\LteVisitor($builder),
            new Visitors\CtVisitor($builder),
            new Visitors\SwVisitor($builder),
            new Visitors\EwVisitor($builder),
            new Visitors\AndVisitor($builder),
            new Visitors\OrVisitor($builder),
            new Visitors\NotInVisitor($builder),
            new Visitors\InVisitor($builder),
            new Visitors\NullVisitor($builder),
            new Visitors\NotNullVisitor($builder),
        ]);

        try {
            $builder->build($query, $parser->parse($request->input('query')));
        } catch (\Railken\SQ\Exceptions\QuerySyntaxException $e) {
            throw new \Railken\SQ\Exceptions\QuerySyntaxException($request->input('query'));
        }

        return $query;
    }
}