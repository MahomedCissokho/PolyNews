<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Details d'un article</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <?php require_once 'inc/entete.php'; ?>
    <div id="contenu">
        <?php if (isset($article)) : ?>
                <div class="monarticle">
                    <h1><?= $article->titre ?></h1>
                    <p><?= $article->contenu ?></p>
                    <p>Créé le <?= $article->dateCreation ?></p>
                    <p>Modifié le <?= $article->dateModification ?></p>
                </div>
        <?php endif ?>
    </div>
</body>
</html>
