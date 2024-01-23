<?php

$host = 'localhost';
$database = 'creatix';
$user = 'root';
$psw = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $psw);
    $conn->exec('SET NAMES utf8');

    if(isset($_POST['connexion'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        //verifier 
        $requete = "SELECT * FROM admins WHERE emails = $email and password = $password";
    
        $reponse = $conn->query($requete);
    
        var_dump($reponse);
        
    }
} catch (PDOException $error) {
    echo "<h1 align='center'>Impossible de se connecter à la base de données</h1>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <form action="connexion.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <button type="submit" name="connexion" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>