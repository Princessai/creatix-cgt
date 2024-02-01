<?php require_once(__DIR__ . '/dashboard-header.php') ?>
<div class="col-sm-9" id="">
  <div class="cont">
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-12">
          <p style="  font-size: 36px;text-align: start ;">TOUTES LES CATEGORIES</p>
        </div>
        <div class="col-sm-6">
          <p style=" text-align: start ;">tous(...)</p>
        </div>
        <div class="col-sm-6">
          <button type="button" class="btn btn-light"><a href="formulaire-article.php">AJOUTER</a></button>
        </div>
        <div class="col-sm-12">
          <div class="article d-flex">
            <div class="container text-center">
              <div class="row article-box">
                <div class="col-sm-3">
                  <img src="images/exemple.png" width="70%" alt="image article">
                </div>
                <div class="col-sm-6">
                  <hgroup class="titre-date">
                    <h5>TITRE</h5>
                    <h6>Date de publication</h6>
                  </hgroup>
                </div>
                <div class="col-sm-3">
                  <a href="" class="modifier">MODIFIER</a>
                  <a href="" class="suprimer">SUPRIMER</a>
                  <a href="" class="voir">VOIR</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

</div>

<?php require_once(__DIR__ . '/dashboard-footer.php') ?>