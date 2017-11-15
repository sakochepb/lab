<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 18/09/17
 * Time: 17:55
 */

namespace Core\Auth;

use Core\Database\Database;
class DBAuth
{



    private $db;
    /**
     * @param Database $db injection dépendance
     */
            public function __construct(Database $db){

                $this->db = $db;

            }


    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password){

        $user = $this->db->prepare("SELECT * FROM users WHERE username = ?", [$username],null, true );

        if($user){
            if($user->password == sha1($password)){

                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        return false;
    }



    public function logged(){


        $logged = $_SESSION['auth'];
        if($logged){
            return true;
        }else{
            return false ;
        }

    }


    public function getUserId(){

                if($this->logged()){
                    return $_SESSION['auth'];
                }


    }







}