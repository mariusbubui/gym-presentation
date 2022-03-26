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
    <script src="js/welcome.js"></script>
</head>

<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location: login.php");
    exit();
}
?>

<body>
<div class="navbar">
    <a href="index.html" class="left_i"><img src="poze/logo.png" class="logo" alt=""></a>
    <div class="d">
        <a href="javascript:void(0)" class="drp active">Contul meu</a>
        <div class="dropdown">
            <a href="logout.php" id="deconectare">Deconectare</a>
        </div>
    </div>
    <a href="contact.html">Contact</a>
    <a href="abonamente.html">Abonamente</a>
    <a href="index.html">Prezentare</a>
</div>
<div class="content">
    <div class="frm welcome">
        <h1>Bine ai venit în contul tău, <?php echo $_SESSION["user"];?>!</h1>
        <div id="creg">Toți clienții Gym Fitness care dețin un cont de utilizator primesc din partea
            noastra un plan de antrenament. <br><br>
            <b>PUSH</b>: împins la bancă dreaptă cu bara, împins la banca înclinată cu gantere,
            fluturări la aparat, împins frontal cu bara deasupra capului, fluturări laterale cu gantera pentru deltoizi,
            extensii triceps cu gantera deasupra capului <br>
            <b>PULL</b>: ramat din aplecat cu bara, tracțiuni la helcometru priză largă,
            ramat din șezut la helcomentru cu priză neutră, flexii cu bara,
            flexii la bancă înclinată cu gantere, trapez cu bara,
            fluturări cu gantera din aplecat
            <br>
            <b>PICIOARE</b>:
            genuflexiuni cu bara la ceafa, îndreptări cu picioarele drepte, presă pentru picioare,
            extensii cvadriceps la aparat, flexii biceps femural la aparat, două exerciții gambe la alegere
        </div>
    </div>
</div>

</body>
</html>
