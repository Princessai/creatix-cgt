<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-admin.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <form class="connexionForm" action="" method="POST">
                    <?php
                    $host = 'localhost';
                    $database = 'creatix';
                    $user = 'root';
                    $psw = '';

                    try {
                        $conn = new PDO("mysql:host=$host;dbname=$database", $user, $psw);

                        if (isset($_POST['connexion'])) {
                            $email = htmlspecialchars($_POST['email']);
                            $password = $_POST['password'];

                            if (!empty($email) and !empty($password)) {
                                //verifier 
                                $requete = $conn->query("SELECT * FROM admin WHERE email = '$email' AND password = '$password'");
                                $response = $requete->fetch();

                                if ($response && !empty($response['id'])) {
                                    $_SESSION['email'] = $email;
                                    $_SESSION['password'] = $password;
                                    $_SESSION['id'] = $response['id'];
                                    header('Location: dashboard.php');
                                } else {
                                    echo "<h6>Email ou mot de passe incorrect !</h6>";
                                }
                            } else {
                                echo "<h6>Impossible de se connecter à la base de données</h6>";
                            }
                        }
                    } catch (PDOException $error) {
                        echo "Erreur :" . $error->getMessage();
                    }


                    ?>
                    <h4>Connexion</h4>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe </label>
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