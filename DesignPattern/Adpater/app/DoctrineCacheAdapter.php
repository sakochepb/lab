<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 04/10/17
 * Time: 17:15
 */

namespace App;

use Doctrine\Common\Cache\Cache;
class DoctrineCacheAdapter implements CacheInterface
{


    private $cache;

    /**
     * @param Cache $cache
     */
    public function __construct(Cache $cache){

        $this->cache = $cache;

    }


    public function get($key)
    {
        return $this->cache->fetch($key);
    }

    public function has($key)
    {
       return $this->cache->contains($key);
    }

    public function set($key, $value, $expiration = 3600)
    {
       $this->cache->save($key,$value,$expiration);
    }
}