<?php


namespace Core\HTML;
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
    public function input(String $name, $label, $options = array())
    {

        /**
         * si le type est préciser dans le tableau d'option on applique sinon on met par defaut
         */
        $type = isset($options['type'])? $options['type'] : 'text';
        $label = '<label>'. $label . '</label>';


        if($type === 'textarea'){
            $input = ' <textarea class="form-control" type="'.$type.'" name="'.$name.'">' . $this->getValue($name) .'</textarea>';

        }else{
            $input = ' <input class="form-control" type="'.$type.'" name="'.$name.'" value="'.$this->getValue($name).'" />';

        }

        return $this->surround($label.$input);



     }

    /**
     * @param $name
     * @param $label
     * @param $options (les donner des balise  options) ['1'=>'test', '2'=>'controle']
     */
    public function select($name, $label, $options){

        $label = '<label>'. $label.'</label>';
        $input = '<select class="form-control" name="'.$name.'">';

        foreach($options as $k => $v){

            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = 'selected';
            }
            $input.= "<option value = '$k' $attributes> $v</option>";
        }



        $input .= '</select>';

        return $this->surround($label.$input);


    }




    /**
     * @return string
     */
    public function submit(){
        return $this->surround('<button class="btn btn-primary" type="submit">Envoyer</button>');
    }


}