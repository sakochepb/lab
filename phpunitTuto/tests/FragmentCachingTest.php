<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 19/10/17
 * Time: 15:27
 */
class FragmentCachingTest extends PHPUnit_Framework_TestCase
{


    /*
     * $cache = new FragmentCaching($cacheAdapter)
     * $cache->cache('test',function(){ ... })
     */


    public function testConstructorWithoutInterface(){

        $this->expectException(PHPUnit_Framework_Error::class);
        new App\FragmentCaching(new stdClass());
    }

    public function testConstructorWithInterface(){


        new App\FragmentCaching(new \App\FakeCacheAdapter());
    }

    /**
     * @test
     */
    public function testCacheWithCache(){


        /**
         * pour les test on abesoind e modifier ce que fais la fonction
         * on tuilise donc des mock de faux objets
         */
        $cacheAdapter = $this->getMockBuilder('FakeCacheAdapter')->setMethods(['get'])->getMock();
        $cacheAdapter->method('get')->willReturn('en cache');


        $cache = new \App\FragmentCaching($cacheAdapter);

        $this->expectOutputString('en cache');

        $cache->cache('test', function(){echo "salut";});

    }


    public function  testCacheWithoutCache(){


    }

}