
<form method="post">
    <?= $form->input('titre','Titre de l\'article',['type'=>'titre']);  ?>
    <?= $form->input('contenu','Contenu',['type'=>'textarea']) ?>
    <?= $form->select('categorie_id','Catégorie',$categories) ?>
    <?= $form->submit()  ?>
</form>
