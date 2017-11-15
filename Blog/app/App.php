<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 14/09/17
 * Time: 14:40
 */


use Core\Config;
use Core\Database\MysqlDatabase;



class App
{



    private static $_instance ;

    public $title = "WebSite to use";
    private static $db_instance;




    public static function load(){

        session_start();

        require ROOT.'/app/Autoloader.php';
        App\Autoloader::register();

        require  ROOT.'/core/Autoloader.php';
        Core\Autoloader::register();

    }



    public static function getInstance(){

        if(self::$_instance === null){

            self::$_instance = new App();
        }

            return self::$_instance;

     }


    /**
     * @param $name Factory des classe tables.... ???? pourquoi ici je sais pas
     * @return mixed
     */
    public  function getTable($name){


        $class_name = 'App\\Table\\'.ucfirst($name).'Table';

        return new  $class_name($this->createDb());//injection de dépendance via factory
    }



    public  function createDb(){



        $config = Config::getInstance(ROOT.'/config/config.php');

        if(is_null( self::$db_instance)){

            self::$db_instance =   new MysqlDatabase($config->get("db_name"),$config->get("db_user"), $config->get('db_pass'), $config->get("db_host"));


        }

        return    self::$db_instance;

    }



    public function setTitle(){

    }





}