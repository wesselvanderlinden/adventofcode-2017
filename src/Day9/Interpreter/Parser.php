<?php
namespace AdventOfCode\Day9\Interpreter;

use AdventOfCode\Day9\Interpreter\Node\Garbage;
use AdventOfCode\Day9\Interpreter\Node\Group;
use AdventOfCode\Day9\Interpreter\Node\NodeInterface;

class Parser
{
    /**
     * @var Lexer
     */
    protected $lexer;

    /**
     * @var Token|null
     */
    protected $currentToken;

    /**
     * Parser constructor.
     * @param Lexer $lexer
     */
    public function __construct(Lexer $lexer)
    {
        $this->lexer = $lexer;
    }

    /**
     * @return NodeInterface
     * @throws \Exception
     */
    public function parse(): NodeInterface
    {
        $this->currentToken = $this->lexer->getNextToken();

        return $this->group();
    }

    /**
     * @return NodeInterface
     * @throws \Exception
     */
    protected function group(): NodeInterface
    {
        $this->eat(Token::T_GROUP_START);

        $children = [];
        $garbage = null;

        while ($this->currentToken->getType() !== Token::T_GROUP_END) {
            switch ($this->currentToken->getType()) {
                case Token::T_GROUP_START:
                    $children[] = $this->group();
                    break;

                case Token::T_GARBAGE:
                    $garbage = $this->garbage();
                    break;

                case Token::T_GROUP_SEPARATOR:
                    $this->eat(Token::T_GROUP_SEPARATOR);
                    break;

                default:
                    throw new \Exception('wtf');
            }
        }

        $this->eat(Token::T_GROUP_END);

        return new Group($children, $garbage);
    }

    /**
     * @return NodeInterface
     * @throws \Exception
     */
    protected function garbage(): NodeInterface
    {
        $garbage = new Garbage($this->currentToken->getValue());
        $this->eat(Token::T_GARBAGE);

        return $garbage;
    }

    /**
     * @param string $expectedType
     * @throws \Exception
     */
    protected function eat(string $expectedType)
    {
        if ($this->currentToken !== null && $this->currentToken->getType() === $expectedType) {
            $this->currentToken = $this->lexer->getNextToken();
        } else {
            $actualType = $this->currentToken === null ? 'null' : $this->currentToken->getType();
            throw new \Exception(sprintf('Invalid syntax, expected token %s but got %s', $expectedType, $actualType));
        }
    }
}