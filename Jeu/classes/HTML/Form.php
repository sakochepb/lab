<?php
namespace Tutoriel\HTML;
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 11/09/17
 * Time: 17:02
 */

/**
 * Class Form
 * Permet de générer un formulaire simplement et rapidement
 */
class Form
{

    /**
     * @var array Donnéees utilisées par le formulaire
     */
    private $data;

    /**
     * @var string Tag utilisé pour entouré les champs
     */
    public $surround = "p";


    /**
     * @param array $data
     */
    public function __construct($data = array()){


        $this->data = $data;
    }





    /**
     * @param $html string Code html à entouré
     * @return string
     */
    protected function surround(String $html){
        return "<{$this->surround}>$html</{$this->surround}>";
    }


    /**
     * @param $index string
     * @return null
     */
    protected function getValue($index){
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }


    /**
     * @param $name
     * @return string
     */
    public function input(String $name){
        return $this->surround('<input type="text" name="'.$name.'" value="'.$this->getValue($name).'" />');
    }

    /**
     * @return string
     */
    public function submit(){
        return '<button type="submit">Envoyer</button>';
    }


}