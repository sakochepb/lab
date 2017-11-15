<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 03/10/17
 * Time: 16:39
 */
namespace DIC;

use Database\Connection;

class Model
{

    private $connection;
    private $uniqid;


    public function __construct(Connection $connection, $suite = []){
        $this->connection = $connection;
        $this->uniqid = uniqid();
    }

}