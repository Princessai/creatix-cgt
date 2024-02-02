<?php 



if (isset($_GET['id'])  && !empty($_GET['id'])) {
    
    $conn = new PDO('mysql:host=localhost;dbname=creatix', 'root', '');

    $id= strip_tags($_GET['id']);

    $sql= 'SELECT * FROM `admin` WHERE `id` = :id; ';

    $query = $conn->prepare($sql);

    $query->bindvalue(':id', $id, PDO::PARAM_INT);

    $query->execute();


    $row = $query->fetch();

    if (!$row) {
        $_SESSION['erreur'] = "cet id n'exsite pas";
        header('location: admins.php');
        die();
    }

    $sql= 'DELETE FROM `admin` WHERE `id` = :id; ';

    $query = $conn->prepare($sql);

    $query->bindvalue(':id', $id, PDO::PARAM_INT);

    $query->execute();

    header('location: admins.php');
}else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: admins.php');
}

