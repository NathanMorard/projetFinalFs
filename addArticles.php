<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addArticles</title>
</head>
<body>
    <h1>Ajouter un article</h1>
    <?php
    include_once('utils.php');
    check_and_display_error();
    ?>
    <form action="articles.php" method="post">
        <p><label for="text">Titre de l'article</label><input type="text" name="titre" required></p>
        <p><label for="text">Corps de l'article</label><input type="text" name="corps" required></p>
        <p><label for="text">Date de création</label><input type="date" name="date" require></p>
        <button type="submit">Ajouter un article</button>
    </form>
    <a href="dashboard.php.php">Dashboard</a>
</body>
</html>