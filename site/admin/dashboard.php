<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<link rel="stylesheet" href="css/style-admin.css">

<body>
  <div class="container-fluid text-center">
    <div class="row">
      <div class="col-sm-12" id="haut-page">
        <span class="nom-blog" >TECHNOBLOG</span> <span>bienvenue, admin</span>
      </div>
      <div class="col-sm-3" id="cote">


        <div>

          <a href="">TABLEAU DE BORD</a>

          <ul>

            <li>

              <a href="dashboard.php">Admin</a>

            </li>
            <li>
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Categories
                </button>
                <ul class="dropdown-menu">
                  <li><button class="dropdown-item" type="button">DIGITALE</button></li>
                  <li><button class="dropdown-item" type="button">IA</button></li>
                  <li><button class="dropdown-item" type="button">MARKETING</button></li>
                  <li><button class="dropdown-item" type="button">METAVERSE</button></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
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
                <button type="button" class="btn btn-light"><a href="formulaire.php">AJOUTER</a></button>
              </div>
              <div class="col-sm-12">
                <div class="admin">
                  <span>NOM</span> <span>STATUT</span> <span>DATE</span>
                </div>
                <div class="admin">
                  <span>NOM</span> <span>STATUT</span> <span>DATE</span>
                </div>
                <div class="admin">
                  <span>NOM</span> <span>STATUT</span> <span>DATE</span>
                </div>

              </div>
            </div>
          </div>


        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>