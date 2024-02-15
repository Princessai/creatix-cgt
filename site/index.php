
<?php include("header.php") ?>

<div class="container mt-5">

  <!-- Section Jeux Vidéo -->
  <div class="row mb-5">
    <div class="col-sm-8">
      <?php
      $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

      $sqlJeuxVideo = "SELECT * FROM articles WHERE categories_id= 1 LIMIT 1";
      $jeuxVideoArticle = $conn->query($sqlJeuxVideo)->fetch();
      ?>

      <div class="card border-0 shadow p-3 mb-5 bg-body rounded" style="font-family: Montserrat">
        <h4 class="mb-3" style="font-family: Provicali;">A LA UNE</h4>
        <img src="admin/uploads/<?= $jeuxVideoArticle['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">
            <h6> <strong> <?= $jeuxVideoArticle['titre'] ?></strong></h6>

            <p class="article-text"><?= $jeuxVideoArticle['contenu'] ?></p>
          </p>
          <a href="article.php?id=<?= $jeuxVideoArticle['id'] ?>" class="btn btn-primary">VOIR PLUS</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4  " style="font-family:Montserrat; font-size:15px">
      <img src="admin/images/star.png" alt="">
      <h4 style="font-family:provicali; ">Actualités</h4>
      <div class="accordion " id="accordionPanelsStayOpenExample">
        <div class="accordion-item border-0">
          <h2 class="accordion-header " style="font-family:provicali; ">
            <button class="accordion-button text-info" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
              HOW TO
            </button>
          </h2>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
            <div class="accordion-body">
              <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse
              plugin adds the appropriate classes that we use to style each element. These classes control the overall
              appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom

            </div>
          </div>
        </div>
        <div class="accordion-item border-0">
          <h2 class="accordion-header" style="font-family:provicali; ">
            <button class="accordion-button collapsed text-info" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
              PRODUCT
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse
              plugin adds the appropriate classes that we use to style each element. These classes control the overall
              appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom

            </div>
          </div>
        </div>
      </div>
    </div>



  </div>

  <!-- Section Articles à la Une -->
  <div class="row shadow p-3 mb-5 bg-body rounded" style="font-family: Montserrat">
    <h4 style="font-family: Provicali;">DERNIERS AJOUTS</h4>

    <?php
    $sqlArticlesALaUne = "SELECT * FROM articles LIMIT 3";
    $articlesALaUne = $conn->query($sqlArticlesALaUne)->fetchAll();
    ?>

    <?php foreach ($articlesALaUne as $article) : ?>
      <div class="col-sm-4">
        <div class="card border-0">
          <img src="admin/uploads/<?= $article['image'] ?>" class="card-img-top w-75" alt="...">
          <div class="card-body">
            <p class="card-text">
              <h6><?= $article['titre'] ?></h6>
              <p class="article-text"><?= $article['contenu'] ?></p>
            </p>
            <a href="article.php?id=<?= $article['id'] ?>" class="btn btn-primary">VOIR PLUS</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>


  </div>

  <!-- Section Article le Plus Lu -->
  <div class="row">
    <div class="col-sm-12">

      <?php
      $sqlArticleLePlusLu = "SELECT * FROM articles LIMIT 1";
      $articleLePlusLu = $conn->query($sqlArticleLePlusLu)->fetch();
      ?>

      <div class="card mb-5 p-3 border-0">
        <h4 class="mb-3" style="font-family: Provicali;">L'ARTICLE LE PLUS LU</h4>
        <div class="row g-0">
          <div class="col-md-6">
            <img src="admin/uploads/<?= $articleLePlusLu['image'] ?>" class="img-fluid rounded-start w-100" alt="...">
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <h5 class="card-title"><?= $articleLePlusLu['titre'] ?></h5>
              <p class="card-text"><small class="text-body-secondary">Date de publication: <?= $articleLePlusLu['date_public'] ?></small></p>
              <p class="card-text article-text" style="font-family: Montserrat; font-size:15px"><?= $articleLePlusLu['contenu'] ?></p>
              <a href="article.php?id=<?= $articleLePlusLu['id'] ?>" class="btn btn-primary">VOIR PLUS</a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>

