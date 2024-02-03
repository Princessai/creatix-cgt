<?php


$conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');


if (isset($_POST['submit'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $date_public = date("Y-m-d H:i:s");


    $req = "INSERT INTO articles VALUES('','$titre','','$contenu','$date_public', '','')";
    $exe = $conn->prepare($req);
    $exe->execute();
}

if (isset($_FILES['image'])) {


    // Ajout de l'image uploadé dans le dossier upload puis dans la base de donnée 

    $tmpName = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];

    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

    //Tableau des extensions que l'on accepte
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];

    $maxSize = 400000;

    if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {

        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName . "." . $extension;
        
        //$file = 5f586bf96dcd38.73540086.jpg

        move_uploaded_file($tmpName, __DIR__ . '/uploads/' . $file);

        $req = $conn->prepare('INSERT INTO articles (image) VALUES (?)');
        $req->execute([$file]);
    } else {
        echo "Une erreur est survenue";
    }

}

var_dump($_FILES);

?>



<?php require_once(__DIR__ . '/dashboard-header.php') ?>

<div class="col-sm-9" id="">
    <div class="cont">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <form action="" method="POST" enctype="multipart/form-data" class="ajout-form">
                        <h4 style="text-align: start ;">AJOUTER UN ARTICLE</h4>
                        <input type="text" placeholder="titre" name="titre">
                        <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea><br>
                        <input type="file" name="image" id="image"><br>
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>


    </div>

</div>

<?php require_once(__DIR__ . '/dashboard-footer.php'); ?>