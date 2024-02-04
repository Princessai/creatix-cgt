<?php 



if ($_POST) {
  if (isset($_POST['id']) && !empty($_POST['id']) 
  && isset($_POST['titre']) && !empty($_POST['titre']) 
  && isset($_POST['image']) && !empty($_POST['image']) 
  && isset($_POST['contenu']) && !empty($_POST['contenu']) 
  && isset($_POST['date_public']) && !empty($_POST['date_public']) 
  
  ) {
    $conn2 = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

 $id = $_POST['id'];
 $titre = $_POST['titre'];
 $image = $_POST['image'];
 $contenu = $_POST['contenu'];
 $date_public = date("Y-m-d H:i:s");

    $sql2 = "UPDATE `articles` SET `titre`=:titre,  `image`=:image, `contenu`=:contenu, `date_public`=:date_public WHERE `id`=:id";

    // Prepare the SQL statement
   $rearticle = $conn2->prepare($sql2);

    // Bind parameters
   $rearticle->bindParam(':id', $id, PDO::PARAM_INT);
   $rearticle->bindParam(':titre', $nom, PDO::PARAM_STR);
   $rearticle->bindParam(':image', $mail, PDO::PARAM_STR);
   $rearticle->bindParam(':contenu', $mdp, PDO::PARAM_STR);
   $rearticle->bindParam(':date_public', $date_creation, PDO::PARAM_STR);

    // Execute the query
   $rearticle->execute();

    // Redirect to another page
    header('Location: dashboard.php');
    
  }
}




if (isset($_GET['id'])  && !empty($_GET['id'])) {
    
    $conn2 = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

    $id= strip_tags($_GET['id']);

    $sql2= 'SELECT * FROM `articles` WHERE `id` = :id; ';

    $rearticle = $conn2->prepare($sql2);

    $rearticle->bindvalue(':id', $id, PDO::PARAM_INT);

    $rearticle->execute();


    $rows = $rearticle->fetch();

    if (!$rows) {
        $_SESSION['erreur'] = "vet id n'exsite pas";
        header('location: dashboard.php');
    }
}else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: dashboard.php');
}



?>





<?php require_once(__DIR__ . '/dashboard-header.php') ?>

<div class="col-sm-9" id="">
    <div class="cont">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <form action="" method="POST" enctype="multipart/form-data" class="ajout-form">
                        <h4 style="text-align: start ;">AJOUTER UN ARTICLE</h4>
                        <input type="text" placeholder="titre" name="titre"
                        class="form-control" value="<?= $rows['titre'] ?>">
                        <input type="text" name="contenu" 
                        class="form-control" value="<?= $rows['contenu'] ?>"
                        id="contenu" cols="30" rows="10"
                        ><br>
                        <input type="file" name="image" id="image"
                       ><br>
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>


    </div>

</div>

<?php require_once(__DIR__ . '/dashboard-footer.php'); ?>