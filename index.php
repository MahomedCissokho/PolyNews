<?php
	require_once 'controleur/controller.php';

	$controller = new Controller();

	if(!isset($_GET['action'])){
		$controller->showAccueil();
	}else{
		if(strtolower($_GET['action']) === 'article'){
			if(isset($_GET['id'])){
				$controller->showArticle($_GET['id']);
			}else{
				$controller->showErrorPage();
			}
		}else if(strtolower($_GET['action']) === 'categorie'){
			if(isset($_GET['id'])){
				$controller->showCategorie($_GET['id']);
			}else{
				$controller->showErrorPage();
			}
		}else{
			$controller->showAccueil();
		}
	}
?>