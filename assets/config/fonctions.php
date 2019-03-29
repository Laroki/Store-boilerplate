<?php 

// Ajouter un message "flash"
/*
on peut typer les arguments des fonctions 
  type $arg 
on peut indiquer le type de ce qui est retourné par la fonction
  functiion foo(): type
void = rien n'est retourné 
*/

function addFlash(string $type, string $content) : void
{
  /*
  pour inserer un élément en fin de tableau :
    $tableau[] = 
    cette syntaxe va aussi crée le tableau s'il n'existe pas  
  */
  $_SESSION['flash'][] = [
    'type' => $type,
    'content' => $content,
  ];


}

// Récuperer les messages flash
function getFlashes() : array
{
  if (isset($_SESSION['flash'])) {
    $messages = $_SESSION['flash'];
    // vider le tableau 
    unset($_SESSION['flash']);
    return $messages;
  }
  return []; 
}

//Savoir si un utilisateur est connecté

function isConnected() : bool
{
  return isset($_SESSION['user']);
}

// Récuperer une information de l'utilisateur
function getUserInfo(string $info) : string
{
  // si ca n'existe pas renvoyer null
  return $_SESSION['user'][$info] ?? null;
}

// Afficher les messages flashs
function viewFlashes() : void 
{ // PHP_EOL saut a la ligne en php dans le code source
  foreach (getFlashes() as $flash) {
    echo '<div class="alert alert-' . $flash['type'] . '">' . PHP_EOL;
    echo $flash['content'] . PHP_EOL;
    echo '</div>' . PHP_EOL;
  }
}


// Récuprer la liste des catégories 
// mettre PDO en paramètre 
function allCategories(PDO $con) : array 
{
  $req = $con->query('SELECT * FROM categorie');
  return $req->fetchAll(PDO::FETCH_ASSOC);
}


// Récuperer les informations d'une catégorie
function getCategorie(PDO $con, int $id) 
{
  $req = $con->prepare(
    'SELECT *
    FROM categorie
    where id= :id
    '
  );
  $req->bindParam(':id',$id,PDO::PARAM_INT);
  $req->execute();
  return $req->fetch(PDO::FETCH_ASSOC);
}