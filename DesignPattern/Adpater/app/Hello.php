<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 04/10/17
 * Time: 16:48
 */

namespace App;

class Hello
{



    protected $cache ;

    public function sayHello(CacheInterface $cache){

        $content=null;
        if($cache->has('hello')){
            return $cache->get('hello');
        }else{
            sleep(4);

            $content = "bonjour";
            $cache->set('hello',$content);
            return $content;
        }


    }
}