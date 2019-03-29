<?php 
require_once 'assets/config/bootstrap.php';

// Traitement du formulaire d'ajout
if (isset($_POST['add'])) {

  //strips_tags retire toutes les balise html d'une chaine de caractere
  $titre = trim(strip_tags($_POST['titre']));
  $description = trim(strip_tags($_POST['description']));

if (strlen($titre) < 3 || strlen($titre) > 50) {
  addFlash('danger','le titre doit contenir entre 3 et 50 caractères');
} elseif(strlen($description)> 255){
  addFlash('danger','La description ne peut contenir plus de 255 caractères');
} else{
  $req = $pdo->prepare(
    'INSERT INTO categorie (
        titre,
        description
    )VALUES (
      :titre,
      :desc
      )'
  );
  $req->bindParam(':titre',$titre);

  // envoyer la varialbe $description si elle  n'est pas declaré envoyer null
  $req->bindValue('desc',$description ?? null);
  //Verifier que la requete séxecute correctement 
  $exec = $req->execute();

  if (!$exec) {
    addFlash('danger','Problème SQL');
  } else{
    addFlash('succes','Catégorie enregistrée');
    // supprimer les valeurs du formulaire 
    unset($_POST);
  }
}


}



$page_title = 'Nouvelle catégorie';
include 'assets/inc/header.php';
?>

<div class="container border mt-4 p-4">
  <h1>Nouvelle catégorie</h1>

  <?php viewFlashes() ?>
  

  <form action='categorie_add.php' method='post'>
    <div class="form-group">
      <label>Titre</label>
      <input type="text" name="titre" class="form-control" value="<?= $_POST['titre'] ?? ''; ?>">
    </div>

    <div class="form-group">
      <label>Description</label>
      <textarea name="description" class="form-control"><?= $_POST['description'] ?? ''; ?> </textarea>
    </div>
    <input type="submit" name="add" value="Ajouter" class="btn btn-primary">
  </form>
</div>

<?php include 'assets/inc/footer.php'; ?>