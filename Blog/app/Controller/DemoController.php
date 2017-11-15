<?php
/**
 * Created by PhpStorm.
 * User: sdebiche
 * Date: 21/09/17
 * Time: 12:21
 */

namespace App\Controller;


use Core\Database\QueryBuilder;

class DemoController extends AppController
{

    public function index(){
require ROOT.'/Query.php';


        echo \Query::select('id','titre','contenu')->from('articles','Post')->where("Post.categorie_id")->where('Post.titre = Vaccination');



        /*********Design pattern fluent / chainage retourne this a chaque fois pour pouvoir enchaine les apple de fonctions********/
       /* $query = new QueryBuilder();
        echo $query->select('id','titre','contenu')->from('articles','Post')->where("Post.categorie_id")->where('Post.titre = Vaccination');*/


    }

}