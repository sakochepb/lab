<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 04/10/17
 * Time: 17:14
 */
namespace App;

interface CacheInterface
{
    public function get($key);

    public function has($key);

    public function set($key, $value, $expiration = 3600);
}