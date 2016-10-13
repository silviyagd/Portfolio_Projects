<?php
/* Cours 15 */
require_once("./vues/vues.php");
require_once("./modeles/admin.php");
require_once("./modeles/requettes.php");
require_once("./lib/mysql.php");

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = '';
    }

    if(isset($_GET['action']))
    {
	$action = $_GET['action'];
    }
    else
    {
    	$action = '';
    }





switch($page)
{

    case 'unCDJ':
    {
        AfficheAccueilUnCDJ();


    break;
    }

    case 'rechercher':
	{
         //   $_SESSION['login'] = false;

        break;
	}
    case 'accueil':
    default:
        //Premierement affiche les champs pour loggin d'administrateur
        AfficheAccueil();

}


/**
 * Function qui affiche le page avec tous les CDJ
 */
function AfficheAccueil()
{
    AfficheEntete();
    $req = RequetteAccueil();
    if ($subm = isset($_POST['submit']))
    {
//        var_dump($_POST);
        $arond = $_POST['aronds'];
        $typeCDJ = $_POST['typeCDJ'];
        $nomCDJ = $_POST['nomCDJ'];
        $prixCDJ = $_POST['prixCDJ'];
        $noteCDJ = $_POST['noteCDJ'];
        if (isset($_POST['activites']))
        {
            $aAct = $_POST['activites'];
        }
        else
        {
            $aAct = array();
        }

    }
        else
        {
            $arond = '';
            $typeCDJ ='';
            $nomCDJ = '';
            $prixCDJ ='';
            $noteCDJ ='';
            $aAct = array();
        }
    AfficheRecherch($aAct , $nomCDJ , $prixCDJ ,$noteCDJ);
    $req .= ExecRecherche($subm , $arond , $typeCDJ , $nomCDJ , $aAct , $prixCDJ , $noteCDJ);

    $aList = recupereDonnees ($req);

    AfficheListe($aList);

    AffichePied();
}

/**
 * Le function qui affiche le page pour un CDJ
 */
function AfficheAccueilUnCDJ ()
{
    AfficheEntete();

    $id= $_GET['id'];
    $req = RequetteUnCDJ($id);
    $aList = recupereDonnees ($req);

    AfficheListeUn($aList);

    AffichePied();

}