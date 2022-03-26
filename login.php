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
  <script src="js/login.js"></script>
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
    $password = htmlspecialchars($_POST["parola"]);
    if (empty($username)) {
        echo "<style>#nume{background-color: #ff8484;}</style>";
    } else {
        $sql = "SELECT username FROM gym WHERE username='$username' AND password='$password'";
        $user = $pdo->query($sql)->fetch();
        unset($pdo);
        if($user){
            $_SESSION["user"] = $user['username'];
            header("location: welcome.php");
            exit();
        }
        else{
            echo "<script>
                $(document).ready(function (){
                    $('#nume').attr('placeholder', 'Numele sau parola este greșită!');
                    $('#parola').attr('placeholder', 'Numele sau parola este greșită!');
                });
            </script>";
            echo "<style>#nume, #parola{background-color: #ff8484;}</style>";
        }
    }
}
?>

<body>
<div class="navbar">
  <a href="index.html" class="left_i"><img src="poze/logo.png" class="logo" alt=""></a>
  <div class="d">
    <a href="javascript:void(0)" class="drp active">Contul meu</a>
    <div class="dropdown">
        <a href="javascript:void(0)">Conectare</a>
        <a href="register.php">Înregistrare</a>
    </div>
  </div>
  <a href="contact.html">Contact</a>
  <a href="abonamente.html">Abonamente</a>
  <a href="index.html">Prezentare</a>
</div>

<div class="content">
  <div class="frm">
    <h1>CONECTARE</h1>
    <form action="" method="POST">
        <label for="nume"><b>Nume utilizator</b></label>
        <input type="text" placeholder="Introduceti numele de utilizator" name="nume" id="nume" required>
        <label for="parola"><b>Parolă</b></label>
        <input type="password" placeholder="Introduceti parola" name="parola" id="parola" required>
        <button type="submit">Conectare</button>
    </form>
    <h4>Nu ai cont? <a href="register.php">Înregistrează-te acum!</a></h4>
  </div>
</div>

</body>
</html>