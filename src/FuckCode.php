<?php

namespace iamraccoon\brainfuck;

/**
 * Class FuckCode
 */
class FuckCode extends AbstractBuilder
{
    /**
     * Get the random value for first characters
     *
     * @param int $firstAttempt
     * @return int
     */
    private function getRandomCoefficientRate($firstAttempt = 1)
    {
        //TODO make smart generation #1
        if ($firstAttempt) {
            return rand(7, 18);
        }

        //TODO make smart generation #1
        return rand(2, 7);
    }

    /**
     * Get the number of the first letters
     *
     * @param int $necessaryCode
     * @return int
     */
    public function getCountFirstLetters($necessaryCode)
    {
        $k = $necessaryCode % $this->getRandomCoefficientRate();

        if (!$k) {
            $k = $this->getRandomCoefficientRate($k);
        }

        return $k;
    }

    /**
     * Get the number of the last letters
     *
     * @param string $resultingString
     * @param int $ensureAsciiCode
     * @return int
     */
    public function getCountLastLetters($resultingString, $ensureAsciiCode)
    {
        $brainArray = $this->executeLiteBrainCode($resultingString);
        $currentAsciiCode = array_pop($brainArray);

        return $ensureAsciiCode - $currentAsciiCode;
    }

    /**
     * Get the number of the loop letters
     *
     * @param int $necessaryCode
     * @param int $countFirstLetters
     * @return int
     */
    public function getCountLoopLetters($necessaryCode, $countFirstLetters)
    {
        return floor($necessaryCode / $countFirstLetters);
    }

    /**
     * Get the letters located in the loop
     *
     * @param int $count
     * @return string
     */
    public function getLoopLetters($count)
    {
        $result = '[>';
        while ($count) {
            $result .= '+';
            $count--;
        }
        $result .= '<-]';

        return $result;
    }

    /**
     * Get the letters located in the beginning of the code
     *
     * @param int $count
     * @return string
     */
    public function getFirstLetters($count)
    {
        $result = '';
        while ($count) {
            $result .= '+';
            $count--;
        }

        return $result;
    }

    /**
     * Get the letters located in the ending of the code
     *
     * @param int $count
     * @return string
     */
    public function getLastLetters($count)
    {
        $result = '>';
        while ($count) {
            $result .= '+';
            $count--;
        }
        $result .= '.';

        return $result;
    }

    /**
     * Execute brain code
     *
     * @param string $string
     * @return array
     */
    private function executeLiteBrainCode($string)
    {
        $arrayChars = str_split($string);
        $result = [];

        $i = 0;
        $count = count($arrayChars);
        for ($j = 0; $j < $count; $j++) {
            switch ($arrayChars[$j]) {
                case '+':
                    $result[$i]++;
                    break;
                case '-':
                    $result[$i]--;
                    break;
                case '>':
                    $i++;
                    break;
                case '<':
                    $i--;
                    break;
                case "[" :
                    $j = strripos($string, '[');
                    break;
                case "]" :
                    if ($result[$i]) {
                        $hasBrackets = false;
                        while (!$hasBrackets) {
                            $j--;
                            if ($arrayChars[$j] == '[') {
                                $hasBrackets = true;
                            }
                        }
                    }
                    break;
            }
        }

        return $result;
    }
}
