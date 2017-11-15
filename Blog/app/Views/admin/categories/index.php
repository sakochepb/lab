<h1>Administer les catégories</h1>

<p>
    <a href="?page=admin.categories.add" class="btn btn-success">Ajouter</a>
</p>


<table class ="table">

    <thead>
    <tr>
        <td>ID</td>
        <td>Titre </td>
        <td>Actions</td>


    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $cat ): ?>

    <tr>
        <td><?= $cat->id ; ?> </td>
        <td><?= $cat->libelle ; ?> </td>
        <td>
            <a class ='btn btn-primary' href="?page=admin.categories.edit&id=<?=  $cat->id;  ?>" id="">Éditer</a>

           <form action="?page=admin.categories.delete" method="post" style="display: inline;">

               <input type="hidden" name ="id" value="<?= $cat->id  ?>">
               <button type="submit" class ='btn btn-danger'>Supprimer</button>


           </form> 
            

        </td>


    </tr>

    <?php endforeach ; ?>
    </tbody>


</table>