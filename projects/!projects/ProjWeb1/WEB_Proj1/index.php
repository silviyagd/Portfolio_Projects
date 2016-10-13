<?php
/* Cours 15 */
require_once("./vues/vues.php");
require_once("./vues/vuesCDJ.php");
require_once("./modeles/admin.php");
require_once("./lib/mysql.php");
require_once("./modeles/menu.php");

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


switch($page) {
    case "login" :
        if ($action == "soumettre") {
            // Vérifier la connexion (couriel/pass)
            if (verifAdmin()) {
                $aMenu = genererMenu();
                AffichePageMenu($aMenu);
            } else {
                // Si le couriel ou mot de passe sont incorect
                $mes = "Le nom d'utilisateur ou le mot de passe est incorrect";
                AfficheAccueil($mes);
            }

        } //Imam li nugda ot tova???? ###############
        else {
            // Pas connecté
           // echo "test!!!";
            AfficheAccueil();
        }
        break;

    case 'deconnecter':
        //Decconecter le utilisateur
        $_SESSION['login'] = false;
        AfficheAccueil();

        break;

    case 'list':
         actionCDJ($action);

     break;

    case 'accueil':
    default:
        //Premierement affiche les champs pour loggin d'administrateur
        AfficheAccueil();
}


// ######## Functions ###################

/**
 * Function qui affiche form du connexion
 * @param type $mes - dans le cas ou le couriel ou mot de passe sont incorect pour affichage du message
 */
function AfficheAccueil($mes='')
{
        AfficheFormCnnexion($mes);
        
        AffichePied();
}


/**
 * Affiche le page avec le menu et les donne 
 * @param type $aMenu - l'array avec le menu pour visualisation
 */
function AffichePageMenu($aMenu = Array())
{
    AfficheEntete();
    //affiche le menu     
    AfficheMenu($aMenu);
    //par default on affiche le tableau du premier item en Menu $aMenu[0]

    AfficheListe($aMenu[0]);
    AffichePied();

}


  /**
   * Function qui genere le menu de tableau n31__menu_admin
   * @return type le menu genere
   */
    function genererMenu()
	{
            $aMenu = getMenuItems();
            return $aMenu;
	}


/** Function qui affiche les donne pour le menu item
 * @param array $aMenu - le menu qui se genere dynamiquement de base de donnee
 */
    function AfficheListMenu ($aMenu = Array())
    {
        AfficheEntete();
        //affiche le menu
        AfficheMenu($aMenu);
        //recupere le menuItem
        $menuItem = recupereMenuInf($aMenu);
        //par default on affiche le tableau du premier item en Menu $aMenu[0]
        //si l'autre menuItem est choisie le table et le titre - change
         AfficheListe($menuItem);

        AffichePied();

    }

/**
 * Dans le cas de Suprimer on n'affiche le list ou information pour modifier, just un Message 
 * @param type $aMenu
 */
function AfficheMenuSupr ($aMenu = Array())
{
    AfficheEntete();
    //affiche le menu
    AfficheMenu($aMenu);

    AffichePied();

}


/**
 * Function qui affihe le menu pour ajouter nouveau information dependant le menu choisie
 */
    function AfficheListAjoute()
    {    
        $aMenu = genererMenu();
        AfficheEntete();
        //affiche le menu
        AfficheMenu($aMenu);
        //recupere l'Item de tableau n31_menu_admin
        $menuItem = recupereMenuInf($aMenu);
        //recupere le nom du tableau dynamiquement
        $tableau = $menuItem['tableau'];

        switch ($tableau) {
            case "n31__coordonnees_CDJ" :
                //affiche le formulaire pour entre les donnees
                AfficheAjouteCDJ($tableau);
                //si le command "Insert" est excecute avec succes
                if (AjouterNouveauInfNomCDJ())
                {
                    echo "<h1>Votre information est ajouté dans le base des donneée</h1>";
                }
                break;

            case "n31__service_de_garde" :

                //affiche le formulaire pour entre les donnees
                AfficheAjouteSDG($tableau);
                if (verifSDG())
                {
                    echo "<h1>Il y a déjà information pour le choisi Camp de jour </h1>";
                }
                else
                {
                //si le command "Insert" est excecute avec succes
                    if (AjouterNouveauInfNomSDG())
                    {
                        echo "<h1>Votre information est ajouté dans le base des donneée</h1>";
                    }
                }
                break;

            default :
                AfficheAjoute($tableau);
                if (AjouterNouveauInfNom($tableau))
                {
                    echo "<h1>Votre information est ajouté dans le base des donneée</h1>";
                }
            break;

        }

       AffichePied();
    }

    
/**
 * Function qui affige le page pour le modification
 */
 function AfficheListModif ()
 {
    $aMenu = genererMenu();
     AfficheEntete();
     //affiche le menu
     AfficheMenu($aMenu);
     //recupere l'Item
     $menuItem = recupereMenuInf($aMenu);
     $aTabl = $menuItem['tableau'];
     //echo $_GET['id'];
     $aVal= recupereModifInf($aTabl,$_GET['id']);

     switch ($aTabl){
         case 'n31__coordonnees_CDJ' :
             if (!(isset($_POST['sauvegarderCDJ'])))
             {
                 AfficheListCDJ();
             }
            if (ModifierInfCDJ())
             {
                 echo "<h1>La modification est finie</h1>";
             }

         break;

         case 'n31__service_de_garde':

             AfficheModifSDG();

             if (ModifierInfSDG())
             {
                 echo "<h1>La modification est finie</h1>";
             }

         break;

         case 'n31__commentaires':
             //var_dump($aVal);
             AfficheModifCom();

             if (ModifierInfCom())
             {
                echo "<h1>La modification est finie</h1>";
             }

             break;

         default:
             AfficheModif( $aTabl , $aVal );

             if (ModifierInf($aTabl ))
             {
                 echo "<h1>La modification est finie</h1>";
             }

         break;

     }

    AffichePied();

 }

/**
 * Affiche le page de groups de Camp de Jour
 */
function AfficheListGroups()
{
    $aMenu = genererMenu();
    AfficheEntete();
    //affiche le menu
    AfficheMenu($aMenu);
    //recupere l'Item de tableau n31_menu_admin
    $menuItem = recupereMenuInf($aMenu);
    //recupere le nom du tableau dynamiquement
    $tableau = $menuItem['tableau'];
    //affiche le formulaire pour entre les donnees

    AfficheGroups();

}

/**
 * Function pour affichage du group des CDJ
 */
function AfficheListAjouteGRP()
{
    $aMenu = genererMenu();
    AfficheEntete();
    //affiche le menu
    AfficheMenu($aMenu);
    //recupere l'Item de tableau n31_menu_admin
    $menuItem = recupereMenuInf($aMenu);
    AfficheAjouteGRP();
    AffichePied();
   //var_dump($aTous);
        if (AjouterNouveauInfGRP())
    {
        echo "<h1>Votre information est ajouté dans le base des donneée</h1>";
    }

}

/**
 * Function affiche le page du Group de Camp de jour
 */
function AfficheModifeGRP()
{
    $aMenu = genererMenu();
    AfficheEntete();
    //affiche le menu
    AfficheMenu($aMenu);
    //recupere l'Item de tableau n31_menu_admin
    $menuItem = recupereMenuInf($aMenu);

    AfficheModifierGRP();
    AffichePied();
    //var_dump($aTous);
    if ($btn = isset($_POST['modifGRP']))
    {
        $ageMin = $_POST['ageMin'];
        $ageMax = $_POST['ageMax'];
        $desc = $_POST['desc'];
        $prixCDJ = $_POST['prixGRP'];
        $arrAct = $_POST['activites'];
        $idCDJ = $_POST['nomCDJ'];
        $idGRP = $_GET['id'];
        if (ModifGruopCDJ($ageMin , $ageMax , $desc , $prixCDJ ,$idCDJ , $arrAct , $idGRP ,$btn))
        {
            echo "<h1>Votre information est ajouté dans le base des donneée</h1>";
        }
    }


}

/** Function switch dans switch
 * @param $action
 */
function actionCDJ ($action)
{
    switch ($action) {
        case 'ajoute':
            //pour ajouter nouveau information en tableau nomenklature
            AfficheListAjoute();
            break;

        case 'groups':
            AfficheListGroups();
            break;

        case 'groupeAjoute':
            AfficheListAjouteGRP();
            break;

        case 'modifierGRP':
            AfficheModifeGRP();
            break;

        case 'supprimerGRP':
            $aMenu = genererMenu();
            AfficheListGroups();
            SupprimeInf($aMenu);
            break;

        default:
            if ($action == "modifier")
            {
                AfficheListModif();
            }
            elseif ($action == "supprimer")
            {
                $aMenu = genererMenu();
                //dans le cas de Suprimer on n'affiche le list ou information pour modifier, just un Message
                AfficheMenuSupr ($aMenu);

                SupprimeInf($aMenu);
            }
            else
            {
                $aMenu = genererMenu();
                AfficheListMenu ($aMenu);

            }
            break;
    }

}