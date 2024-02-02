<?php
if (isset($_POST['submit'])) {
    $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $date_creation = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `admin` (`nom`, `prenom`, `email`, `password`, `date_creation`) VALUES (:nom, :prenom, :mail, :mdp, :date_creation)";

    $query = $conn->prepare($sql);

    $query->bindParam(':nom', $nom, PDO::PARAM_STR);
    $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindParam(':mail', $mail, PDO::PARAM_STR);
    $query->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $query->bindParam(':date_creation', $date_creation, PDO::PARAM_STR);

    $query->execute();

    $conn = null;

    header('Location: admins.php');
    exit; // Assurez-vous de terminer le script après une redirection pour éviter toute exécution supplémentaire.
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
                        <input type="text" placeholder="Email" name="mail">
                        <input type="text" placeholder="Mot de passe" name="mdp">
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . '/dashboard-footer.php') ?>
