<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PolyNew</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <?php require_once 'inc/entete.php'; ?>
    <div id="contenu">
        <!-- Affichage des catégories avec l'élément "Accueil" -->
        <ul>
            <li><a href="index.php?action=accueil">Accueil</a></li>
            <?php if (!empty($categories)) : ?>
                <?php foreach ($categories as $categorie) : ?>
                    <li><a href="index.php?action=categorie&id=<?= $categorie->id ?>"><?= $categorie->libelle ?></a></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>

        <!-- Titre principal -->
        <h1>Votre Site d'Actualité N°1 au SENEGAL</h1>

        <!-- Affichage des articles -->
        <?php if (!empty($articles)) : ?>
            <?php foreach ($articles as $article) : ?>
                <div class="article">
                    <h1><a href="index.php?action=article&id=<?= $article->id ?>"><?= $article->titre ?></a></h1>
                    <p><?= substr($article->contenu, 0, 300) . '...' ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="message">Aucun article trouvé</div>
        <?php endif; ?>
    </div>
</body>
</html>
