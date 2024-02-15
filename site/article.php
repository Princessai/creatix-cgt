<?php include('header.php'); ?>

<?php
try {

    if (isset($_GET['id']) && !empty($_GET['id'])) {

        $sql = "SELECT * FROM categories WHERE id=" . $_GET['id'];
        $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');
        $request = $conn->prepare($sql);
        $request = $conn->query($sql);
        $categorie = $request->fetch();

        // Réinitialisation de la séquence d'auto-incrémentation
        // $resetAutoIncrementSql = "ALTER TABLE articles AUTO_INCREMENT = 1";
        // $conn->exec($resetAutoIncrementSql);

        $sql2 = "SELECT * FROM articles WHERE id=" . $_GET['id'];

        $rearticle = $conn->prepare($sql2);

        $rearticle->execute();

        $articles = $rearticle->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $error) {
    die("Erreur :" . $error->getMessage());
}
?>


<div class="container mt-5" style="font-family: Montserrat; font-size: 15px">
    <div class="row">
        <?php
        $firstArticle = true; // Variable pour suivre le premier article

        foreach ($articles as $article) :
        ?>

            <?php if ($firstArticle) : ?>
                <h4><?= $article['titre'] ?></h4>
                <div class="col-sm-12 d-flex justify-content-center ">
                    <div class="card border-0" style="width: 1000px;">
                        <p class="card-text"><small>Publié le: <?= $article['date_public'] ?></small></p>
                        <img src="admin/uploads/<?= $article['image'] ?>" class="card-img-top w-75 " alt="...">
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <p class="card-text">
                        <?= nl2br($article['contenu']) ?>
                    </p>
                </div>
                <?php $firstArticle = false; // Marquer que le premier article a été affiché 
                ?>
            <?php endif; ?>

        <?php endforeach; ?>
    </div>
</div>

<?php include('footer.php'); ?>