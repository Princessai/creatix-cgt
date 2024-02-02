<?php 



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

<?php require_once(__DIR__.'/dashboard-header.php') ?>

<div class="col-sm-9" id="">
  <div class="cont">
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-12">
          <p style="  font-size: 36px;text-align: start ;">DETAILS DE l'ADMIN <?= $row['nom'] ?></p>
        </div>
        <div class="col-sm-6">
          <p style=" text-align: start ;">tous(...)</p>
        </div>
        <div class="col-sm-6">
          <button> <a href="admins.php">RETOUR</a></button> 
        </div>
        <div class="col-sm-12 mt-5">
          <div class="admin-card">
                 
          <p>ID :<?= $row['id'] ?></p> 
          <p>NOM : <?= $row['nom'] ?></p>
          <p>PRENOM :  <?= $row['prenom'] ?></p>
          <p>EMAIL : <?= $row['email'] ?></p>
          <p>PASSWORD : <?= $row['password'] ?></p>
          <p>DATE DE CREATION : <?= $row['date_creation'] ?></p>
          <br>
          <p> <a href="edit.php?id=<?= $row['id'] ?>">MODIFIER</a></p>
    
          </div>

        </div>
      </div>
    </div>

  </div>

</div>

<?php require_once(__DIR__.'/dashboard-footer.php') ?>