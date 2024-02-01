<?php


$conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');


if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail  = $_POST['email'];
    $mdp = $_POST['password'];
    $date_creation = date("Y-m-d H:i:s");


    $req = "INSERT INTO admin VALUES('', '$nom','$prenom','$mail','$mdp', '$date_creation')";
    $exe = $conn->prepare($req);
    $exe->execute();
}

?>
<?php require_once(__DIR__ . '/dashboard-header.php') ?>


<div class="col-sm-9" id="">
    <div class="cont">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <form action="" method="POST" class="ajout-form">
                        <h4 style="text-align: start ;">AJOUTER UN ADMIN</h4>
                        <input type="text" placeholder="Nom" name="nom">
                        <input type="text" placeholder="Prénom" name="prenom">
                        <input type="text" placeholder="Email" name="email">
                        <input type="text" placeholder="Mot de passe" name="password">
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>


    </div>

</div>

<?php require_once(__DIR__ . '/dashboard-footer.php') ?>