<?php

namespace Core\Database;
use PDO;

class MysqlDatabase extends Database
{


    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;




    public function __construct($db_name, $db_user ="root ", $db_pass= "root", $db_host = "localhost"){


        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_host = $db_host;
        $this->db_pass = $db_pass;


    }

    /**
     * centraliser la création de l'objet de connexion à la BDD ici PDO
     */
    private function getPDO():PDO{



        if($this->pdo === null){
            $pdo = new PDO('mysql:dbname=Blog;host=localhost','root','root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;

        }



        return $this->pdo;

    }


    public function query($statement, $class_name= null,$one = false):array{

       $pdoStatement =  $this->getPDO()->query($statement);

        if(strpos($statement, 'UPDATE') === 0 || strpos($statement, 'INSERT')===0 || strpos($statement, 'DELETE')===0){
            return $pdoStatement;
        }





        if($class_name === null){
            $pdoStatement->setFetchMode(PDO::FETCH_OBJ);

        }else{


            $pdoStatement->setFetchMode(PDO::FETCH_CLASS,$class_name);
        }




        if($one){
            return $pdoStatement->fetch();

        }else{
            return $pdoStatement->fetchAll();
        }


    }

    public function prepare($statement, $param, $class_name = null, $one = false){



        $pdoStatement =  $this->getPDO()->prepare($statement);


        $res = $pdoStatement->execute($param);

        if(strpos($statement, 'UPDATE')===0 || strpos($statement, 'INSERT')===0 || strpos($statement, 'DELETE')===0){
            return $res;
        }
        if($class_name === null){
            $pdoStatement->setFetchMode(PDO::FETCH_OBJ);

        }else{


            $pdoStatement->setFetchMode(PDO::FETCH_CLASS,$class_name);
        }


        if($one === false){



            return $pdoStatement->fetchAll();

        }else{



            return $pdoStatement->fetch();
        }

     }

    public function lasInsertId(){

        return $this->pdo->lastInsertId();
    }


}