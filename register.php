<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Gym</title>

    <link rel="icon" href="poze/logo.png">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <link href='https://fonts.googleapis.com/css?family=Teko' rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/register.js"></script>
</head>

<?php
session_start();
if(isset($_SESSION["user"])){
    header("location: welcome.php");
    exit();
}

include_once("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST["nume"]));
    if (empty($username)) {
        echo "<style>#nume{background-color: #ff8484;}</style>";
    } elseif(!preg_match("/^[a-zA-Z0-9_]+/", $username)){
        echo "<script>
            $(document).ready(function (){
               $('#nume').attr('placeholder', 'Numele de utilizator poate contine doar litere, cifre și _ !');
            });
        </script>";
        echo "<style>#nume{background-color: #ff8484;}</style>";
    }else {
        $sql = "SELECT * FROM gym WHERE username = '$username'";
        $user = $pdo->query($sql)->fetch();
        if ($user) {
            echo "<script>
            $(document).ready(function (){
               $('#nume').attr('placeholder', 'Acest nume de utilizator există deja!');
            });
        </script>";
            echo "<style>#nume{background-color: #ff8484;}</style>";
        }
        else {
            $password = htmlspecialchars($_POST["parola"]);
            $confirmation = htmlspecialchars($_POST["confirmare"]);

            if ($password != $confirmation) {
                echo "<script>
                $(document).ready(function (){
                   $('#nume').val('$username');
                   $('#parola').attr('placeholder', 'Parolele nu coincid!');
                   $('#confirmare').attr('placeholder', 'Parolele nu coincid!');
                });
                </script>";
                echo "<style>#parola, #confirmare{background-color: #ff8484;}</style>";
            } elseif (strlen(trim($password)) < 6) {
                echo "<script>
                $(document).ready(function (){
                   $('#nume').val('$username');
                   $('#parola').attr('placeholder', 'Parola trebuie sa aiba cel putin 6 caractere!');
                   $('#confirmare').attr('placeholder', 'Parola trebuie sa aiba cel putin 6 caractere!');
                });
                </script>";
                echo "<style>#parola, #confirmare{background-color: #ff8484;}</style>";
            } else {
                $sql = "INSERT INTO gym (username, password) VALUES ('$username', '$password')";
                $pdo->exec($sql);
                header("location: login.php");
            }
        }
    }
}
unset($pdo);
?>

<body>
<div class="navbar">
    <a href="index.html" class="left_i"><img src="poze/logo.png" class="logo" alt=""></a>
    <div class="d">
        <a href="javascript:void(0)" class="drp active">Contul meu</a>
        <div class="dropdown">
        <a href="login.php">Conectare</a>
        <a href="javascript:void(0)">Înregistrare</a>
        </div>
</div>
    <a href="contact.html">Contact</a>
    <a href="abonamente.html">Abonamente</a>
    <a href="index.html">Prezentare</a>
</div>

<div class="content">
    <div class="frm" id="re">
        <h1 id="reg">Înregistrare</h1>
        <form action="" method="POST">
            <label for="nume"><b>Nume utilizator</b></label>
            <input type="text" placeholder="Introduceti un nume de utilizator" name="nume" id="nume" required>
            <label for="parola"><b>Parolă</b></label>
            <input type="password" placeholder="Introduceti o parola" name="parola" id="parola" required>
            <label for="confirmare"><b>Confirmare parolă</b></label>
            <input type="password" placeholder="Confirmați parola" name="confirmare" id="confirmare" required>
            <button type="submit">Înregistrare</button>
        </form>
        <h4>Ai deja un cont? <a href="login.php">Conectează-te acum!</a></h4>
    </div>
</div>

</body>
</html>
