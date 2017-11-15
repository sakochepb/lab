<?php

class Query{


    public static function __callStatic($nameMethode, $args){


        $query = new \Core\Database\QueryBuilder();
      return  call_user_func_array([$query,$nameMethode],$args);

    }


}