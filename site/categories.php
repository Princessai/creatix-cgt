<?php include("header.php")  ?>

<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {

  $sql = "SELECT * FROM categories WHERE id=" . $_GET['id'];
  $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');
  $request = $conn->prepare($sql);
  $request->execute();
  $categorie = $request->fetch();

  $sql2 = "SELECT * FROM articles WHERE categories_id=" . $_GET['id'];
  $rearticle = $conn->prepare($sql2);
  $rearticle->execute();
  $exe2 = $rearticle->fetchALL(PDO::FETCH_ASSOC);
}

?>
<div class="container text-center mt-5">
  <img src="admin/images/star.png" alt="">
  <h4 style="font-family:provicali; "> CATEGORIE : <?= $categorie["nom"] ?></h4>
  <div class="row mt-5">
    <div class="col-sm-12">
      <div class="container text-center">
        <div class="row">
              <?php foreach ($exe2 as $row) {
                ?>
            <div class="col-sm-4">
              
                <div class="card border-0">
                  <img src=<?= "admin/uploads/" . $row['image'] ?> class="card-img-top" alt="image article">
                  <div class="card-body">
                    <h5 class="card-title"><?= $row['titre'] ?></h5>
                    <p class="card-text"><small><?= $row['date_public'] ?></small></p>
                    <a href="article.php?id=<?= $row['id'] ?>" class="btn btn-primary">VOIR PLUS</a>
                  </div>
                </div>
                </div>
                <?php 
          } ?>
          </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
