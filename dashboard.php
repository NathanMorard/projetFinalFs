<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Vous vous êtes connecté avec succès ! Bravo !!</h1>

    <?php
    include_once('utils.php');
    require('bdd.php');
    require('p3.php');
    $email = $_SESSION["email"]; 
    
    echo "Bonjour $email. Je t'ai créé la session : " . session_id() . " ";
    ?>



    <h2>Mes articles</h2>

        <a href="addArticles.php">Ajouter un articles</a>

    <?php
        // require_once('bdd.php');


    // $rqt ="SELECT id FROM utilisateur WHERE email = :email;";
   

    // try {
    //     $bdd_options = ["PDO::ATTR_ERR_MODE" => PDO::ERRMODE_EXCEPTION];
    //     $bdd = new PDO("mysql:host=localhost;dbname=$db_name;port=$db_port", $db_user, $db_pass, $bdd_options); 
    //     $requete_preparee = $bdd->prepare($rqt); 

    //     // Associer les paramètres : 
    //     $requete_preparee->bindParam(":email", $email); 
    //     $requete_preparee->execute();
    // } catch (Exception $e) {
        
    //     if($e->getCode() == 23000 ) { // Le code 23000 correspond à une entrée dupliquée :cela signifie que l'adresse mail est déjà en bdd
    //         redirect_with_error("updateArticle.php","duplicate");
    //     }

    // }
    

    // echo $rqt;

    $email = $_SESSION["email"]; 
    echo nl2br("\r\n");
    echo nl2br("\r\n");

    

    $bdd_options = ["PDO::ATTR_ERR_MODE" => PDO::ERRMODE_EXCEPTION];
    $bdd = new PDO("mysql:host=localhost;dbname=$db_name;port=$db_port", $db_user, $db_pass, $bdd_options); 
    
    $rqt = "SELECT article.id, titre, corps, created_at  FROM article JOIN utilisateur ON utilisateur.id=article.id_utilisateur WHERE email = :email";
    $requete_preparee = $bdd->prepare($rqt);
    $requete_preparee->bindParam(":email", $email);
    $requete_preparee->execute(); 
    $results = $requete_preparee->fetchAll(\PDO::FETCH_ASSOC);
    
    for($i=0; $i<count($results); $i++) {
        $row = $results[$i];
        $id = $row["id"];
    echo "<form action='updateArticle.php?id=$id' method='post'>";
    echo $row['titre'], " ", $row['corps'], " ", $row['created_at'];
    echo nl2br("\r\n");
    echo '<button type="submit">Modifier</button>';

    echo nl2br("\r\n");
    echo nl2br("\r\n");
    
    }
    ?>

    <p><a href="deconnexion.php">Se deconnecter</a></p>
</body>
</html>