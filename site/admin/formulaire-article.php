<?php

try {
    $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

    if (isset($_FILES['image'], $_POST['submit'])) {


        // Ajout de l'image uploadé dans le dossier upload puis dans la base de donnée 

        $tmpName = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        // $file_error = $_FILES['image']['error'];

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));

        //Tableau des extensions que l'on accepte
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];

        // $maxSize = 70000;

        $error = false;
        $errorMessage = "";

        // var_dump($size);
        // var_dump(in_array($extension, $extensions));

        if (in_array($extension, $extensions)) {
            // if ($size <= $maxSize) {
            $uniqueName = uniqid('', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $file = $uniqueName . "." . $extension;

            $destination =  __DIR__ . '/uploads/' . $file;
            //$file = 5f586bf96dcd38.73540086.jpg

            move_uploaded_file($tmpName, $destination);

            // $req = $conn->prepare('INSERT INTO articles (image) VALUES (?)');
            // $req->execute([$file]);

            // }else{
            //     $error = true;
            //     $errorMessage = "La taille de l'imge est trop grande<br>";

            // }
        } else {
            $error = true;
            $errorMessage = "cette extension n'est pas autorisée <br>";
        }

        if ($error == false) {
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $image = isset($file) ? $file : '';
            $date_public = date("Y-m-d H:i:s");
            $categories_id = $_POST['categories_id'];
        
            $req = "INSERT INTO articles (titre, image, contenu, date_public, categories_id) VALUES (?, ?, ?, ?, ?)";
            $exe = $conn->prepare($req);
            $exe->execute([$titre, $image, $contenu, $date_public, $categories_id]);
        } else {
            echo $errorMessage;
        }
            }
    
} catch (PDOException $error) {
    echo "Erreur:" . $error->getMessage();
}




// var_dump($_FILES);

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
                        <select class="select-categorie" name="categories_id">
                            <?php
                            // Récupérez les catégories depuis la base de données
                            $categoriesQuery = $conn->query("SELECT id, nom FROM categories");
                            $categories = $categoriesQuery->fetchAll(PDO::FETCH_ASSOC);

                            // Affichez les options de la liste déroulante
                            foreach ($categories as $categorie) {
                                echo "<option value='{$categorie['id']}'>{$categorie['nom']}</option>";
                            }
                            ?>
                        </select> <br>
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>


    </div>

</div>

<?php require_once(__DIR__ . '/dashboard-footer.php'); ?>