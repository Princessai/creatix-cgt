<?php 



if ($_POST) {
  if (isset($_POST['id']) && !empty($_POST['id']) 
  && isset($_POST['nom']) && !empty($_POST['nom']) 
  && isset($_POST['prenom']) && !empty($_POST['prenom']) 
  && isset($_POST['mail']) && !empty($_POST['mail']) 
  && isset($_POST['mdp']) && !empty($_POST['mdp']) 
  
  ) {
 $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

 $id = $_POST['id'];
 $nom = $_POST['nom'];
 $prenom = $_POST['prenom'];
 $mail = $_POST['mail'];
 $mdp = $_POST['mdp'];
 $date_creation = date("Y-m-d H:i:s");

    $sql = "UPDATE `admin` SET `nom`=:nom, `prenom`=:prenom, `email`=:mail, `password`=:mdp, `date_creation`=:date_creation WHERE `id`=:id";

    // Prepare the SQL statement
    $query = $conn->prepare($sql);

    // Bind parameters
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':nom', $nom, PDO::PARAM_STR);
    $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindParam(':mail', $mail, PDO::PARAM_STR);
    $query->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $query->bindParam(':date_creation', $date_creation, PDO::PARAM_STR);

    // Execute the query
    $query->execute();

    // Redirect to another page
    header('Location: admins.php');
    
  }
}




if (isset($_GET['id'])  && !empty($_GET['id'])) {
    
    $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

    $id= strip_tags($_GET['id']);

    $sql= 'SELECT * FROM admin WHERE `id` = :id; ';

    $query = $conn->prepare($sql);

    $query->bindvalue(':id', $id, PDO::PARAM_INT);

    $query->execute();


    $row = $query->fetch();

    if (!$row) {
        $_SESSION['erreur'] = "vet id n'exsite pas";
        header('location: admins.php');
    }
}else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: admins.php');
}



?>
<?php require_once(__DIR__ . '/dashboard-header.php') ?>


<div class="col-sm-9" id="">
    <div class="cont">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <form action="" method="POST" class="ajout-form">
                        <h4 style="text-align: start ;">MODIFIER UN ADMIN</h4>
                        <input type="text" placeholder="Nom" name="nom"
                        class="form-control" value="<?= $row['nom'] ?>">
                        <input type="text" placeholder="Prénom" name="prenom"
                        class="form-control" value="<?= $row['prenom'] ?>">
                        <input type="text" placeholder="Email" name="mail"
                        class="form-control" value="<?= $row['email'] ?>">
                        <input type="text" placeholder="Mot de passe" name="mdp"
                        class="form-control" value="<?= $row['password'] ?>">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>


    </div>

</div>

<?php require_once(__DIR__ . '/dashboard-footer.php') ?>