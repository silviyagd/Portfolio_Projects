<?php


/*List CDJ ####################################################*/
/**
* Function qui affiche le list pour un capm de jour , qui sera modifier
*/
function AfficheListCDJ()
{
//recupere l'information pour le CDJ avec id=$idCDJ et $tableau

$CDJDonnees = recuperTableauInf($_GET["id"] , "n31__coordonnees_CDJ" , true);

//  $CDJGroupId = recuperGroupId($_GET["id"]);
//   $CDJGroup = recuperTableauInf($CDJGroupId , "n31__groupe_CDJ" , true);
?>

<div id="modifCDJ">

    <h1 class="titre">Modifier le Camp de jour: </h1>
    <!-- imam li nugda ot imeto na tablicata v url-a -->
    <form action="index.php?page=list&action=modifier<?php echo '&menuItem='.$_GET["menuItem"].'&id='.$_GET["id"] ;?> " method="post" >

        <div id="nomCDJ">
            <label>Nom de Camp de Jour</label>
            <input type="text" name="nom_CDJ" value="<?php echo $CDJDonnees[0]["nom_CDJ"]; ?> ">
        </div>

        <?php


        /*###########################################################################*/
        echo '<div id="TypeArondDateCDJ">';
        /* visualise le select pour l'Type de camp de jour */
        $typeCDJ = recuperTableauInf( 1 , 'n31__types_CDJ' , FALSE);
        echo '<div id="TAD_CDJ1">';
        echo "<label>Type de camp de jour</label>";
        echo "<select name='typeCDJ' >"."\n\t";
        foreach ($typeCDJ as $value)
        {
            if ($value['id']==$CDJDonnees[0]['id_type'])
            {
                echo '<option value="'.$value['id'].'" selected="selected">'.$value['nom'].'</option>'."\n\t";
            }
            else
            {
                echo '<option value="'.$value['id'].'">'.$value['nom'].'</option>'."\n\t";
            }
        }

        echo "</select>";
        echo '</div>'."\n\t"; /*id="TAD_CDJ4"*/


        /* visualise le select pour l'Arrondissements */
        $tableau = "n31__arrondissements";
        $ArrondDonnees = recuperTableauInf( 1 , $tableau , false);
        echo '<div id="TAD_CDJ2">';
        echo "<label>Arrondissements</label>";
        echo "<select name='arronds' >"."\n\t";
        foreach ($ArrondDonnees as $value)
        {
            if ($value['id']==$CDJDonnees[0]['id_arrondissement'])
            {

                echo '<option value="'.$value['id'].'" selected="selected">'.$value['nom'].'</option>'."\n\t";
            }
            else
            {
                echo '<option value="'.$value['id'].'">'.$value['nom'].'</option>'."\n\t";
            }
        }

        echo "</select>";
        echo '</div>'; /*id="TAD_CDJ2"*/


        /* visualise le select pour l'Debut */
        echo '<div id="TAD_CDJ3">';
        echo "<label>Debut</label>";
        echo '<input type="text" name="debut" value="'.$CDJDonnees[0]["debut"].'" >'."\n\t";
        echo '</div>'."\n\t"; /*id="TAD_CDJ3"*/

        /* visualise le select pour l'Fin */
        echo '<div id="TAD_CDJ4">';
        echo "<label>Fin</label>"."\n\t";
        echo '<input type="text" name="fin" value="'.$CDJDonnees[0]["fin"].'" >'."\n\t";
        echo '</div>'."\n\t"; /*id="TAD_CDJ4"*/

        echo '</div>'."\n\t";  /*id="TypeArondDateCDJ"*/


        /*#######################################################################################*/
        echo '<div id="TelCourNomCDJ">';
        /* visualise le select pour Nom de contact */
        echo '<div id="TCN1">'."\n\t";
        echo "<label>Nom de contact</label>"."\n\t";
        echo ' <input type="text" name="nomCont" value="'.$CDJDonnees[0]["nom_Contacts"].'">'."\n\t";
        echo '</div>'."\n\t";

        /* visualise le select pour l'Telephone */
        echo '<div id="TCN2">'."\n\t";
        echo "<label>T&eacute;l&eacute;phone</label>"."\n\t";
        echo ' <input type="text" name="tel_CDJ" value="'.$CDJDonnees[0]["telephone"].'" >'."\n\t";
        echo '</div>'."\n\t";

        /* visualise le select pour l'Couriel */
        echo '<div id="TCN3">'."\n\t";
        echo "<label>Couriel</label>"."\n\t";
        echo '<input type="text" name="courriel" value="'.$CDJDonnees[0]["courriel"].'" >'."\n\t";
        echo '</div>'."\n\t";



        echo '</div>'."\n\t";


        /*####################################################*/
        /* visualise le select pour l'Adresse  */
        echo '<div id="AdrCDJ">';
        echo "<label>Adresse</label>";
        echo ' <input type="text" name="adresse_CDJ" value="'.$CDJDonnees[0]["adresse"].'">'."\n\t";
        echo '</div>'."\n\t";

        /* visualise le select pour l'Site*/
        echo '<div id="SiteCDJ">';
        echo "<label>Site</label>";
        echo '<input type="text" name="site" value="'.$CDJDonnees[0]["adresse_site"].'" >'."\n\t";
        echo '</div>'."\n\t";


        /* visualise le select pour l'Description */
        echo '<div id="descCDJ">';
        echo "<label>Description</label>";
        echo '<textarea  name="desc" rows=5 cols=50>'.$CDJDonnees[0]["description_CDJ"].'</textarea>'."\n\t";
        echo '</div>'."\n\t";


    /*Upload file###############################*/

    echo' <input type="file" name="myFile" value="'.$CDJDonnees[0]["image"].'"><br>';

    echo '<img src="' . $CDJDonnees[0]["image"] . '" alt="Image" style="width:200px;height:150px;">';
   // echo $CDJDonnees[0]["image"];
       /*###############################*/
        /* visualise le Group de CDJ */
        $typeCDJ = recuperTableauInf( 1 , 'n31__groupe_CDJ' , FALSE);
        // var_dump($typeCDJ);
        // AfficheListeGroupCDJ($typeCDJ);

        /*###############################*/

        echo '<div id="btnsCDJ2">';
        //    echo '<input type="submit" name="annuler" value="Annuler" >'."\n\t";
        echo '<input type="submit" name="sauvegarderCDJ" value="Sauvegarder" >'."\n\t";
        echo '</div>';

        /*
        echo '<div id="btnsCDJ">';
            echo '<input type="submit" name="coment" value="Commentaires">';
            echo '<input type="submit" name="grp" value="Group camp de jour">';
        echo '</div>';
        */

        echo '<div id="end"></div>'."\n\t";


        echo '</form>'."\n\t";
        echo '</div>'."\n\t";


        }

 
        /**
         * Function qui affiche le formulaire pour entre l'information pour CDJ
         * @param type $aTabl
         */
        function AfficheAjouteCDJ( $aTabl )
        {
        // echo $aTabl;
        $name = isset($_GET['ajoute'])?$_GET['ajoute']:"";
        ?>
        <div id="modifCDJ">

            <h1>Ajoute de  <?php echo $_GET['menuItem'];?></h1>

            <form action="index.php?page=list&action=ajoute<?php echo '&menuItem='.$_GET["menuItem"];?> " method="post" enctype="multipart/form-data">

                <div id="nomCDJ">
                    <label>Nom de Camp de Jour</label>
                    <input type="text" name="nom_CDJ" value="">
                </div>

                <div id="TypeArondDateCDJ">
                    <?php

                    /* visualise le select pour l'Type de camp de jour */
                    $typeCDJ = recuperTableauInf( 1 , 'n31__types_CDJ' , FALSE);
                    echo '<div id="TAD_CDJ1">';
                    echo "<label>Type de camp de jour</label>";
                    echo '<select name="typeCDJ" >'."\n\t";
                    foreach ($typeCDJ as $value)
                    {
                        echo '<option value="'.$value['id'].'">'.$value['nom'].'</option>'."\n\t";
                    }

                    echo "</select>";
                    echo '</div>'."\n\t"; /*id="TAD_CDJ4"*/


                    /* visualise le select pour l'Arrondissements */
                    $tableau = "n31__arrondissements";
                    $ArrondDonnees = recuperTableauInf( 1 , $tableau , false);
                    echo '<div id="TAD_CDJ2">';
                    echo "<label>Arrondissements</label>";
                    echo "<select name='arronds'>"."\n\t";
                    foreach ($ArrondDonnees as $value)
                    {
                        echo '<option value="'.$value['id'].'">'.$value['nom'].'</option>'."\n\t";
                    }
                    ?>
                    </select>
                </div>


                <!-- visualise le select pour l'Debut -->
                <div id="TAD_CDJ3">
                    <label>Debut</label>
                    <input type="text" name="debut" value="" >
                </div>

                <!-- visualise le select pour l'Fin --->
                <div id="TAD_CDJ4">
                    <label>Fin</label>
                    <input type="text" name="fin" value="">
                </div>

        </div>


        <!--#######################################################################################-->
        <div id="TelCourNomCDJ">
            <!-- visualise le select pour Nom de contact -->
            <div id="TCN1">
                <label>Nom de contact</label>
                <input type="text" name="nomCont" value="">
            </div>

            <!-- visualise le select pour l'Telephone -->
            <div id="TCN2">
                <label>T&eacute;l&eacute;phone</label>
                <input type="text" name="tel_CDJ" value="" >
            </div>

            <!-- visualise le select pour l'Couriel -->
            <div id="TCN3">
                <label>Couriel</label>
                <input type="text" name="courriel" value="" >
            </div>



        </div>


        <!--###################################################-->
        <!-- visualise le select pour l'Adresse  -->
        <div id="AdrCDJ">
            <label>Adresse</label>
            <input type="text" name="adresse_CDJ" value="">
        </div>

        <!-- visualise le select pour l'Site-->
        <div id="SiteCDJ">
            <label>Site</label>
            <input type="text" name="site" value="" >
        </div>


        <!-- visualise le select pour l'Description -->
        <div id="descCDJ">

            <label>Description</label>
            <textarea  name="desc" rows=5 cols=50></textarea>
        </div>

       <!--Upload file ##############################-->

            <input type="file" name="myFile">
            <br>
         <!--   <input type="submit" value="Upload"> -->

        <!--Button ##############################-->

        <div id="btnsCDJ2">
            <!--    echo '<input type="submit" name="annuler" value="Annuler">'."\n\t";-->
            <input type="submit" name="ajouteCDJ" value="Ajouter">
        </div>

        <div id="end"></div>


    </form>
</div>


<?php
}

/**
 * Function affiche le champ pour entre nouveau information du Service de Garde
 */
function AfficheAjouteSDG()
        {

        ?>
        <div id="modifCDJ">

            <h1>Ajoute de  <?php echo $_GET['menuItem'];?></h1>

            <form action="index.php?page=list&action=ajoute<?php echo '&menuItem='.$_GET["menuItem"];?> " method="post">

                <div id="ajouteSDG">
                <?php
                    $req = 'select id,nom_CDJ from n31__coordonnees_CDJ order by nom_CDJ' ;
                    $nomCDJ = verifEnfants($req);

                        echo "<label>Nom Camp de jour</label>";
                        echo "<select name='nomCDJ' >"."\n\t";
                            foreach ($nomCDJ as $value)
                            {
                            echo '<option value="'.$value['id'].'">'.$value['nom_CDJ'].'</option>'."\n\t";
                            }

                            echo "</select>";
                        echo '</div>'."\n\t"; /*id="TAD_CDJ4"*/
                ?>


                    <label>Prix</label>
                    <input type="text" name="prixSDG" pattern="[0-9]+" value="" >

                    <label>Debut</label>
                    <input type="text" name="debutSDG" value="">

                    <label>Fin</label>
                    <input type="text" name="FinSDG" value="">


        <!--##############################-->

        <div id="btnsCDJ2">
            <!--    echo '<input type="submit" name="annuler" value="Annuler">'."\n\t";-->
            <input type="submit" name="ajouteSDG" value="Ajouter">
        </div>

 <!--       <div id="end"></div> -->


    </form>
</div>


<?php
}

