


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css\header.css">
  <title>TECHNOBLOG</title>
  <style>
      .article-text {
    max-height: 90px; /* Limite la hauteur à 80 pixels (ajustez selon vos besoins) */
    overflow: hidden; /* Cache le texte dépassant */
    display: -webkit-box;
    -webkit-line-clamp: 4; /* Nombre de lignes à afficher */
    -webkit-box-orient: vertical;
}

  </style>
</head>

<body class="bg-light bg-gradient">
  <nav class="navbar navbar-expand-lg bg bg-dark bg-gradient ">
    <div class="container-fluid " style="font-family: provicali;">
      <a class="navbar-brand text-info me-5" href="index.php">TECHNOBLOG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="index.php">Acceuil</a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <a class="nav-link active dropdown-toggle text-light" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                Categories </a>
              <ul class="dropdown-menu">
                <?php
                $sql = "SELECT id, nom FROM categories";
                $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

                $request = $conn->query($sql);

                while ($data = $request->fetch()) {
                ?>
                  <li><a href="categories.php?id=<?= $data['id'] ?>" class="dropdown-item"><?= stripslashes($data['nom']) ?></a></li>
                  <hr>

                <?php
                }
                ?>

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-light" href=" propos.php">A propos</a>
          </li>
        </ul>
        <span class="navbar-text">
          <ul class=" navbar-nav">
            <li><input class="form-control " type="search" placeholder="Search" aria-label="Search"></li>
            <li>
              <button type="button" class="btn btn-info text-light ms-4">
                <a href="admin/connexion.php" style=" text-decoration: none; color: #fff;">
                  Connexion
                </a>
              </button>
            </li>
          </ul>
        </span>
      </div>
    </div>
  </nav>