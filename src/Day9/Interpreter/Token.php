<?php
namespace AdventOfCode\Day9\Interpreter;

class Token
{
    const T_GROUP_START = 'T_GROUP_START';
    const T_GROUP_END = 'T_GROUP_END';
    const T_GROUP_SEPARATOR = 'T_GROUP_SEPARATOR';
    const T_GARBAGE = 'T_GARBAGE';

    /**
     * @var string
     */
    protected $type;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * Token constructor.
     * @param string $type
     * @param mixed $value
     */
    public function __construct(string $type, $value = null)
    {
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('[%s] => %s', $this->getType(), $this->getValue());
    }
}