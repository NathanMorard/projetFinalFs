<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <h1>Modifier l'articles</h1>
    <?php
    require_once('bdd.php');
    $id = $_GET["id"]; 
    $bdd = new mysqli("localhost:3307", "root", "", "projetfs");
    $bdd->set_charset("utf8");
    $requete = "SELECT id,titre,corps FROM article WHERE id=$id;";
    $resultat = $bdd->query($requete);
    $article = $resultat->fetch_assoc();
    ?>

    <form action="upArticle.php?id=$id" method="post">
        <p><textarea style="display:none;" type="text" name="id"><?php echo $article['id']; ?></textarea></p>
        <p><textarea type="text" name="titre" required ><?php echo $article['titre']?></textarea></p>
        <p><textarea type="text" name="corps" required><?php echo $article['corps']?></textarea></p>
        <button type="submit">Modifier l'article</button>
    </form>
    <a href="dashboard.php">Dashboard</a>
</body>
</html>