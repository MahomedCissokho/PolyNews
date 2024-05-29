<?php
require_once 'controleur/Controller.php';

$controller = new Controller();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'article':
            if (isset($_GET['id'])) {
                $controller->showArticle($_GET['id']);
            } else {
                $controller->showErrorPage();
            }
            break;
        case 'categorie':
            if (isset($_GET['id'])) {
                $controller->showCategorie($_GET['id']);
            } else {
                $controller->showErrorPage();
            }
            break;
        case 'accueil':
        default:
            $controller->showAccueil();
            break;
    }
} else {
    $controller->showAccueil();
}
?>
