<?php
namespace AdventOfCode\Day9\Interpreter\Node;

class Group implements NodeInterface
{
    /**
     * @var Group[]
     */
    protected $children;

    /**
     * @var Garbage|null
     */
    protected $garbage;

    /**
     * Group constructor.
     * @param array $children
     * @param Garbage|null $garbage
     */
    public function __construct(array $children = [], Garbage $garbage = null)
    {
        $this->children = $children;
        $this->garbage = $garbage;
    }

    /**
     * @return Group[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @param Group[] $children
     * @return Group
     */
    public function setChildren(array $children): Group
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @return Garbage|null
     */
    public function getGarbage()
    {
        return $this->garbage;
    }

    /**
     * @param Garbage|null $garbage
     * @return Group
     */
    public function setGarbage(Garbage $garbage): Group
    {
        $this->garbage = $garbage;
        return $this;
    }
}