
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Articles par Catégorie</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
    <?php require_once 'inc/entete.php'; ?>
    <div id="contenu">
        <?php if (!empty($categories)) : ?>
            <ul>
                <?php foreach ($categories as $categorie) : ?>
                    <li><a href="index.php?action=categorie&id=<?= $categorie->id ?>"><?= $categorie->libelle ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <?php if (!empty($articles)) : ?>
            <?php foreach ($articles as $article) : ?>
                <div class="article">
                    <h2><a href="index.php?action=article&id=<?= $article->id ?>"><?= $article->titre ?></a></h2>
                    <p><?= substr($article->contenu, 0, 300) . '...' ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="message">Aucun article trouvé pour cette catégorie</div>
        <?php endif ?>
    </div>
</body>
</html>
