<?php



try {
    $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {
        $articleIds = [$_POST['id']];


        foreach ($articleIds as $articleId) {
            $sql = "DELETE FROM articles WHERE id = :articleId";
            $query = $conn->prepare($sql);
            $query->bindParam(':articleId', $articleId, PDO::PARAM_INT);
            $query->execute();

            echo "Article with title $articleId deleted successfully<br>";
        }


    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

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
                   
                </div>
                <div class="col-sm-12">
                    <form method="POST" action="">
                        <label for="id">Titre de l'élément à supprimer :</label>
                        <input type="text" name="id" required>
                        <button type="submit" name="submit">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

</div>



</html>

<?php require_once(__DIR__ . '/dashboard-footer.php') ?>