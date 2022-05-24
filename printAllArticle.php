<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>
  <body>
      <h1>Tout les articles du site</h1>
        <?php
          include_once('utils.php');
          require('bdd.php');

        $bdd_options = ["PDO::ATTR_ERR_MODE" => PDO::ERRMODE_EXCEPTION];
        $bdd = new PDO("mysql:host=localhost;dbname=$db_name;port=$db_port", $db_user, $db_pass, $bdd_options); 
        
        $rqt = "SELECT titre, corps, created_at, updated_at  FROM article;";
        $requete_preparee = $bdd->prepare($rqt);
        $requete_preparee->bindParam(":email", $email);
        $requete_preparee->execute(); 
        $results = $requete_preparee->fetchAll(\PDO::FETCH_ASSOC);
        
        for($i=0; $i<count($results); $i++) {
          $row = $results[$i];

          echo $row['titre'], " ", $row['corps'], " ", $row['created_at'];

          echo nl2br("\r\n");
          echo nl2br("\r\n");
        }
        ?>
      <p><a href="register_form.php">S'inscrire</a></p>
  </body>
</html>