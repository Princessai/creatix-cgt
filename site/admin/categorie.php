<?php
session_start();


if (isset($_GET['id']) && !empty($_GET['id'])) {

    $sql = "SELECT * FROM categories WHERE id=" . $_GET['id'];
    $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');
    $request = $conn->prepare($sql);
    $request = $conn->query($sql);
    $categorie = $request->fetch();


    $conn2 = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

    $sql2 = "SELECT * FROM articles WHERE categories_id=" . $_GET['id'];

    $rearticle = $conn2->prepare($sql2);

    $rearticle->execute();

    $exe2 = $rearticle->fetchAll(PDO::FETCH_ASSOC);

    // Requête SQL pour compter les articles de la catégorie spécifiée
    $req_nbr_articles = "SELECT COUNT(*) AS nombre_articles FROM articles WHERE categories_id = :categories_id";
    $req_article_count = $conn2->prepare($req_nbr_articles);
    $req_article_count->execute([':categories_id' => $_GET['id']]);
    $nombre_articles_result = $req_article_count->fetch(PDO::FETCH_ASSOC);
    $nombre_articles_total = $nombre_articles_result['nombre_articles'];
}

?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technoblog - <?= $categorie["nom"] ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<link rel="stylesheet" href="css/style-admin.css">

<body>
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-sm-12" id="haut-page">
                <span class="nom-blog">TECHNOBLOG</span> <span>Bienvenue,
                    <?php
                    if (isset($_SESSION['prenom'], $_SESSION['nom'])) {
                        echo $_SESSION['prenom'] . " " . $_SESSION['nom'];
                    } else {
                        echo 'admin';
                    }
                    ?>
                    <!-- Bouton de connexion -->
                    <a href="connexion.php" class="button"> Deconnexion</a>
                </span>
            </div>

            <div class="col-sm-3" id="cote">

                <a class="dashboardName" href="dashboard.php">TABLEAU DE BORD</a>

                <div class="accordion mt-5" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                CATEGORIES
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="dashboard.php" class="text-categorie">Toutes les articles</a></li>
                                    <hr>

                                    <?php
                                    $sql = "SELECT id, nom FROM categories";

                                    $request = $conn->query($sql);

                                    while ($data = $request->fetch()) {
                                    ?>
                                        <li><a href="categorie.php?id=<?= $data['id'] ?>" class="text-categorie"><?= stripslashes($data['nom']) ?></a></li>
                                        <hr>

                                    <?php
                                    }
                                    ?>

                                    <li> <button type="button" class="btn menu-button"><a href="creer-categorie.php">AJOUTER</a></button>
                                    </li>
                                  
                                    

                                   
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                <a href="admins.php">ADMINISTRATEURS</a>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="admins.php">Tous les administrateurs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9" id="">
                <div class="cont">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-sm-12">
                                <p style="  font-size: 36px;text-align: start ;">CATEGORIE: <?= $categorie["nom"] ?></p>
                            </div>
                            <div class="col-sm-6">
                                <p style="text-align: start;">Nombre total d'articles : <?= $nombre_articles_total ?></p>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-light"><a href="formulaire-article.php">AJOUTER</a></button>
                            </div>
                            
                            <div class="col-sm-12">

                                <?php foreach ($exe2 as $row) :

                                ?>

                                    <div class="article d-flex">
                                        <div class="container text-center">
                                            <div class="row article-box">
                                                <div class="col-sm-3">
                                                    <img src=<?= "uploads/" . $row['image'] ?> width='70%' alt='image article'>
                                                </div>
                                                <div class="col-sm-6">
                                                    <hgroup class="titre-date">
                                                        <h5> <?= $row['titre'] ?></h5>
                                                        <h6><?= $row['date_public'] ?></h6>
                                                    </hgroup>
                                                </div>
                                                <div class="col-sm-3">
                                                    <a href="edit-articles.php?id=<?= $row['id'] ?>" class="modifier">MODIFIER</a href="">

                                                    <a href="voir-articles.php?id=<?= $row['id'] ?>" class="voir">VOIR</a>

                                                    <a href="suprimer-article.php?id=<?= $row['id'] ?>" class="suprimer">SUPRIMER</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>


                </div>

            </div>


            <?php require_once(__DIR__ . '/dashboard-footer.php') ?>