<?php

/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 03/10/17
 * Time: 16:45
 */
namespace DIC;
class DIC
{



    public $registry = [];
    private $instances= [];
    private $factories = [];

    /**
     * @param $key
     * @param callable $resolver
     */
    public function set($key, Callable $resolver){


        $this->registry[$key] = $resolver;
    }


    /**
     * @param $key
     * @param callable $resolver
     */
    public function setFactory($key, Callable $resolver){


        $this->factories[$key] = $resolver;
    }


    /**
     * @param $key
     * @return mixed
     */
    public function get($key){


        //on retire namespce
      /*  if(strpos($key, __NAMESPACE__. '\\' ) !== false){

            $key =  str_replace(__NAMESPACE__ ."\\", '', $key);
        }*/



        if(isset($this->factories[$key])){

            return $this->factories[$key]();
        }



        if(!isset($this->instances[$key])){

            if(isset($this->registry[$key])){
                $this->instances[$key] =  $this->registry[$key]();
            }else{

                $reflectd_class = new \ReflectionClass($key);
                if($reflectd_class->isInstantiable()){
                    $contructor = $reflectd_class->getConstructor();
                    if($contructor){
                        $parameters = $contructor->getParameters();



                        $contructor_parameters = [];
                        foreach($parameters as $paramter){


                            if($paramter->getClass()){
                                $contructor_parameters[] =  $this->get($paramter->getClass()->getName());
                            }else{

                                $contructor_parameters[] = $paramter->getDefaultValue();

                            }
                        }
                        var_dump($contructor_parameters );


                        $this->instances[$key] = $reflectd_class->newInstanceArgs($contructor_parameters);
                    }else{

                        $this->instances[$key] = $reflectd_class->newInstance();

                    }



                }else{
                    throw new \Exception($key .'is not an instaciable class');
                }


            }


        }


        return $this->instances[$key];

    }

    public function setInstance($instance){

        // utiliser la reflexion analyse interieur objet

        $reflexion = new \ReflectionClass($instance);



      $name = $reflexion->getName();
        //on retire namespce
      /*  if(strpos($name, __NAMESPACE__. '\\' ) !== false){

            $name =  str_replace(__NAMESPACE__ ."\\", '', $name);
        }*/


        $this->instances[$name] = $instance;

    }





}