<?php

include("../modele/Modele.php");
$modele = new Modele();



//var_dump($_GET);

if(isset($_GET["ajouter"])){
    $verif = $modele->ajouter($_GET["titre"], $_GET["auteur"], $_GET["annee"], 
            $_GET["isbn"], $_GET["editeur"], $_GET["evaluation"]);
    echo $verif;
    if($verif){
        echo "succès";
    }
    else{
        echo "échoué";
    }
    $resultats = $modele->lister();
    include("../vues/afficher.php");
}

if(isset($_GET["lister"])){
    $resultats = $modele->lister();

    file_put_contents("../json/donnee.json",json_encode($resultats));
    $p = file_get_contents("../json/donnee.json");
 //   var_dump($p);

    if($resultats){
        include("../vues/afficher.php");
    }
    else{
        echo "pas de résultats";
    }
}

if(isset($_GET["modifier"])){
    $res = $modele->modifier($_GET["id"], $_GET["champ"], $_GET["val"]);
    echo $res;
    if($res){
        echo "réussi";        
    }
    else{
        echo "échoué";
    }
    $resultats = $modele->lister();
    include("../vues/afficher.php");
}

if(isset($_GET["suprimer"])){
    $res = $modele->suprimer($_GET["id"]);
    echo $res;
    if($res){
        echo "réussi";
    }
    else{
        echo "échoué";
    }
    $resultats = $modele->lister();
    include("../vues/afficher.php");
}

if(isset($_GET["recherch"])){
        $resultats = $modele->rechercher($_GET["champ"], $_GET["value"]);

    include("../vues/afficher.php");
}




































/*

    if (isset($_GET['lister'])) {
        // On affiche la liste des livres
        $livres = $modele->getListeLivres();
        include '../vues/ListeDesLivres.php';
    } 
    if (isset($_GET['afficher'])) {
        // Afficher le livre requis
        //if (isset($_GET['livre']) && $_GET['livre']!="" ){	
        $livre = $modele->getLivre($_GET['livre']);
        if($livre){
            include '../vues/voirLivre.php';
        }
        else{
            //echo "pas de résultats";
        }
    }
    if (isset($_GET['effacer'])) {
        // On affiche la liste des livres
        $id = $_GET['id']; 
        //$livres = $modele->effacer($id);      
        console.log($id);
    } 
*/

/*
class Controleur {

    public $modele;

    public function __construct() {
        $this->modele = new Modele();
    }

    public function invoke() {
        if (isset($_GET['lister'])) {
            // On affiche la liste des livres
            $livres = $this->modele->getListeLivres();
            include 'vues/ListeDesLivres.php';
        } 
        if (isset($_GET['afficher'])) {
            // Afficher le livre requis
            //if (isset($_GET['livre']) && $_GET['livre']!="" ){	
            $livre = $this->modele->getLivre($_GET['livre']);
            if($livre){
                include 'vues/voirLivre.php';
            }
            else{
                //echo "pas de résultats";
            }
        }
        //else echo "Rentrez un titre de livre.";
        //}
    }

}
*/
?>