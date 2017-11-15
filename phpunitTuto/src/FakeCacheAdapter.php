<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 19/10/17
 * Time: 15:44
 */

namespace App;


class FakeCacheAdapter implements CacheAdapterInterface
{
    public function get($key)
    {
       return false;
    }

}