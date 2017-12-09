<?php
namespace AdventOfCode\Day9\Interpreter\Node;

class Garbage implements NodeInterface
{
    /**
     * @var string
     */
    protected $value;

    /**
     * Garbage constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}