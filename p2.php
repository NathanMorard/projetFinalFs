<?php

session_start(); 

if(empty($_POST["pseudo"])) {
    header('Location: index.html');
    exit;
}
// $pseudo = htmlspecialchars($_POST["pseudo"]);
$pseudo = htmlspecialchars($_POST["pseudo"]);
$_SESSION["pseudo"] = $pseudo;
echo "&amp; &Eacute; Bonjour $pseudo. Je t'ai créé la session : " . session_id() . " ";

?>
<a href="p3.php">page suivante</a>
