<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 21/09/17
 * Time: 15:04
 */

namespace DesignPattern\Interfaces;




class Session implements SessionInterface , \Countable, \ArrayAccess
{


    public function __construct(){
        session_start();

    }
    public function get($key)
    {

        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return null;
        }

    }

    public function set($key, $value)
    {
        return $_SESSION[$key] = $value;
    }

    public function delete($key)
    {
          unset( $_SESSION[$key]);
    }

    public function count()
    {
       return 4;
    }


    public function offsetExists($offset) {

                return isset($_SESSION[$offset]);
    }

    public function offsetGet($offset) {

            return $this->get($offset);
        }
        public function offsetSet($offset, $value) {
         return $this->set($offset, $value);
        }
        public function offsetUnset($offset) {
            return $this->delete($offset);
        }
};