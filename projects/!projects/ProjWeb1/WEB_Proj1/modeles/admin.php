<?php

/** Function qui recupere le information d'administrateur
 * @param string $courriel
 * @return array|null
 */
function getUsager($courriel="")
{
    $aRes = Array();
    $db = connection();
	
    $requ = "SELECT * FROM n31__admin WHERE courriel = '". $courriel ."' LIMIT 0,1";
    //echo $requ;
    $aMenu = Array();
    if($resultat = mysqli_query($db, $requ))
    {
	$row = mysqli_fetch_assoc($resultat);
    }
    return $row;
}

/** Function qui verifie le mot de pass entre et celle dans le base de donnee
 * @param $motPasse
 * @param $hash
 * @return bool - return true s'ils son identique
 */
function verifUsager($motPasse, $hash)
{
    $res = false;

    if (crypt($motPasse, $hash) == $hash)
    {
       $res = true;
    }
		
    return $res;
		
}

/**
 * @return bool
 */
function verifAdmin()
{
    $dbConnexion = false;
    $aUsager = getUsager($_POST['courriel']);
    $dbConnexion = verifUsager($_POST['motPasse'], $aUsager['passwd']);
    if($dbConnexion ==true)
    {
	$_SESSION['login'] = true;
	$_SESSION['courriel'] = $_POST['courriel'];
    }
    else
    {
	$_SESSION['login'] = false;
    }
return $dbConnexion;
}

/** Function qui donne le resulatat pour le Menu choisi
 * @param $requ - on prendre du requete de base de donnee
 * @return array
 */
function listeMenu($requ)
{
    $db = connection();
    $aRes = Array();
    //$requ = $_GET['req'];
		
    if($resultat = mysqli_query($db, $requ))
    {
	while($row = mysqli_fetch_assoc($resultat))
	{
            $aRes[] = $row;
	}
    }

    return $aRes;
}


/**
 * Function qui ajouter l'information pour le tableau nomenclature - Type CDJ, Arrondissement  et Activites
 * @param type $tableau
 * @return boolean - true si le modification est fini avec succes
 */
function AjouterNouveauInfNom ($tableau)
{
    $db = connection();
    $res = false;

    if (isset($_POST['ajoute']))
    {
        $req = 'insert into '. $tableau. ' (nom) VALUES ("'.$_POST['ajoute'].'")' ;
        if ($resultat = mysqli_query($db, $req))
        {
            $res = true;
        }

    }

 return$res;

}

/**
 * Function qui faire insertion de nouveau CDJ
 * @return boolean
 */
function AjouterNouveauInfNomCDJ() 
{

    //echo "AjouterNouveauInfNomCDJ";
    $db = connection();
    $res = false;
    if (isset($_POST['ajouteCDJ']))
    {

        $fileName = uploadFile();

        $req = 'insert into '. ' n31__coordonnees_CDJ '."\n\t";
        $req .= ' (nom_CDJ , nom_Contacts , adresse , telephone , courriel , adresse_site , ';
        $req .= ' id_arrondissement , description_CDJ , id_type , debut , fin , image) '."\n\t";

        $req .= ' values ("'.$_POST["nom_CDJ"].'" , "'.$_POST["nomCont"].'" , "'.$_POST["adresse_CDJ"].'" , "'.$_POST["tel_CDJ"];
        $req .='" , "'.$_POST["courriel"].'" , "'.$_POST["site"].'" ,'.$_POST["arronds"];
        $req .= ' , "' .$_POST["desc"]. '" , ' .$_POST["typeCDJ"] .' , "' .$_POST["debut"]. '" , "' .$_POST["fin"].'" , "'.$fileName.'")'."\n\t";
        
         if (execModif($req)){echo "Le modification est fini";}
    }

    return $res;
     
}


/**
 * Function qui faire insertion de nouveau SDG
 * @return boolean
 */
function AjouterNouveauInfNomSDG()
{

    //echo "AjouterNouveauInfNomCDJ";
    $db = connection();
    $res = false;
    if (isset($_POST['ajouteSDG']))
    {
        $req = 'INSERT INTO n31__service_de_garde (prix, id_CDJ, debut, fin) VALUES '."\n\t";

        $req .= ' ('.$_POST["prixSDG"].' , '.$_POST["nomCDJ"].' , "'.$_POST["debutSDG"].'" , "'.$_POST["FinSDG"].'")'."\n\t";

     //   echo $req;
        if (execModif($req)){echo "Le modification est fini";}

    }

    return $res;

}


/** Function pour retourne le nom , ca ce utilise pour l'information nomenclature 
 * @param $aTableau - le nom du tableau
 * @param $id - l'id du item
 * @return string le valeur qui pourai etre modifier
 */
function recupereModifInf($aTableau ,$id )
{
    $db = connection();

    $res = Array();
    $req = 'select nom from '.$aTableau.' where id='.$id ;
    //echo $req;
    if($resultat = mysqli_query($db, $req))
    {
        $res = mysqli_fetch_assoc($resultat);
    }
    return implode($res);
}


/** Function pour executer le requet Update
 * @param $tableau - le nom du tableau
 * @return bool|mysqli_result - return true si le requette est executer avec successe
 */
function ModifierInf($tableau)
{

    $db = connection();
    $res = false;
    if (isset($_POST['submit']))
    {
        $req = 'update '. $tableau. ' set nom ="'.$_POST['modif'].'" where id='.$_GET['id'] ;

        $res = mysqli_query($db, $req);
    }

    return $res;
}

/** Function qui donne tous l'information du tableau $aTableau et $id
 * @param $id
 * @param $aTableau
 * @param $tous - si est true on ajoute en requet condition , sinon la function retourn toul le information pour le tableau donnee
 * @return array
 */
function recuperTableauInf($id='' , $aTableau, $tous)
{
    $db = connection();

    $res = Array();
    if ($tous) {
        $req = 'select * from ' . $aTableau . ' where id=' . $id;
    }
    else
    {
        $req = 'select * from ' . $aTableau ;
    }
    //echo $req;
    if($resultat = mysqli_query($db, $req))
    {
            while($row = mysqli_fetch_assoc($resultat))
            {
                $res[] = $row;
            }
            return $res;
    }
    //return $res;

}

/**
 * Function qui faire le modification pour un CDJ
 * @return boolean
 */
function ModifierInfCDJ()
{
    $db = connection();
    $res = false;
    if (isset($_POST['sauvegarderCDJ']))
    {

        $req = 'update '. 'n31__coordonnees_CDJ'. ' set ';

        $req .= ' nom_CDJ ="'.          $_POST['nom_CDJ'].'" , ';
        $req .= ' nom_Contacts ="'.     $_POST['nomCont'].'" , ';
        $req .= ' adresse ="'.          $_POST['adresse_CDJ'].'" , ';
        $req .= ' telephone ="'.        $_POST['tel_CDJ'].'" , ';
        $req .= ' courriel ="'.         $_POST['courriel'].'" , ';
        $req .= ' adresse_site ="'.     $_POST['site'].'" , ';
      //  $req .= ' image ="'.''.'" , ';
        $req .= ' id_arrondissement ="'.$_POST['arronds'].'" , ';
        $req .= ' description_CDJ ="'.  $_POST['desc'].'" , ';
        $req .= ' id_type ="'.          $_POST['typeCDJ'].'" , ';
        $req .= ' debut ="'.            $_POST['debut'].'" , ';
        $req .= ' fin ="'.              $_POST['fin'].'"';

        if (isset($_POST['myFile'])) {
            $fileName = uploadFile();
            $req .= ', image ="' . $fileName . '" ';
        }

        $req .= ' where id ='.$_GET['id'];
        if (execModif($req)){echo "Le modification est fini";}
    }

    return $res;
}

/** Function pour supprimer línformation dependant le cas
 * @param $aMenu
 */
function SupprimeInf($aMenu)
{
    $menuItem = recupereMenuInf($aMenu);
    //recupere le nom du tableau dynamiquement
    $tableau = $menuItem['tableau'];
    //echo $tableau;

    switch ($tableau)
    {
        case "n31__arrondissements":
            
            $requ = 'select * from n31__coordonnees_CDJ where id_arrondissement='.$_GET['id'];

            if (verifEnfants($requ))
            {
                $menuItem = 'Camps de Jour';
                /*le nouveau sql pour la vusualisation d'information*/
                $req = ' select t1.id as id, t1.nom_CDJ as nom, t2.nom as Arrondissement, t3.nom as "Type de CDJ" ';
                $req .= ' from n31__coordonnees_CDJ as t1 ';
                $req .= ' inner join n31__arrondissements as t2 ';
                $req .= ' on t1.id_arrondissement=t2.id ';
                $req .= ' inner join n31__types_CDJ as t3 ';
                $req .= ' on t1.id_type=t3.id ';
                $req .= ' where t1.id_arrondissement='.$_GET["id"];
                $req .= ' order by t1.nom_CDJ , t2.nom, t3.nom ';

                //echo '$menuItem';
                AfficheListeSupr($req, $menuItem );

            }
            else
            {
                $aTableau = 'n31__arrondissements';
                if (effaceInf($_GET['id'] , $aTableau ))
                {
                    echo "<h1>L'information est efacée</h1>";
                }    ;
            }

        break;

        case "n31__types_CDJ":

            $requ = 'select * from n31__coordonnees_CDJ where id_type='.$_GET['id'];

            if (verifEnfants($requ))
            {
                $menuItem = 'Camps de Jour';
                /*le nouveau sql pour la vusualisation d'information*/
                $req = ' select t1.id as id, t1.nom_CDJ as nom, t2.nom as Arrondissement, t3.nom as "Type de CDJ" ';
                $req .= ' from n31__coordonnees_CDJ as t1 ';
                $req .= ' inner join n31__arrondissements as t2 ';
                $req .= ' on t1.id_arrondissement=t2.id ';
                $req .= ' inner join n31__types_CDJ as t3 ';
                $req .= ' on t1.id_type=t3.id ';
                $req .= ' where t1.id_type='.$_GET["id"];
                $req .= ' order by t1.nom_CDJ , t2.nom, t3.nom ';
                //echo '$menuItem';
                AfficheListeSupr($req, $menuItem );

            }
            else
            {
                $aTableau = 'n31__types_CDJ';
                if (effaceInf($_GET['id'] , $aTableau ))
                {
                    echo "<h1>L'information est efacée</h1>";
                }    ;
            }


        break;


        case "n31__specialites":

            $requ = 'select * from n31__specialites_CDJ where id_specialites='.$_GET['id'];

            if (verifEnfants($requ))
            {
                $menuItem = 'Camps de Jour';
                /*le nouveau sql pour la vusualisation d'information*/
                $req = ' select t1.id as id, t1.nom_CDJ as nom, t2.nom as Arrondissement, t3.nom as "Type de CDJ" ';
                $req .= ' from n31__coordonnees_CDJ as t1 ';
                $req .= ' inner join n31__arrondissements as t2 ';
                $req .= ' on t1.id_arrondissement=t2.id ';
                $req .= ' inner join n31__types_CDJ as t3 ';
                $req .= ' on t1.id_type=t3.id ';
                //$req .= ' order by t1.nom_CDJ , t2.nom, t3.nom ';
                $req .= ' inner join n31__groupe_CDJ as t4 ';
                $req .= ' on t4.id_coordonnees_CDJ=t1.id ';
                $req .= ' inner join n31__specialites_CDJ as t5 ';
                $req .= ' on t5.id=t4.id ';
                $req .= ' where t5.id_specialites='.$_GET["id"];
                $req .= ' order by t1.nom_CDJ , t2.nom, t3.nom ';

                //echo '$menuItem';
                AfficheListeSupr($req, $menuItem );

            }
            else
            {
                $aTableau = 'n31__specialites';
                if (effaceInf($_GET['id'] , $aTableau ))
                {
                    echo "<h1>L'information est efacée</h1>";
                }    ;
            }

        break;



        case "n31__coordonnees_CDJ":
            if ($_GET['action']== "supprimerGRP") {
                $aTableau = 'n31__groupe_CDJ';
                $atableauAct = 'n31__specialites_CDJ';

                $req = 'select * from n31__specialites_CDJ where id='.$_GET['id'] ;

                $aActivites = verifEnfants($req) ;
                if ($aActivites) {
                    foreach ($aActivites as $value)
                    {
                        $aID = $value['id'];
                         if (!(effaceInf($aID , $atableauAct))) {
                             echo "Pas de tous activites sont effacee";
                         }
                    }
                }
                if (effaceInf($_GET['id'] , $aTableau ))
                    {
                        echo "<h1>L'information est efacée</h1>";
                    }
                }


            else {
                $aTableau = 'n31__coordonnees_CDJ';
                $aID=$_GET['id'];
                $req = 'select id from n31__groupe_CDJ where id_coordonnees_CDJ ='.$aID;
                $arrGrp =verifEnfants($req);
                if ($arrGrp)
                {
                    foreach ($arrGrp as $value)
                    {
                        $idGRP = $value['id'];
                        $requ = 'select id from n31__specialites_CDJ where id =' . $idGRP;
                        $arrSpec = verifEnfants($requ);
                        if ($arrSpec){
                            foreach ($arrSpec as $cleSP) {
                                effaceInf($cleSP['id'], "n31__specialites_CDJ");
                            }
                        }
                        effaceInf($idGRP, "n31__group_CDJ");
                    }
                }
               if (effaceInf($_GET['id'] , $aTableau ))
                {
                    echo "<h1>L'information est efacée</h1>";
                }
            }
        break;


        case "n31__commentaires":

            $aTableau = 'n31__commentaires';
            if (effaceInf($_GET['id'] , $aTableau ))
            {
                echo "<h1>L'information est efacée</h1>";
            }

        break;



        case "n31__service_de_garde":

            $aTableau = 'n31__service_de_garde';
            if (effaceInf($_GET['id'] , $aTableau ))
            {
                echo "<h1>L'information est efacée</h1>";
            }

        break;


    }

}

/** Function qui execite un requete et retourne les resultats
 * @param $requ
 * @return array
 */
function verifEnfants($requ)
{
    $db = connection();
     $res = array();
   if ($resultat = mysqli_query($db, $requ)) {
        while ($row = mysqli_fetch_assoc($resultat)) {
            $res[] = $row;
        }
        return $res;
    }
}

/** Function qui effacer le "row" du tableau, quand on donne le "ID" et not du tableau
 * @param $aId
 * @param $aTableau
 * @return bool -  return TRUE si le requete est executer avec success
 */
function effaceInf($aId , $aTableau)
{
    $db = connection();
    $res = false;
    $req = 'delete from '.$aTableau .' where id ='.$aId;
    //echo $req;
    if ($resultat = mysqli_query($db, $req)) {
        $res = true;
    }
    return$res;
}

/**
 * @param $req - requete qui sera executer
 * @return bool - return TRUE si le requete est executer avec success
 */
function execModif($req)
{
    $db = connection();
    $res = false;
    if ($resultat = mysqli_query($db, $req)) {
        $res = true;
    }
    return $res;
    
}


/** Function pour executer le requet Update
 * @param $tableau - le nom du tableau
 * @return bool|mysqli_result - return true si le requette est executer avec successe
 */
function ModifierInfSDG()
{

    $db = connection();
    $res = false;
    if (isset($_POST['modifSDG']))
    {
        $req = 'update  n31__service_de_garde set ';
        $req .=' prix ='.$_POST['prixSDG'].', ' ;
        $req .= ' debut = "' .$_POST['debutSDG'].'", ';
        $req .= ' fin = "'.$_POST['finSDG'].'"';
        $req .= ' where id='.$_GET['id'] ;

        //  echo $req;

        $res = mysqli_query($db, $req);
    }

    return $res;
}

/** Function pour modifier línformation de commentaires
 * @return bool|mysqli_result
 */
function ModifierInfCom()
{

    $db = connection();
    $res = false;
    if (isset($_POST['modifCom']))
    {
        $req = 'update  n31__commentaires set ';
        $req .=' nom ="'.$_POST['nom'].'", ' ;
        $req .= ' commentaire = "' .$_POST['commentaire'].'", ';
        $req .= ' note = '.$_POST['note'].',';
        $req .= ' date = "'.$_POST['date'].'" ';
        $req .= ' where id='.$_GET['id'] ;

        $res = mysqli_query($db, $req);
    }

    return $res;

}

/** Function síl a deja Service de Garde pour le choisi CDJ
 * @return bool
 */
function verifSDG()
{
    $res= false;
    if (isset($_POST['ajouteSDG']))
    {
        $requ = 'select * from n31__service_de_garde where id_CDJ='.$_POST["nomCDJ"];
        if ($aRes=verifEnfants($requ))
        {
            $res = true;
        }
    }
    return $res;

}

/** Function qui affiche le column name du list
 * @param $requ - le requet pour execution
 * @return array
 */
function colInf($requ)
{
    $db = connection();
    $aRes = Array();

    if($resultat = mysqli_query($db, $requ)) {
        $res = mysqli_fetch_fields($resultat);
        foreach ($res as $val) {

            $aRes[] = $val->name;
        }
    }
    return $aRes;
}


/** Function qui ajout nouveau Group pour CDJ et les activites de cette group
 * @return bool|mysqli_result return true si l'information est enregistre dans le base de donnee
 */
function AjouterNouveauInfGRP()
{
   $db = connection();
    $res = false;

    if (isset($_POST['ajouteGRP']))
    {
        $req = 'INSERT INTO n31__groupe_CDJ (age_min, age_max , prix_CDJ  ,description , id_coordonnees_CDJ) VALUES '."\n\t";

        $req .= ' ('.$_POST["ageMin"].' , '.$_POST["ageMax"].' , '.$_POST["prixGRP"].' , "'.$_POST["desc"].'" ,'.$_POST["nomCDJ"].')'."\n\t";

        $res = mysqli_query($db, $req);

              $req = "select max(id) as id from n31__groupe_CDJ";
                
              $aID = verifEnfants($req);

             foreach ($_POST['activites'] as $value)
            {
                $req = ' INSERT INTO n31__specialites_CDJ (id , id_specialites) VALUES '."\n\t";
            
                $req .= ' ('. $aID[0]['id'] .','.$value.')';
                $res = mysqli_query($db, $req);
            }

//        var_dump($_POST);
   }

    return $res;

}



/** Function pour unpload du fichier  - http://www.sitepoint.com/file-uploads-with-php/
 * @return string - le chemin du fichier
 */
function  uploadFile()
{

    define("UPLOAD_DIR", "../images_BD/");

    if (!empty($_FILES["myFile"])) {
        $myFile = $_FILES["myFile"];

        if ($myFile["error"] !== UPLOAD_ERR_OK) {
            echo "<p>An error occurred.</p>";
            exit;
        }

        // ensure a safe filename
        $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

        // don't overwrite an existing file
        $i = 0;
        $parts = pathinfo($name);
        while (file_exists(UPLOAD_DIR . $name)) {
            $i++;
            $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
        }

        // preserve file from temporary directory
        $success = move_uploaded_file($myFile["tmp_name"],
            UPLOAD_DIR . $name);
        if (!$success) {
            echo "<p>Unable to save file.</p>";
            exit;
        }

        // set proper permissions on the new file
       return UPLOAD_DIR .$name ;

    }

}

/** Function pour modifier les group de CDJ
 * @param $ageMin - le valeur du age minimale
 * @param $ageMax- le valeur du age maximale
 * @param $desc- le valeur du description
 * @param $prix- le valeur du prix
 * @param $idGRP - - le valeur d'id du group
 * @param $arrActivites -- le valeur des activites choisis
 * @return bool 
 */
function ModifGruopCDJ($ageMin , $ageMax , $desc , $prix , $idGRP , $arrActivites ,$idGRP, $btn)
{
     $db = connection();
    $res = false;
    if ($btn)
    {
        $req = 'update  n31__groupe_CDJ set ';
        $req .=' age_min = "' . $ageMin .'" ,';
        $req .=' age_max = "' . $ageMax .'" ,';
        $req .=' description = "' . $desc .'" ,';
        $req .=' prix_CDJ = "' . $prix .'" ';
        $req .= ' where id='.$idGRP ;

        //   $res = mysqli_query($db, $req);
        $idAct = '';
        foreach ($arrActivites as $value)
        {
            $idAct .=$value .',';

            $requ = 'select * from n31__specialites_CDJ where id='.$idGRP ;
            $requ .= ' and  id_specialites ='.$value;
            if (!(execModif($req))) {
                $reqModif  = 'insert into n31__specialites_CDJ values ('.$idGRP .',' .$value.')';
            //    var_dump($reqModif);
                mysqli_query($db, $reqModif);
                $res = true;
            }
        }
     //   echo $idAct;
        $idAct = trim($idAct ,',');
       //$idAct .= substr ($idAct, 0 , -1);
     //   echo 'gggg   '.$idAct;

        $reqActv = ' select id_specialites from n31__specialites_CDJ where id='.$idGRP ;
        $reqActv .= ' and id_specialites not in ('.$idAct.')';
        echo $reqActv;
        $aAct='';
        if ($actEf = verifEnfants($reqActv)){
            foreach ($actEf as $key)
            {
                $aAct .= $key['id_specialites'].',';
            }
            $aAct = trim($aAct ,',');
            $requEf = ' delete from n31__specialites_CDJ where id_specialites='.$aAct .' and id='.$idGRP;
            mysqli_query($db, $requEf);
            $res = true;
        }
    }

    return $res;

}