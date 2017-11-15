<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 19/10/17
 * Time: 15:41
 */

namespace App;


interface CacheAdapterInterface
{
    public function get($key);

}