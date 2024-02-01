<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technoblog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-admin.css">

</head>

<body>
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-sm-12" id="haut-page">
                <span class="nom-blog">TECHNOBLOG</span> <span>Bienvenue, admin
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
                                <li><a href="dashboard.php" class="text-categorie">Toutes les catégories</a></li>
                                    <hr>

                                    <?php
                                    $sql = "SELECT id, nom FROM categories";

                                    $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>