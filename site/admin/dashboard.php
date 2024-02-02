<?php
$conn2 = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

$sql2 = "SELECT * FROM articles";

$rearticle = $conn2->prepare($sql2);

$rearticle->execute();

$exe2 = $rearticle->fetchAll(PDO::FETCH_ASSOC);

// Requête SQL pour compter tous les articles
$req_nbr_articles = "SELECT COUNT(*) AS nbr_total_articles FROM articles";
$nbr_total_articles_result = $conn2->query($req_nbr_articles);
$nbr_total_articles = $nbr_total_articles_result->fetch(PDO::FETCH_ASSOC)['nbr_total_articles'];



if (isset($_GET['id']) && !empty($_GET['id'])) {

  $sql = "SELECT * FROM categories WHERE id=" . $_GET['id'];
  $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');
  $request = $conn->prepare($sql);
  $request = $conn->query($sql);
  $categorie = $request->fetch();
}

?>


<?php require_once(__DIR__ . '/dashboard-header.php') ?>

<div class="col-sm-9" id="">
  <div class="cont">
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-12">
          <p style="  font-size: 36px;text-align: start ;">Tous les articles</p>
        </div>
        <div class="col-sm-6">
          <p style="text-align: start;">Nombre total d'articles : <?= $nbr_total_articles ?></p>
        </div>
        <div class="col-sm-6">
          <button type="button" class="btn btn-light"><a href="formulaire-article.php">AJOUTER</a></button>
          <button type="button" class="btn btn-light"><a href="suprimer-article.php">SUPRIMER</a></button>
        </div>
        <div class="col-sm-12">

          <?php foreach ($exe2 as $row) :  ?>


            <div class="article d-flex">
              <div class="container text-center">
                <div class="row article-box">
                  <div class="col-sm-3">

                    <img src="<?= $row['image'] ?>" width="70%" alt="image article">
                  </div>
                  <div class="col-sm-6">
                    <hgroup class="titre-date">
                      <h5> <?= $row['titre'] ?></h5>
                      <h6><?= $row['date_public'] ?></h6>
                    </hgroup>
                  </div>
                  <div class="col-sm-3">
                    <a href="">MODIFIER</a href="">
                   
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

<?php require_once(__DIR__ . '/dashboard-footer.php') ?>