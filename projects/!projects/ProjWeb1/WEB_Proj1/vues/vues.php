<?php

/** Function qui affiche le page pour le connexion
 * @param string $mes
 */
function AfficheFormCnnexion($mes='')
{
 ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8"> 
        <title>Projet WEB 1 - Admin</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>

   <header>
        <p class="titre">Recherche d'un camp de jour -  Administration</p>
        <div id="line_horizontal"></div>

    </header>

    <div id="connexion">

        <form action="index.php?page=login&action=soumettre" method="post">
            <label>Utilisateur : </label><input type="text" value="" name="courriel"></p>
            <label>Mot de passe : </label><input type="password" value="" name="motPasse"></p>
            <input type="submit" value="Submit"/>
        </form>
    </div>

    
    <?php
    //message si le connexion n'est succee
    echo "<p id='mes'>".$mes."</p>" ;
}

/** Faire le menu dinamiquement
 * @param array $aMenu
 */
function AfficheMenu($aMenu = Array())
{
echo "<nav>";
echo "<ul>";
    
    foreach ($aMenu as $item) 
    {
        echo '<li><a href="'.$item['lien'] .'&menuItem='.$item['nom'].'">'.$item['nom'].'</a></li>';
    }
				
echo "</ul>";
echo "</nav>";
        		
}    

/*Template de page - Header and Footer*/
/**
 * Function qui affiche Entete du page
 */
function AfficheEntete()
{
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
    <title>Projet WEB 1 - Admin</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <header>
        <form action="index.php?page=deconnecter" method="post">
            <input id="deconnect" type="submit" value="Deconnecter"/>
        </form>
        <p>Recherche d'un camp de jour -  Administration</p>
        <div id="line_horizontal"></div>
    </header>
   
<?php
}


/**
 * Function qui affiche le pied du page
 */
function AffichePied()
{
?>
</body>
</html>
<?php
}

/**
 * Function qui affiche le tableau avec information pour le menu
 * @param array $aList
 * @param $aItem - le nom d'item du menu
 * @param $tName - le nom du tableau pour le choisi item du menu
 */
function AfficheListe($aMenu)
{
    //$aList donne le resulatat pour le choisi Menu - le tableau
    $aList = listeMenu($aMenu['requete']);
    $html = '<div id="tableau">';

    if ($aMenu['tableau']!='n31__commentaires') {
        $html .= '<a href="index.php?page=list&action=ajoute&menuItem=' . $aMenu['nom'] . '"><div id="btn">Ajouter</div></a>';
    }

    $html .= "<h1>Liste de " . $aMenu['nom'] . "</h1> ";

    $html .= "<table> ";

    $aCol =  colInf($aMenu['requete']);

    $html .= '<tr class="hdr"><u>';
    foreach ($aCol as $value) {
        // var_dump($aRow);
 //            $url=array ();
            $html .= '<td>' . $value . '</td>';
    }
    $html .= '</u></tr>';
    foreach ($aList as $aRow) {
       // var_dump($aRow);
        $html .= '<tr>';
//            $url=array ();	
        foreach ($aRow as $key => $value) {
            $html .= '<td>' . $value . '</td>';
        }


        $html .= "<td>" . '<a href="index.php?page=list&action=modifier&menuItem=' . $aMenu['nom'] . '&id= '.$aRow["id"].'">Modifier</a></td>';

        $html .= '<td>' . '<a href="index.php?page=list&action=supprimer&menuItem=' . $aMenu['nom'] . '&id= '.$aRow["id"].'")>Supprimer</a></td>';

        if ($aMenu['tableau']=='n31__coordonnees_CDJ') {
            $html .= '<td>' . '<a href="index.php?page=list&action=groups&menuItem=' . $aMenu['nom'] . '&id= '.$aRow["id"].'")>Groupes</a></td>';
        }

        $html .= '</tr>';

    }

    $html .= "</table></div>";
    echo $html;

}

/** Function pour supprimer les donne du tableau nomenclature
 * @param $requ
 * @param $menuItem
 */
function AfficheListeSupr($requ, $menuItem )
{
    //$aList donne le resulatat pour le choisi Menu - le tableau

    // $html .='<a href="index.php?page=list&action=ajoute&item='.$aItem.'&tName='.$tName.'"><div id="btn">Ajoute</div></a>';
    //$html .= '<a href="index.php?page=list&action=ajoute&menuItem=' .$menuItem.'"><div id="btn">Ajouter</div></a>';

    $html = "<h1>Liste de " . $menuItem. "</h1> ";
    //echo $menuItem;
    $html .= '<div id="tableau">';
    $html .= "<table> ";
    $aRes = verifEnfants($requ);
   // echo $requ;
    //var_dump($aRes);
    foreach ($aRes as $aRow) {
        // var_dump($aRow);
        $html .= '<tr>';
//            $url=array ();
        foreach ($aRow as $key => $value) {
            $html .= '<td>' . $value . '</td>';
        }

        $html .= "<td>" . '<a href="index.php?page=list&action=modifier&menuItem=' . $menuItem . '&id= '.$aRow["id"].'">Modifier</a></td>';
        $html .= '<td>' . '<a href="index.php?page=list&action=supprimer&menuItem=' . $menuItem . '&id= '.$aRow["id"].'")>Supprimer</a></td>';


        $html .= '</tr>';

    }

    $html .= "</table></div>";
    echo $html;

}


/** Function qui affiche le champ pour ajouter nouveau information , cependant le menu item
 * @param $aTabl - le nom du tableau en qui on dois faire l'Insert
 */
function AfficheAjoute( $aTabl )
{
   // echo $aTabl;
    $name = isset($_GET['ajoute'])?$_GET['ajoute']:"";
    ?>
    <div id="ajoute">

        <h1>Liste de <?php echo $_GET['menuItem'];?></h1>

            <form action="index.php?page=list&action=ajoute&tabl=<?php echo $aTabl.'&menuItem='.$_GET["menuItem"] ;?> " method="post">
            <input type="text" name="ajoute" value="<?php echo $name ;?>">
            <input type="submit" name="ajouter" value="Ajoute">
        </form>
    </div>

<?php
}


/*Modif  ##############################################*/
/** Faire les modification du tabeaux nomenclature
 * @param $aTabl - le nom du tableau - Arrondissements, Type de CDJ ou Activites
 * @param $aVal -  id du item
 */
function AfficheModif( $aTabl , $aVal )
{
    // echo $aTabl;
    $name = $aVal;
    ?>
    <div id="ajoute">

        <h1>Liste de <?php echo $_GET['menuItem'];?></h1>

        <form action="index.php?page=list&action=modifier&tabl=<?php echo $aTabl.'&menuItem='.$_GET["menuItem"].'&id='.$_GET["id"] ;?> " method="post">
            <input type="text" name="modif" value="<?php echo $aVal; ?> ">
            <input type="submit" name="submit" value="Modifier">
        </form>
    </div>

    <?php
}

/**
 * Function pour modification du Service de Garde
 */
function AfficheModifSDG() /*$aTabl , $aVal*/
{
    $req = ' select t1.nom_CDJ ';
    $req .= ' from n31__coordonnees_CDJ as t1 ';
    $req .= ' inner join n31__service_de_garde as t2 ';
    $req .= ' on t1.id=t2.id_CDJ ';
    $req .= ' where t2.id='.$_GET['id'];
    $aCDJ = verifEnfants($req);
    //$CDJDonnees = recuperTableauInf($_GET["id"] , "n31__coordonnees_CDJ" , true);

    $req = 'select * from n31__service_de_garde where id='.$_GET['id'];
    $aSDG = verifEnfants($req);

    ?>
    <div id="modifCDJ">

        <h1>Ajoute de  <?php echo $_GET['menuItem'];?></h1>
        <h1>Camp de Jour :  <?php echo $aCDJ[0]['nom_CDJ']; ?></h1>


        <form action="index.php?page=list&action=modifier<?php echo '&menuItem='.$_GET["menuItem"].'&id='.$_GET['id'];?> " method="post">

            <div id="ajouteSDG">
                <label>Prix</label>
                <input type="text" name="prixSDG" value="<?php echo $aSDG[0]['prix'];?>" pattern="[0-9.]*">

                <label>Debut</label>
                <input type="text" name="debutSDG" value="<?php echo $aSDG[0]['debut'];?>">

                <label>Fin</label>
                <input type="text" name="finSDG" value="<?php echo $aSDG[0]['fin'];?>">

            </div>

            <!--##############################-->

            <div id="btnsCDJ2">
                <!--    echo '<input type="submit" name="annuler" value="Annuler">'."\n\t";-->
                <input type="submit" name="modifSDG" value="Modifier" class="btn">
            </div>

            <!--       <div id="end"></div> -->


        </form>
    </div>


    <?php
}

/**
 * Modification de Commentaires
 */
    function AfficheModifCom()
    {
        $req = ' select t1.nom_CDJ as nom ';
        $req .= ' from n31__coordonnees_CDJ as t1 ';
        $req .= ' inner join n31__commentaires as t2 ';
        $req .= ' on t1.id=t2.id_CDJ ';
        $req .= ' where t2.id='.$_GET['id'];
        //echo $req;

        $aComCDJ = verifEnfants($req);

        $req = 'select * from n31__commentaires where id='.$_GET['id'];
        $aCom = verifEnfants($req);

        ?>
    <div id="modifCDJ">

        <h1>Ajoute de  <?php echo $_GET['menuItem'];?></h1>
        <h1>Camp de Jour :  <?php echo $aComCDJ[0]['nom']; ?></h1>

        <form action="index.php?page=list&action=modifier<?php echo '&menuItem='.$_GET["menuItem"].'&id='.$_GET["id"];?> " method="post">

            <div id="ajoutecOM">
                <label>Nom</label>
                <input type="text" name="nom" value="<?php echo $aCom[0]['nom']; ?>">

                <label>Commentaire</label>
                <input type="text" name="commentaire" value="<?php echo $aCom[0]['commentaire']; ?>">

                <label>Note</label>
                <input type="text" name="note" value="<?php echo $aCom[0]['note']; ?>">

                <label>Date</label>
                <input type="text" name="date" value="<?php echo $aCom[0]['date']; ?>">

            </div>

            <!--##############################-->

            <div id="btnsCDJ2">
                <!--    echo '<input type="submit" name="annuler" value="Annuler">'."\n\t";-->
                <input type="submit" name="modifCom" value="Modifier">
            </div>

            <!--       <div id="end"></div> -->


        </form>
    </div>


<?php
}


/**
 * Affiche list de group de Camp de Jour
 */
function AfficheGroups()
{
    //Activites
    $req = ' select t2.id as id ,t1.nom_CDJ as "Nom de CDJ", t3.nom as Arrondissement , t4.nom as "Type de CDJ" , t2.age_min as Min , t2.age_max as Max , t2.prix_CDJ as Prix ';
    $req .= ' from n31__coordonnees_CDJ as t1 ';
    $req .= ' inner join n31__groupe_CDJ as t2 ';
    $req .= ' on t1.id=t2.id_coordonnees_CDJ ';
    $req .= ' inner join n31__arrondissements as t3 ';
    $req .= ' on t3.id=t1.id_arrondissement ';
    $req .= ' inner join n31__types_CDJ as t4 ';
    $req .= ' on t1.id_type=t4.id ';
    $req .= ' where t1.id= '.$_GET['id'];
    $aGRP = verifEnfants($req);


    $html = '<div id="tableau">';
//    $html = '<div id="modifCDJ">';


    $aCDJ = $_GET["menuItem"];
    $html .= '<h1>List - group de '.$aCDJ.'</h1>';
  /* $html .= '<h1>Group de Camp de Jour :  <?php echo $aGRP[0]["Nom de CDJ"]; ?></h1>';*/


    $html .= "<table> ";
    $html .= '<a href="index.php?page=list&action=groupeAjoute&menuItem=' . $_GET['menuItem'] . '"><div id="btn">Ajouter</div></a>';

    $aCol =  colInf($req);

   $html .= '<tr class="hdr"><u>';
    if ($aGRP) {
    foreach ($aCol as $value) {
        // var_dump($aRow);
 //            $url=array ();
            $html .= '<td>' . $value . '</td>';
    }
    $html .= '</u></tr>';
    foreach ($aGRP as $aRow) {
       // var_dump($aRow);
        $html .= '<tr>';
//            $url=array ();
        foreach ($aRow as $key => $value) {
            $html .= '<td>' . $value . '</td>';
        }


        $html .= "<td>" . '<a href="index.php?page=list&action=modifierGRP&menuItem=' . $_GET['menuItem'] . '&id= '.$aRow["id"].'">Modifier</a></td>';

        $html .= '<td>' . '<a href="index.php?page=list&action=supprimerGRP&menuItem=' . $_GET['menuItem'] . '&id= '.$aRow["id"].'")>Supprimer</a></td>';


        $html .= '</tr>';

    }
    }
    $html .= "</table></div> ";
    echo $html;

}


/**
 * Function affiche Le champs pour entre le nouveau information du group de Camp de jour
 */
function AfficheAjouteGRP()
{
?>
   <div id="modifCDJ">

       <h1>Ajoute de  <?php echo $_GET['menuItem'];?></h1>

       <form action="index.php?page=list&action=groupeAjoute<?php echo '&menuItem='.$_GET["menuItem"];?> " method="post">

           <div id="ajouteGRp">
               <?php
               $req = 'select id,nom_CDJ from n31__coordonnees_CDJ order by nom_CDJ' ;
               $nomCDJ = verifEnfants($req);

               echo "<label>Nom Camp de jour</label>";
               echo "<select name='nomCDJ' >"."\n\t";
               foreach ($nomCDJ as $value)
               {
                   isset($_POST['nomCDJ'])? $aselect= 'selected="selected"':$aselect= '';
                   echo '<option value="'.$value['id'].'">'.$value['nom_CDJ'].'</option>'."\n\t";
               }
            
               echo "</select>";
               echo '</div>'."\n\t"; /*id="TAD_CDJ4"*/
               ?>


               <label>Age Min</label>
               <input type="text" name="ageMin" value="<?php echo isset($_POST['ageMin'])?  $_POST['ageMin'] : '';?>" pattern="[0-9]{1,2}">

               <label>Age Max</label>
               <input type="text" name="ageMax" value="<?php echo isset($_POST['ageMax'])?  $_POST['ageMax'] : '';?>" pattern="[0-9]{1,2}">

               <label>Prix</label>
               <input type="text" name="prixGRP" value="<?php echo isset($_POST['prixGRP'])?  $_POST['prixGRP'] : '';?>" pattern="[0-9]+">

               <div id="descGRP">
                   <label>Description</label>
                   <textarea  name="desc" rows=5 cols=50 ><?php echo isset($_POST['desc'])?  $_POST['desc'] : '';?></textarea>
                   </div>

               <?php
               $req = 'select * from n31__specialites ORDER BY nom' ;
               $actCDJ = verifEnfants($req);

               echo '<fieldset id="activitesCDJ">';
               echo "<legend>Activites</legend>";
            //   echo "<select name='activitesTous[]' size='6' multiple='multiple' >"."\n\t"; //ondblclick=".doubleClick()."
               foreach ($actCDJ as $value)
               {
                   echo '<div>';
                 //  isset($_POST['activitesTous'])? $aselect= 'selected="selected"':$aselect= '';
                 //  echo '<option value="'.$value['id'].'">'.$value['nom'].'</option>'."\n\t";
      //             echo '<label>'.$value['nom'].'</label><input type="checkbox" name="activites'.$value['id'].'" value="'.$value['id'].'">';
                   echo '<label>'.$value['nom'].'</label><input type="checkbox" name="activites[]" id="activites" value="'.$value['id'].'">';

                   echo '</div>';
               }
                echo '</fieldset>'
           //    echo "</select>";

                ?>

               <!--##############################-->

               <div id="btnsCDJ2">
                   <!--    echo '<input type="submit" name="annuler" value="Annuler">'."\n\t";-->
                   <input type="submit" name="ajouteGRP" value="Ajouter">
               </div>




       </form>
   </div>

    <?php
}

/**
 * Function affiche le champ pour modifier l'information du Group de Camp de jour
 */
function  AfficheModifierGRP()
{
    $req = ' select t2.id  ,t1.nom_CDJ as nom, t2.id_coordonnees_CDJ ,t2.age_min , t2.age_max , t2.description , t2.prix_CDJ , t1.id as idCDJ';
    $req .= ' from n31__coordonnees_CDJ as t1 ';
    $req .= ' inner join n31__groupe_CDJ as t2 ';
    $req .= ' on t1.id=t2.id_coordonnees_CDJ ';
    $req .= ' where t2.id='.$_GET['id'];

    $infGRP = verifEnfants($req);


  ?>
    <div id="modifCDJ">

       <h1>Modifier de  <?php echo $infGRP[0]['nom'];?></h1>

       <form action="index.php?page=list&action=modifierGRP<?php echo '&menuItem='.$_GET["menuItem"].'&id='.$infGRP[0]['id'];?> " method="post">

           <div id="ajouteGRp">
               <?php
               $req = 'select id,nom_CDJ from n31__coordonnees_CDJ order by nom_CDJ' ;
               $nomCDJ = verifEnfants($req);
               echo "<label>Nom Camp de jour</label>";
               echo "<select name='nomCDJ' >"."\n\t";
               foreach ($nomCDJ as $value)
               {
                   if ($value['id']==$infGRP[0]['nom_CDJ'])
                   {
                       echo '<option value="'.$value['id'].'" selected="selected">'.$value['nom'].'</option>'."\n\t";
                   }
                   else
                   {
                       echo '<option value="'.$value['id'].'">'.$value['nom_CDJ'].'</option>'."\n\t";
                   }
               }

               echo "</select>";
        //       echo '</div>'."\n\t"; /*id="TAD_CDJ4"*/
               ?>


               <label>Age Min</label>
               <input type="text" name="ageMin" value="<?php echo $infGRP[0]['age_min'];?>" pattern="[0-9]{1,2}">

               <label>Age Max</label>
               <input type="text" name="ageMax" value="<?php echo $infGRP[0]['age_max'];?>" pattern="[0-9]{1,2}">

               <label>Prix</label>
               <input type="text" name="prixGRP" value="<?php echo $infGRP[0]['prix_CDJ'];?>" pattern="[0-9]">

               <div id="descGRP">
                   <label>Description</label>
                   <textarea  name="desc" rows=5 cols=50 ><?php echo $infGRP[0]['description'];?></textarea>
                   </div>

               <?php
               $req = 'select * from n31__specialites ORDER BY nom' ;
               $actCDJ = verifEnfants($req);

               echo '<fieldset id="activitesCDJ">';
               echo "<legend>Activites</legend>";
                foreach ($actCDJ as $value)
               {
                   $chkBox = '';
                   if (!(isset($_POST['modifGRP']))){
                   $reqActv = ' select id_specialites from n31__specialites_CDJ where id='.$_GET['id'] ;
               //    $reqActv .= ' and id_specialites not in ('.$idAct.')';
                    if ($actCh = verifEnfants($reqActv)) {
                        foreach ($actCh as $key) {
                            if (($value['id']) == $key['id_specialites']) {
                                $chkBox = 'checked';
                            }
                        }
                    }}
                   else {
                       foreach ($_POST['activites'] as $key) {
                           if (($value['id']) == $key) {
                               $chkBox = 'checked';
                           }
                       }

                   }
                   echo '<div>';
                   echo '<label>'.$value['nom'].'</label><input type="checkbox" name="activites[]" value="'.$value['id'].'" '.$chkBox.' >';
                   echo '</div>';
               }
               echo '</fieldset>'

             ?>

               <!--##############################-->

               <div id="btnsCDJ2">
                   <!--    echo '<input type="submit" name="annuler" value="Annuler">'."\n\t";-->
                   <input type="submit" name="modifGRP" value="Modifier">
               </div>




       </form>
   </div>

    <?php
}
