<?php


// if (!$_SESSION['admin_name']) {
//  header('location:connexion.php');
// }
$conn2 = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

$sql2 = "SELECT * FROM articles";

$rearticle = $conn2->prepare($sql2);

$rearticle->execute();

$exe2 = $rearticle->fetchAll(PDO::FETCH_ASSOC);



?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style-admin.css">

</head>

<body>
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-sm-12" id="haut-page">
                <span class="nom-blog">TECHNOBLOG</span> <span>bienvenue, admin</span>
            </div>
            <div class="col-sm-3" id="cote">

                <a class="dashboardName" href="dashboard.php">TABLEAU DE BORD</a>

                <div class="accordion mt-5" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                CATEGORIES <span>(...)</span>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <ul>
                                <li><a href="web.php" class="text-categorie">Articles</a></li>
                                    <hr>
                                    <li><a href="ia.php">Intelligence Artificielle</a></li>
                                    <hr>
                                    <li><a href="reseaux.php">Reseaux sociaux</a></li>
                                    <hr>
                                    <li><a href="mobile.php">Mobile</a></li>
                                    <hr>
                                    <li> <button type="button" class="btn menu-button"><a href="creer-categorie.php">AJOUTER</a></button>
                  </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseTwo">
                                ADMINS
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">

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
                                <p style="  font-size: 36px;text-align: start ;">TOUS LES ARTICLES</p>
                            </div>
                            <div class="col-sm-6">
                                <p style=" text-align: start ;">tous(...)</p>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-light"><a
                                        href="formulaire-article.php">AJOUTER</a></button>
                            </div>
                            <div class="col-sm-12">

                                  <?php foreach ($exe2 as $row):  ?>
                                    
            
                                <div class="article d-flex">
                                    <div class="container text-center">
                                        <div class="row article-box" >
                                            <div class="col-sm-3">
                                                
                                                <img src="<?= $row['image'] ?>" width="70%"  alt="image article">
                                            </div>
                                            <div class="col-sm-6">
                                              <hgroup class="titre-date">
                                                <h5> <?= $row['titre'] ?></h5>
                                                <h6><?= $row['date_public'] ?></h6>
                                              </hgroup>
                                            </div>
                                            <div class="col-sm-3">
                                             <a href="" >MODIFIER</a href="" >
                                             <button class="suprimer" onsubmit=<?php ?>>SUPRIMER</button>
                                             <a href="" class="voir">VOIR</a>
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>


