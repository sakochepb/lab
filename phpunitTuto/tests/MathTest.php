<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 19/10/17
 * Time: 15:01
 */
class MathTest extends PHPUnit_Framework_TestCase
{


    public function testDouble(){



        //dire a quoi on s'attend on le fait grace au assertion

        $this->assertEquals(10,\App\Math::double(5));


    }




}