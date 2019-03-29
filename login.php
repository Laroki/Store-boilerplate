<?php
require_once 'assets/config/bootstrap.php';

// Traitement du formulaire de connexion
if (isset($_POST['login'])) {
  // Rechercher l'utilisateur sur mySQL
  $req = $pdo->prepare(
    'SELECT *
    FROM utilisateur
    WHERE email = :identifiant OR pseudo = :identifiant'
  );
  $req->bindParam(':identifiant', $_POST['identifiant']);
  $req->execute();

  $user = $req->fetch(PDO::FETCH_ASSOC);
  if (!$user) {
    // si aucun utilisateur n'a été retrouvé 
    addFlash('danger','Aucun utilisateur n\' a été trouvé !');
  } elseIf(!password_verify($_POST['mdp'],$user['mdp'])){
    // Si le mdp ne correspond pas au hash en BDD
    addFlash('danger','Mot de passe incorrect');
  } else{
    // on enregistre l'utilisateur en session
    unset($user['mdp']);
    $_SESSION['user'] = $user;

    // Redirection sur la page d'acceuil
    session_write_close();
    header('Location: index.php');
  }
}


// Déconnexion
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    addFlash('success','Vous avez bien été déconnecté');
}

?>


<?php 
$page_title='Connexion';
include 'assets/inc/header.php';?>

<div class=" container border mt4-4 p-4">
  <h1>Connexion</h1>

  <?php viewFlashes() ?>
  

  <form action="login.php" method="post">

    <label>Email / Pseudo</label>
    <input type="text" class="form-control" name="identifiant">


    <label>Mot de passe</label>
    <input type="password" class="form-control" name="mdp">

    <input type="submit" name="login" class="btn btn-primary" value="Connexion">
  </form>

</div>

<?php include 'assets/inc/footer.php'; ?>