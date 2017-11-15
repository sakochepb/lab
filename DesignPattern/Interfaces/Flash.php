<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 25/09/17
 * Time: 14:55
 */

namespace DesignPattern\Interfaces;


class Flash
{

    protected $session;
    const KEY = "message_flash";


    public function __construct(Session $session){
        $this->session = $session;
    }

    public function set( $message, $type ="success"){


        $this->session->set(self::KEY,
            ['message'=>$message,
                'type'=> $type] );

    }

    public function get(){

        $flash =  $this->session->get(self::KEY);
        $this->session->delete(self::KEY);

        return "<div class='alert alert-{$flash['type']}'>{$flash['message']}</div>";

    }





}