<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 19/10/17
 * Time: 15:30
 */

namespace App;


class FragmentCaching
{


    /**
     * @var CacheAdapterInterface
     */
    private $cache;


    public function __construct(CacheAdapterInterface $cache){




        $this->cache = $cache;


    }

    /**
     * @param $key
     * @param callable $callback
     *
     *
     */
    public function cache($key, callable $callback){
        $value = $this->cache->get($key);

        if($value){
            echo $value;
        }else{

            $callback();
        }
    }

}