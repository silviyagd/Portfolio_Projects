<?php
/**
 * Created by PhpStorm.
 * User: Silviya
 * Fichier Modele
 */


include_once ('../modele/BaseDeDonnees/config/mesParametresBD.php');
include_once ('../modele/BaseDeDonnees/classes_pdo_2.php');

/**
 * Class Modele
 */
class Modele {
    private $bd;
    
    function __construct() {
        $this->bd = new BaseDeDonnees();
        
    }

    /** Ajouter nouveau livre dans le base de donnee
     * @param $titre
     * @param $auteur
     * @param $annee
     * @param $isbn
     * @param $editeur
     * @param $evaluation
     * @return mixed
     */
        public function ajouter($titre, $auteur, $annee, $isbn, $editeur, $evaluation )
	{
		$requete = "INSERT INTO `livres`(`id`, `titre`, `auteur`, "
                        . "`annee`, `isbn`, `editeur`, `evaluation`) "
                        . "VALUES (NULL, '".$titre."','".$auteur."','".
                        $annee."','".$isbn."','".$editeur."','".$evaluation."')";
                $this->bd->query($requete);
                $resultats = $this->bd->execute($requete);
                //$resultats = $this->bd->resultset();
                return ($resultats);		
	}

    /** Retourne les array avec tous livre du base de donnee
     * @return array
     */
        public function lister()
	{
		$requete = "SELECT * FROM livres";
                $this->bd->query($requete);
                $this->bd->execute($requete);
                $resultats = $this->bd->resultset();
                return ($resultats);		
	}

    /** Modifier un valeur de livre
     * @param $id
     * @param $champ
     * @param $val
     * @return mixed
     */
        public function modifier($id, $champ, $val)
	{
		$requete = "UPDATE `livres` SET `".$champ."`= '".$val."' WHERE id =".$id;
                $this->bd->query($requete);
                $resultats = $this->bd->execute($requete);
                return ($resultats);		
	}

    /** Effacer un livre
     * @param $id
     * @return mixed
     */
        public function suprimer($id)
	{
		$requete = "DELETE FROM `livres` WHERE id =".$id;
                $this->bd->query($requete);
                $resultats = $this->bd->execute($requete);
                return ($resultats);		
	}

    /** Recherche des livre cependant du champ(colomn) et valeur
     * @param $champ
     * @param $valeur
     * @return array
     */
        public function rechercher($champ , $valeur)
	{
        if ($valeur=="null"){
            $requete = "SELECT * FROM livres WHERE ".$champ." LIKE '%%'";
        } else{
            $requete = "SELECT * FROM livres WHERE ".$champ." LIKE '%".$valeur."%'";
        }
		    $this->bd->query($requete);
            $this->bd->execute($requete);
            $resultats = $this->bd->resultset();
        return ($resultats);
	}

}

?>