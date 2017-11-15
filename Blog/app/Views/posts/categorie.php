<h1><?= $categorie->libelle?></h1>
<ul>
    <?php


    foreach( $articles as $post):


        ?>

        <h2><a href="<?= $post->url; ?>" ><?php echo $post->titre;?> </a> </h2>
        <p><?php echo  $post->extrait; ?></p>

        <p><em><?php echo  $post->categorie; ?></em></p>




    <?php  endforeach; ?>

</ul>