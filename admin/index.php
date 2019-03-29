<?php 
require_once 'assets/config/bootstrap.php';


$page_title = 'Back-Office';
include 'assets/inc/header.php';
?>

<div class="container border mt-4 p-4">
  <h1>Liste des catégories</h1>

  <?php viewFlashes(); ?>

  <a href="categorie_add.php" class="btn btn-primary">
    Ajouter une nouvelle catégorie
  </a>

  <table class="table">

    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>
        <th scope="col">Description</th>
        <th></th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach(allCategories($pdo) as $categorie): ?>
      <tr>
        <th scipe="row"><?= $categorie['id'] ?></th>
        <td><?= $categorie['titre'] ?></td>
        <td><?= $categorie['description'] ?></td>
        <td> <a href="categorie_edit.php?id=<?=$categorie['id'] ?>" class="btn btn-success">Modifier</a></td>
        <td> <a href="#" class="btn btn-danger">Supprimer</a></td>
      </tr>
      <?php endforeach; ?>

    </tbody>




  </table>

</div>

<?php include 'assets/inc/footer.php';