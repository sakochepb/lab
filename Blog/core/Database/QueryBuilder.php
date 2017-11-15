<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 21/09/17
 * Time: 12:21
 */

namespace Core\Database;


class QueryBuilder
{


    private  $fields= [];
    private  $conditions = [];
    private  $from = [];



        public function select(){


            $this->fields =func_get_args();

            var_dump($this->fields);
                return $this;

        }
    public function where(){


        foreach(func_get_args() as $arg){
            $this->conditions[] = $arg;
        }

        return $this;

    }

    public function from($table, $alias){



        if(is_null($alias)){
            $this->from[] = $table;
        }else{
            $this->from[] ="$table AS $alias";
        }

        return $this;

    }

    public function __toString(){



        return 'SELECT '. implode(', ', $this->fields)
            .' FROM '. implode(', ', $this->from)
        .' WHERE '. implode(' AND ', $this->conditions);

    }



}