<?php



if (isset($_GET['id'])  && !empty($_GET['id'])) {

  $conn2 = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

  $id = strip_tags($_GET['id']);


  $sql2 = 'SELECT * FROM `articles` WHERE `id` = :id; ';

  $rearticle = $conn2->prepare($sql2);

  $rearticle->bindvalue(':id', $id, PDO::PARAM_INT);

  $rearticle->execute();


  $rows = $rearticle->fetch();
}

//     if (!$row) {
//         $_SESSION['erreur'] = "vet id n'exsite pas";
//         header('location: dashboard.php');
//     }
// }else {
//     $_SESSION['erreur'] = 'URL invalide';
//     header('Location: dashboard.php');
// 


?>

<?php require_once(__DIR__ . '/dashboard-header.php') ?>

<div class="col-sm-9" id="">
  <div class="cont">
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-12">
          <p style="  font-size: 36px;text-align: start ;">DETAILS DE l'ARTICLE <?= $rows['titre'] ?></p>
        </div>
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <button> <a href="dashboard.php">RETOUR</a></button>
        </div>
        <div class="col-sm-12 mt-5">
          <div class="admin-card">
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>TITRE</th>
                  <th>IMAGE</th>
                  <th>CONTENU</th>
                  <th>DATE DE PUBLICATION</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= htmlspecialchars($rows['id']) ?></td>
                  <td><?= htmlspecialchars($rows['titre']) ?></td>
                  <td><?= htmlspecialchars($rows['image']) ?></td>
                  <td class='voir-contenu'><?= htmlspecialchars($rows['contenu']) ?></td>
                  <td><?= htmlspecialchars($rows['date_public']) ?></td>
                </tr>
              </tbody>
            </table>

            <!-- <p>ID :</p>
            <p>TITRE : </p>
            <p>IMAGE: </p>
            <p>CONTENU : </p>
            <p>DATE DE PUBLICATION : </p>
 -->
            <br>
            <p> <a href="edit-articles.php?id=<?= $rows['id'] ?>">MODIFIER</a>
              <a href="suprimer-article.php?id=<?= $rows['id'] ?>" class="suprimer">SUPRIMER</a>
            </p>

          </div>

        </div>
      </div>
    </div>

  </div>

</div>

<?php require_once(__DIR__ . '/dashboard-footer.php') ?>