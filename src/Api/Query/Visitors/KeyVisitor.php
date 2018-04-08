<?php

namespace Api\Query\Visitors;

use Railken\SQ\Contracts\NodeContract;
use Railken\SQ\Languages\BoomTree\Nodes as Nodes;
use Railken\Laravel\ApiHelpers\Query\Visitors\BaseVisitor;

class KeyVisitor extends BaseVisitor
{

    /**
     * @var \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    protected $manager;

    /**
     * @param \Railken\Laravel\Manager\Contracts\ManagerContract $manager
     *
     * @return $this
     */
    public function setManager($manager)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Visit the node and update the query.
     *
     * @param mixed $query
     * @param \Railken\SQ\Contracts\NodeContract $node
     * @param string                             $context
     */
    public function visit($query, NodeContract $node, string $context)
    {
        if ($node instanceof Nodes\KeyNode) {
            $key = $node->getValue();
            $keys = explode(".", $key);

            if (count($keys) === 1) {
                $keys = [$this->manager->repository->newEntity()->getTable(), $keys[0]];
            }

            $node->setValue(implode(".", $keys));
        }

        foreach ($node->getChilds() as $child) {
            $this->getBuilder()->build($query, $child);
        }
    }
}
