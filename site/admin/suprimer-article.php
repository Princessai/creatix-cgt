<?php 



if (isset($_GET['id'])  && !empty($_GET['id'])) {
    
    $conn2 = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

    $id= strip_tags($_GET['id']);

    $sql2= 'SELECT * FROM `articles` WHERE `id` = :id; ';

    $rearticle = $conn2->prepare($sql2);

    $rearticle->bindvalue(':id', $id, PDO::PARAM_INT);

    $rearticle->execute();


    $rows = $rearticle->fetch();

    if (!$rows) {
        $_SESSION['erreur'] = "cet id n'exsite pas";
        header('location: dashboard.php');
        die();
    }

    $sql2= 'DELETE FROM `articles` WHERE `id` = :id; ';

    $rearticle = $conn2->prepare($sql2);

    $rearticle->bindvalue(':id', $id, PDO::PARAM_INT);

    $rearticle->execute();

    header('location: dashboard.php');
}else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: dashboard.php');
}

