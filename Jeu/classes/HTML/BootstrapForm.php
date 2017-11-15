<?php


namespace Tutoriel\HTML;
class BootstrapForm extends Form
{


    /**
     * @param $html string Code html à entouré
     * @return string
     */
    protected function surround(String $html){
        return "<div class=\"form-group\">$html</div>";
    }



    /**
     * @param String $name
     * @return string
     */
    public function input(String $name)
    {

        return $this->surround('<label>'.$name. '</label> <input class="form-control" type="text" name="'.$name.'" value="'.$this->getValue($name).'" />');



     }



    /**
     * @return string
     */
    public function submit(){
        return $this->surround('<button class="btn btn-primary" type="submit">Envoyer</button>');
    }


}