<?php

namespace iamraccoon\brainfuck;

/**
 * Class AbstractBuilder
 */
abstract class AbstractBuilder
{
    /**
     * @param string $char
     * @return int
     */
    public function getNecessaryAsciiCode($char)
    {
        return ord($char);
    }

    /**
     * @param int $necessaryAsciiCode
     * @return mixed
     */
    abstract public function getCountFirstLetters($necessaryAsciiCode);

    /**
     * @param int $necessaryCode
     * @param int $countFirstLetters
     * @return mixed
     */
    abstract public function getCountLoopLetters($necessaryCode, $countFirstLetters);

    /**
     * @param string $resultingString
     * @param int $ensureAsciiCode
     * @return mixed
     */
    abstract public function getCountLastLetters($resultingString, $ensureAsciiCode);

    /**
     * @param int $countFirstSymbols
     * @return mixed
     */
    abstract public function getFirstLetters($countFirstSymbols);

    /**
     * @param int $countLoopSymbols
     * @return mixed
     */
    abstract public function getLoopLetters($countLoopSymbols);

    /**
     * @param int $countLastSymbols
     * @return mixed
     */
    abstract public function getLastLetters($countLastSymbols);
}
