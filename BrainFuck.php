<?php

namespace iamraccoon\brainfuck;

/**
 * Class BrainFuck
 * @package iamraccoon\brainfuck
 */
class BrainFuck
{
    /**
     * @var FuckCode
     */
    private $fuck;

    /**
     * @var Director
     */
    private $director;

    /**
     * @var
     */
    private $code;

    /**
     * construct
     */
    function __construct()
    {
        $this->fuck = new FuckCode();
        $this->director = new Director($this->fuck);
    }

    /**
     * @param $string
     *
     * @return string
     */
    public function build($string)
    {
        $this->code = $this->director->build($string);

        return $this->code;
    }
} 