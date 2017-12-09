<?php
namespace AdventOfCode\Day9\Interpreter;

class Lexer
{
    /**
     * @var string
     */
    protected $input;

    /**
     * @var int
     */
    protected $position;

    /**
     * Lexer constructor.
     * @param string $input
     */
    public function __construct(string $input)
    {
        $this->input = $input;
        $this->position = 0;
    }

    /**
     * @return Token|null
     * @throws \Exception
     */
    public function getNextToken()
    {
        while (($currentChar = $this->getCurrentChar()) !== null) {
            switch ($currentChar) {
                case '{':
                    $this->advance();
                    return new Token(Token::T_GROUP_START);

                case '}':
                    $this->advance();
                    return new Token(Token::T_GROUP_END);

                case ',':
                    $this->advance();
                    return new Token(Token::T_GROUP_SEPARATOR);

                case '<':
                    return new Token(TOKEN::T_GARBAGE, $this->readGarbage());

                default:
                    throw new \Exception('Invalid token: ' . $currentChar);
            }
        }
    }

    /**
     * @return null|string
     */
    protected function getCurrentChar()
    {
        return $this->input[$this->position] ?? null;
    }

    protected function advance()
    {
        $this->position++;
    }

    /**
     * @return string
     */
    protected function readGarbage(): string
    {
        $garbage = '';

        $this->advance();

        while (($currentChar = $this->getCurrentChar()) !== '>') {
            if ($currentChar === '!') {
                $this->advance();
            } else {
                $garbage .= $currentChar;
            }

            $this->advance();
        }

        $this->advance();

        return $garbage;
    }
}