<?php

namespace Bab\Euler;

use Bab\Euler\Utils;

class UtilsTest extends \PHPUnit_Framework_TestCase
{
    public function numberProvider()
    {
        return array(
            array(1, false),
            array(2, true),
            array(3, true),
            array(104729, true),
            array(104743, true),
        );
    }

    /**
     * @dataProvider numberProvider
     */
    public function testIsPrime($number, $isPrime)
    {
        $this->assertEquals($isPrime, Utils::isPrime($number));
    }
}
