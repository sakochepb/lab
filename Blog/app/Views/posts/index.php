

<h1>Home</h1>

<div id="row">

    <div class="col-sm-8">


      <ul>
            <?php


            foreach($posts as $post):


                ?>

                <h2><a href="<?= $post->url; ?>" ><?php echo $post->titre;?> </a> </h2>
                <p><?php echo  $post->extrait; ?></p>

                <p><em><?php echo  $post->categorie; ?></em></p>




            <?php  endforeach; ?>

        </ul>
    </div>


    <div class="col-sm-4">
        <ul>
      <?php

      foreach($categories  as $categorie){

          ?>
          <li><a href="<?= $categorie->url ?>"><?= $categorie->libelle  ?></a> </li>

     <?php

      }


      ?>

            </ul>
    </div>

</div>






