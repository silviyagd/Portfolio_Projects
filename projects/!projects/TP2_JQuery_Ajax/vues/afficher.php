<?php
/**
 * Created by PhpStorm.
 * User: Silviya
 * Fichier View
 */
?>


<h4>Liste de Livre</h4>

<!-- Afficher les resultats dans un tableau-->
<table id="resultats" class="text-left">
    <tr class="trTH">
        <th class="titre">Titre</th>
        <th class="auteur">Auteur</th>
        <th class="annee">Annee</th>
        <th class="isbn">Isbn</th>
        <th class="editeur">Éditeur</th>
        <th class="evaluation">Évaluation</th>
    </tr>
<?php
//var_dump($resultats);
    foreach($resultats as $res){ ?>
    <tr id="<?php echo $res["id"]; ?>" >
        <td class="titre"><?php echo $res["titre"]; ?></td>
        <td class="auteur"><?php echo $res["auteur"]; ?></td>
        <td class="annee"><?php echo $res["annee"]; ?></td>
        <td class="isbn"><?php echo $res["isbn"]; ?></td>
        <td class="editeur"><?php echo $res["editeur"]; ?></td>
        <td class="evaluation"><?php echo $res["evaluation"]; ?></td>
        <td class='lastTD'><img src="images/delete.png" alt="Effacer" height="25" width="25" id="suprimerLivre"></td>
    </tr>
    <?php    
    }
?>
</table>

<script>
    var numero, champ, val; 
 $("table#resultats td").click(function(){
     $(this).attr('contenteditable','true'); 
     $(this).focus(); 
 });
    
 $("table#resultats td").blur(function(){
     numero=$(this).parent().attr("id");
     champ = $(this).attr("class");
     val = $(this).html();
     ajax2("modifier");
 });
 
 $("img#suprimerLivre").click(function(){
     numero=$(this).parent().parent().attr("id");
     ajax2("suprimer");
 });
 
 
 function ajax2(methode) {
        var req = null;

        //rÃ©cupÃ©rer le document xml
        if (window.XMLHttpRequest)
        {
            req = new XMLHttpRequest();
        }
        else if (window.ActiveXObject)
        {
            try {
                req = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e)
            {
                try {
                    req = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                }
            }
        }
        req.onreadystatechange = function ()
        {

            if (req.readyState == 4)
            {
                if (req.status == 200)//il n'a pas eu d'erreur
                {
                    var docHTML = req.responseText; 
                    $("#display").html(docHTML);
                }
                else
                {

                    req.status + " " + req.statusText;
                }
            }
        };

        if (methode === "modifier") {   
            var queryString="?modifier=oui";
            queryString +="&id="+numero;
            queryString +="&champ="+champ;
            queryString +="&val="+val;
            req.open("GET", "./controleur/Controleur.php"+queryString, true);
        }
        if (methode === "suprimer") {   
            var queryString="?suprimer=oui";
            queryString +="&id="+numero;
            req.open("GET", "./controleur/Controleur.php"+queryString, true);
        }
        
        req.send(null);
        return false;
    }
    
    
</script>