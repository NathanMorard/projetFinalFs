<?php 

include_once('utils.php'); 


    // 1-  Traiter les champs de formulaire
    if( empty($_POST['titre']) || empty($_POST['corps']) || empty($_POST['date'])) {
        // Informer que les champs sont vides 
        redirect_with_error("addArticles.php", "empty");
    } 
    $titre = $_POST['titre']; 
    $corps = $_POST['corps']; 
    $date = $_POST['date'];


    // Connexion à la base de donnée : 
    require_once('bdd.php');
    try {
        $bdd_options = ["PDO::ATTR_ERR_MODE" => PDO::ERRMODE_EXCEPTION];
        $bdd = new PDO("mysql:host=localhost;dbname=$db_name;port=$db_port", $db_user, $db_pass, $bdd_options); 

    } catch(Exception $e) {
        echo $e->getMessage();
        exit;
    }


    // Préparation de la requête d'insertion dans la base de données

    $rqt = "INSERT INTO article (titre, corps, created_at) VALUES (:titre, :corps, :created_at);"; 

    try {
        $requete_preparee = $bdd->prepare($rqt); 
    
        // Associer les paramètres : 
        $requete_preparee->bindParam(":titre", $titre); 
        $requete_preparee->bindParam(':corps', $corps); 
        $requete_preparee->bindParam(':created_at', $date);
        $requete_preparee->execute();
    } catch (Exception $e) {
        
        if($e->getCode() == 23000 ) { // Le code 23000 correspond à une entrée dupliquée :cela signifie que l'adresse mail est déjà en bdd
            redirect_with_error("addArticles.php","duplicate");
        }

    }

    header('Location: dashboard.php?status=registered');

    