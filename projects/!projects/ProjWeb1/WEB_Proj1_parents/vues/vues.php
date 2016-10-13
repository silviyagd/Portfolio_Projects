<?php


/*Template de page - Header and Footer*/
/**
 * Function qui affiche entet pour tous les pages
 */
function AfficheEntete()
{
    ?>
    <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Projet WEB 1 - Parent</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
    <header>
     <!--   <a href="index.php?page=accueil"> <img id="logo" src="images/logo2.png" alt="logo"></a>
     -->
        <a href="index.php?page=accueil"><div id="logo"></div></a>
        <div id="titre"><p class="txtShadow">Bienvenue sur la page -  Recherche d'un camp de jour</p></div>
    </header>
    <div id="contenu" >
    <?php
}


/**
 * Function qui affiche le Pied pour tous les pages
 */
function AffichePied()
{
    ?>
    </div>
    <footer>
        <em>Proj Web 1 - 582-N31-MA</em>
        <em>Silviya Draganova 2015</em>

    </footer>

    </body>
    </html>
    <?php
}


/**
 * Function qui affiche la liste avec information pour le menu
 * @param array $aList
 * @param $aItem - le nom d'item du menu
 * @param $tName - le nom du tableau pour le choisi item du menu
 */
function AfficheListe($aList)
{
//$aList donne le resulatat pour le choisi Menu - le tableau
 //   var_dump($aList);
    $html = '<div id="tableau">';

    $html .= "<h1>Liste de Camps de Jours</h1> ";

    if ($aList)
    {
    foreach ($aList as $aRow) {
        // var_dump($aRow);
        $html .= '<div id="UnCDJ" class="effect"><a href="index.php?page=unCDJ&id='.$aRow["ID"].'">';
        //   De ajouter le lien pour le camp de jour
        //    foreach ($aRow as $key => $value) {

        $html .= '<div id="nomCDJ">' . $aRow['NOM CDJ'] . '</div>';

        $html .= '<div id="InfCDJ">';

        $html .= '<div id="ImgCDJ"><img src="' . $aRow['Image'] . '" alt="Image" style="width:100px;height:100px;"></div>';

        $html .= '<div id="typePrix"><p>' . $aRow['Type de CDJ'] . '</p>';
        $html .= '<p>$' .round($aRow['Prix']) . ' </p>';
        $html .= '<p>par semaine</p></div>'; //end type&prix


        $html .= '<p id="Bl1CDJ">Situe au ' . $aRow['Arrondissement'] . '</p>';

     //   $aListActivites = ListActivite();
        $html .= '<div id="dateCDJ">';
            $html .= '<p>Du ' . $aRow['Debut']  . ' au '. $aRow['Fin'] .'</p>';
        $html .= '</div>';


            $html .= '<div id="ageCDJ">';
                $html .= '<p>Pour enfants entre ' . $aRow['Min'] . ' et ' . $aRow['Max'] . ' ans </p>';
            $html .= '</div>';

    //    $html .= '<div id="end"></div>';

        $html .= '</a></div></div>';

    }
    }
    else
    {
        $html .= "<h1>Aucun resultat trouve </h1>";
    }
    $html .= "</div>";
    echo $html;

}

/**
 * @param $aList - le requltat du requette qui specifie l'information du choissi CDJ
 */
function AfficheListeUn($aList)
{
    // var_dump($aList); contenu
    //$aList donne le resulatat pour le choisi Menu - le tableau

    $html = '<div id="tableau" class="effect">';
   // $html = '<div id="tableau2">';


    $html .= '<p id="nomCDJUn">' . $aList[0]["nom_CDJ"] . '</p> ';

    $html .= '<div id="imgCDJ"><a href="' . $aList[0]["adresse_site"] . '"><img src="' . $aList[0]['image'] . '" alt="Image" ></a></div>';

//    $id = $_GET['id'];


    $html .= '<div id="contactsCDJ">';
    $html .= '<p><span class="contact">Nom du contact: </span>' . $aList[0]['nom_Contacts'] . '<p>';
    $html .= '<p><span class="contact">tel: </span>' . $aList[0]['telephone'] . '<p>';
    $html .= '<p><span class="contact">courriel: </span>' . $aList[0]['courriel'] . '<p>';
    $html .= '<p><a href="'.$aList[0]['adresse_site'].'"><span class="contact"> site: </span>' . $aList[0]['adresse_site'] . '</a></p>';
    $html .= '<p><span class="contact">Adresse: </span>' . $aList[0]['adresse'] . '<p>';
    $html .= '</div>';

    $html .= '<p>' . $aList[0]['description_CDJ'] . '</p>'; /*imgCDJ*/
    $html .= AfficheGroupeActivites ();


    $html .= AfficheComentCDJ();

    $html .= '</div>'; /* id="tableau"  ########################*/

 echo $html;

   /* laiseCommentaire();*/

}


/** Function pour affiche les activites
 * @return string - $html qui s'ajoutera d'autre string de function du affichage principale
 */
function  AfficheGroupeActivites ()
{

$id = $_GET['id'];
$html = '<br/>';

//le requette qui donne les activites de choissie CDJ
$req = RequetteGroupes($id);
//List avec des activite retourne du requette
$GroupCDJ = recupereDonnees($req);
if ($GroupCDJ) {
    foreach ($GroupCDJ as $aRow) {
        $html .= '<fieldset id="activitesCDJUn">';
        $html .= '<legend class="txtRecherch">Group de ' . $aRow['age_min'] . ' &agrave; ' . $aRow['age_max'] . ' age</legend>';
        $html .= '<div id="prixGR"><p>par semaine</p><p> ' . $aRow['prix_CDJ'] . '$ </p></div>';
        /*
                    $html .= '<p>Prix: ' . $aRow['prix_CDJ'] . '<p>';
                    $html .= '<p>Age minimale: ' . $aRow['age_min'] . '<p>';
                    $html .= '<p>Age maximale: ' . $aRow['age_max'] . '<p>';
        */
        $html .= '<p>' . $aRow['description'] . '<p>';

        //           $html .= '</div>';

        $idG = $aRow['id'];
        //le requette qui donne les activites de choissie CDJ
        $req = RequetteActivitesUn($idG);
        //List avec des activite retourne du requette
        $aActivitesCDJ = recupereDonnees($req);

        if ($aActivitesCDJ) {
            $html .= '<p class="pActiv">Activites:</p>';
            $html .= '<div id="actvCDJ">';
            foreach ($aActivitesCDJ as $aActv) {
                $html .= '<div>';
                $html .= '<p>' . $aActv['nom'] . '<p>';
                $html .= '</div>';
            }
            $html .= '</div>';
        }
        //  $html .= '</div>';
        $html .= '</fieldset>';
    }
}

    return $html;
}


/** Function pour affiche les commentaire du un CDJ
 * @return string - $html qui s'ajoutera d'autre string de function du affichage principale
 */
function  AfficheComentCDJ ()
{
    $id=$_GET['id'];
    $req = RequetteComent($id);
    //List avec des activite retourne du requette
    $aComentCDJ = recupereDonnees($req);
    $html = '<div id="commentairesCDJ">'."\n\t";
    if (!$aComentCDJ) {
        $html .= '<p id="comentCNT">0 Commentaires </p>'."\n\t";

        $html .= laiseCommentaire ();
    }
    elseif (count($aComentCDJ)==1)
    {
        $html .= '<p id="comentCNT">1 Commentaire </p>'."\n\t";
        $html .= laiseCommentaire ();
        //le requette qui donne les activites de choissie CDJ

        //    $html .= '<p class="pActiv">Activites:</p>';
        //    $html .= '<div id="actvCDJ">';
        $html .= '<div id="comentList">' ;
        foreach ($aComentCDJ as $aComent) {
            $html .= '<p><span class="txtRecherchNote txtRecherch">Note: ' . $aComent['note'] . '</span><p>'."\n\t";
            $html .= '<p class="first">Nom:  ' . $aComent['nom'] . '</p>'."\n\t";
            $html .= '<p>Date: ' . $aComent['date'] . '<p>'."\n\t";
            $html .= '<p>' . $aComent['commentaire'] . '<p>'."\n\t";
        }
        $html .= '</div>';
    }
    else {
        $html = '<p id="comentCNT">'.count($aComentCDJ).' Commentaires </p>'."\n\t";
        $html .= laiseCommentaire ();
        //le requette qui donne les activites de choissie CDJ

        //    $html .= '<p class="pActiv">Activites:</p>';
        //    $html .= '<div id="actvCDJ">';
        $html .= '<div id="comentList">' ;
        foreach ($aComentCDJ as $aComent) {
            $html .= '<p><span class="txtRecherchNote">Note: ' . $aComent['note'] . '</span><p>'."\n\t";
            $html .= '<p class="first">Nom:  ' . $aComent['nom'] . '</p>'."\n\t";
            $html .= '<p>Date: ' . $aComent['date'] . '</p>'."\n\t";
            $html .= '<p class="comment">' . $aComent['commentaire'] . '</p>'."\n\t";
        }
        $html .= '</div>';
    }
    $html .= '</div>'."\n\t";

    return $html;
}


/**
 * Function pour afficher les champs de laise un commentaire
 */
function laiseCommentaire ()
{

/*    <form action="index.php?page=list&action=modifier<?php echo '&menuItem='.$_GET["menuItem"].'&id='.$_GET['id'];?> " method="post">
 <a href="index.php?page=accueil">
*/

    $html = '<div id="envoieComnt">';
     $html .= ' <form action="" method="post">';
    $html .='<div id="NomCOm">';
    $html .= '<label>Votre nom:</label>';
     $html .= '   <input type="text" name="nomCom" value="">';
   $html .='</div>';

    $html .='<div id="NoteCOm">';
    $html .= '<label>Note:</label>';
    $html .= '  <select name="note">';
    $html .= '     <option value="1">1</option>';
    $html .= '     <option value="2">2</option>';
    $html .= '       <option value="3">3</option>';
    $html .= '      <option value="4">4</option>';
    $html .= '      <option value="5">5</option>';
    $html .= '   </select>';
    $html .='</div>';

    $html .= '   <textarea name="txt" col="50" row="3"></textarea>';
    $html .= '  <input class="txtRecherch" type="submit" name="submit" value="Envoyer">';
    $html .= '  </form>';
    $html .= '</div>';

   if (isset($_POST['submit'])) {

        $id= $_GET['id'];
        $nom = $_POST['nomCom'];
        $coment = $_POST['txt'];
        $note = $_POST['note'];

        $req = RequetteInsertComent ($nom ,  $coment  , $note , $id);

       if ($req)
       {
           echo "Votre commentaire est enregistre";
       }

       // var_dump($_POST);
    }
    return $html;
}


/** Function qui affiche les champs pour faire le recherch
 * @param array $aAct  - information d'arrondisements
 * @param $nomCDJ - information de rechech Nom
 * @param $prixCDJ - information de rechech Prix
 * @param $noteCDJ - information de rechech Note
 */
function AfficheRecherch ($aAct=array() , $nomCDJ , $prixCDJ ,$noteCDJ)
{

?>

    <div id="recherch" class="effect">
        <form action="index.php?page=accueil" method="post">
         <input type="submit" name="submit" value="chercher" class="txtRecherch">
        <?php
            $arValue='';
            if ($isSetAr = isset($_POST["aronds"])){
            $arValue = $_POST["aronds"] ;}

            echo '<div>';
            RechercheArrondissements ($isSetAr , $arValue) ;

            RechercheTypeCDJ () ;

            echo '</div>';

            echo '<div>';
            RecherchNom ($nomCDJ);

            RecherchPrix ($prixCDJ);

            RecherchNote ($noteCDJ);

            echo '</div>';

            RecherchActivites ($aAct);

        ?>
        </form>

    </div>

<?php

}

/** function qui affiche le champ pour l'arrondisements
 * @param $isSetAr - si les arrondisments sont choisis = true ou false
 * @param string $arValue - le ID du arrondissement choisie
 */
function RechercheArrondissements ($isSetAr ,$arValue ='')
{
    $req = RequetteArrondissements ();

    $listArond = recupereDonnees($req);
    echo '<div id="arronds" class="txtRecherch"> ';
        echo '<label>Arrondissements :</label>';
        echo '<select name="aronds" class="txtRecherch">';
        echo '<option value="0">Tous</option>';

        foreach ($listArond as $value)
        {
            if ( $isSetAr && ($arValue== $value["id"]))
            {
                $aselect=  ' selected="selected"';
            }
            else
            {
                $aselect= '';
            }

            echo '<option value="'.$value["id"].'" '.$aselect.' >'.$value["nom"].'</option>';
        }

        echo '</select>';
    echo '</div>';

}

/**
 * Affichage du Type de CDJ
 */
function RechercheTypeCDJ ()
{
    $req = RequetteTypeCDJ ();

    $listArond = recupereDonnees($req);

    echo '<div id="typeCDJ"  class="txtRecherch" >';
        echo '<label>Type de CDJ :</label>';
        echo '<select name="typeCDJ"  class="txtRecherch">';
        echo '<option value="0">Tous</option>';

        foreach ($listArond as $value)
        {
            ( isset($_POST["typeCDJ"]) && ($_POST["typeCDJ"] == $value["id"]))? $aselect=  ' selected="selected"': $aselect= '';
            echo '<option value="'.$value["id"].'" '.$aselect.' >'.$value["nom"].'</option>';
        }

        echo '</select>';
    echo '</div>';
}


/** Function qui affiche les checkbox-ex des activites
 * @param array $aAct - les activites qui etions selecter
 */
function RecherchActivites ($aAct = array())
{
    $req = RequetteActivites();
    $actCDJ = recupereDonnees($req);
    //var_dump($actCDJ);
    echo '<div id="activitesRech">';
    echo '<fieldset name="activRech" class="txtRecherch">';
    echo "<legend>Activites</legend>";
    foreach ($actCDJ as $value)
    {
        $chk = '';
        if ($aAct) {
            foreach ($aAct as $cle)
            {
                if ($value['id']==$cle)
                {
                    $chk='checked';
                    break ;
                }
            }
        }
    echo '<div>';
    echo '<label>'.$value['nom'].'</label><input type="checkbox" name="activites[]" id="activites" value="'.$value['id'].'" '.$chk.' >';
    echo '</div>';
    }
    echo '</fieldset></div>';
    //    echo "</select>";

}


/** Function qui affiche le champ pour le recherch par nom
 * @param $nomCDJ - le valeur pour recupere
 */
function  RecherchNom ($nomCDJ)
{
    if ($nomCDJ)
    {
        $val = 'value="'.$nomCDJ.'"';
    }
    else
    {
        $val='';
    }
    echo '<div id="nomCDJRech"  class="txtRecherch" >';
        echo '<label>Nom de CDJ :</label>';
        echo '<input type="text" name="nomCDJ"  class="txtRecherch" '.$val.'>';
    echo '</div>';
}

/** Function qui affiche le champ pour le recherch par prix de CDJ
 * @param $prixCDJ - le valeur pour recupere
 */
function  RecherchPrix ($prixCDJ)
{
    if ($prixCDJ)
    {
        $val = 'value="'.$prixCDJ.'"';
    }
    else
    {
        $val='';
    }
    echo '<div id="prixCDJRech"  class="txtRecherch" >';
    echo '<label>Prix de CDJ :</label>';
    echo '<input type="text" name="prixCDJ"  class="txtRecherch" '.$val.'>';
    echo '</div>';
}


/** Function qui affiche le champ pour le recherch par prix de CDJ
 * @param $noteCDJ - le valeur pour recupere
 */
function  RecherchNote ($noteCDJ)
{
    if ($noteCDJ)
    {
        $val = 'value="'.$noteCDJ.'"';
    }
    else
    {
        $val='';
    }
    echo '<div id="noteCDJRech"  class="txtRecherch" >';
    echo '<label>Note de CDJ :</label>';
    echo '<input type="text" name="noteCDJ"  class="txtRecherch" '.$val.'>';
    echo '</div>';
}
