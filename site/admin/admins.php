<?php

// if (!$_SESSION['admin_name']) {
//  header('location:connexion.php');
// }
$conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

$sql1 = "SELECT * FROM admin";

$readmin = $conn->prepare($sql1);

$readmin->execute();

$exe1 = $readmin->fetchAll(PDO::FETCH_ASSOC);

?>

<?php require_once(__DIR__.'/dashboard-header.php') ?>

<div class="col-sm-9" id="">
  <div class="cont">
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-12">
          <p style="  font-size: 36px;text-align: start ;">ADMIN</p>
        </div>
        <div class="col-sm-6">
          <p style=" text-align: start ;">tous(...)</p>
        </div>
        <div class="col-sm-6">
          <button type="button" class="btn btn-light"><a href="formulaire-admin.php">AJOUTER</a></button>
        </div>
        <div class="col-sm-12 mt-5">
          <div class="admin-card">

 
           <?php 
                if (!empty($_SESSION['erreur'])) {
                  echo '<div class="alert alert-danger" role="alert">
                  '.$_SESSION['erreur'].'
                </div>';
                $_SESSION['erreur'] = "";
                }
           
           ?>

            <table class="table ">
              <thead>
                <tr>
                  <th scope="col">  Id</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Prénom</th>
                  <th scope="col">Email</th>
                  <th  scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($exe1 as $row) : ?>

                  <tr>
                  <td>
                      <?php echo $row['id']; ?>
                    </td>
                    <td>
                      <?php echo $row['nom']; ?>
                    </td>
                    <td>
                      <?php echo $row['prenom']; ?>
                    </td>
                    <td>
                      <?php echo $row['email']; ?>
                    </td>
                    <td>
                      <a href="voir.php?id=<?= $row['id'] ?>" class="voir"> VOIR</a>
                      <a href="edit.php?id=<?= $row['id'] ?>" class="modifier"> MODIFIER</a>
                      <a href="delete.php?id=<?= $row['id'] ?>" class="suprimer"> SUPRIMER</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

  </div>

</div>

<?php require_once(__DIR__.'/dashboard-footer.php') ?>
