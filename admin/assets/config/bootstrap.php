<?php 

// fichier de configuration principal du front-office
require_once __DIR__ . '/../../../assets/config/bootstrap.php';

// Restriction d'accés
//si il n'a pas les droits
if(getUserInfo('type') !== 'admin'){
  // Redirection 
  addFlash('danger','Cet espace nécessite une authentification');
  header('Location: ../login.php');
}