<?php
    require_once 'ConnexionManager.php';

    class CategorieDao {

        private $bdd;
        public function __construct(){
            $this->bdd = (new ConnexionManager())::getInstance();
        }
        public function getListCategories(){
           $categories = array();
              $req = $this->bdd->query('SELECT * FROM categorie');
                while($data = $req->fetch_assoc()){
                    $categorie = new Categorie();
                    $categorie->id = $data['id'];
                    $categorie->libelle = $data['libelle'];
                    $categories[] = $categorie;
                }
            return $categories;
        }
        public function getCategorieById($id){
            $categorie = new Categorie();
            $req = $this->bdd->query('SELECT * FROM categorie WHERE id = '.$id);
            $data = $req->fetch_assoc();
            $categorie->id = $data['id'];
            $categorie->libelle = $data['libelle'];
            return $categorie;
        }
        public function addCategorie($categorie){
           
        }
        public function updateCategorie($categorie){
           
        }
        public function deleteCategorie($id){
           
        }

    }
?>