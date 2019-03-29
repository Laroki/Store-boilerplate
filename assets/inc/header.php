<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title><?= $page_title?></title>
</head>

<body>
  <!-- header HTML -->
  <ul class="nav">
    <li class="nav-item">
      <a href="index.php" class="nav-link">Boutique</a>
    </li>
    <?php if(isConnected()) : ?>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <?= getUserInfo('pseudo');?>
      </a>
    </li>

    <li class="nav-item">
      <a href="login.php?logout" class="nav-link">
        Déconnexion
      </a>
    </li>

    <!-- Si l'utilisateur est co est que son pseudo est admin lui mettre le lien vers le back office -->
    <?php if(getUserInfo('type') ==='admin') : ?>
    <li class="nav-item">
      <a href="admin/" class="nav-link">Back-office</a>
    </li>

    <?php endif; ?>

    <?php else: ?>
    <li class="nav-item">
      <a href="login.php" class="nav-link">Connexion</a>
    </li>
    <?php endif; ?>
  </ul>