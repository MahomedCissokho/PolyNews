<?php
    require_once 'ConnexionManager.php';

    class ArticleDao {
        private $bdd;

        public function __construct(){
            $this->bdd = (new ConnexionManager())::getInstance();
        }
        public function getListArticles(){
            $articles = array();
            $req = $this->bdd->query('SELECT * FROM article');
            while($data = $req->fetch_assoc()){
                $article = new Article();
                $article->id = $data['id'];
                $article->titre = $data['titre'];
                $article->contenu = $data['contenu'];
                $article->categorie = $data['categorie'];
                $article->dateCreation = $data['dateCreation'];
                $article->dateModification = $data['dateModification'];
                $articles[] = $article;
            }
            return $articles;
        }
        public function getArticleById($id){
            $req = $this->bdd->query('SELECT * FROM article WHERE id = '.$id);
            $data = $req->fetch_assoc();
            $article = new Article();
            $article->id = $data['id'];
            $article->titre = $data['titre'];
            $article->contenu = $data['contenu'];
            $article->categorie = $data['categorie'];
            $article->dateCreation = $data['dateCreation'];
            $article->dateModification = $data['dateModification'];
            return $article;

        }
        public function getArticlesByCategorie($idCategorie){
            $articles = array();
            $req = $this->bdd->query('SELECT * FROM article WHERE categorie = '.$idCategorie);
            while($data = $req->fetch_assoc()){
                $article = new Article();
                $article->id = $data['id'];
                $article->titre = $data['titre'];
                $article->contenu = $data['contenu'];
                $article->categorie = $data['categorie'];
                $article->dateCreation = $data['dateCreation'];
                $article->dateModification = $data['dateModification'];
                $articles[] = $article;
            }
            return $articles;

        }
        public function addArticle($article){
            

        }
        public function updateArticle($article){

        }
        public function deleteArticle($id){

        }

    }

?>