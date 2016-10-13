<?php
/**
 * Created by PhpStorm.
 * User: Silviya
 * Fichier Index - Affichage du page
 */


?>
<html>
<head>
    <title>Recherche Livre</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
<img src="images/book_open.png" alt="Ouvert livre icon" id="icon_livre">
<h2>Programmation interactive client-serveur - TP2</h2>

<div id="contenu">
<div>
    <!-- Navigation -->

        <input type="submit"    id="ajouter"       value="Ajouter"></input>
        <input type="submit"    id="rechercher"    value="Rechercher"></input>
        <input type="submit"    id="lister"        value="Liste des livres"></input>

</div>
<div>
    <!-- Division pour montrer sélection  -->
    <div class="">

    </div>
    <!-- Tableau  -->
    <table id="entrees" class="table-responsive">
        <tr class="trTH">
            <th >Titre</th>
            <th >Auteur</th>
            <th >Année</th>
            <th >Isbn</th>
            <th >Éditeur</th>
            <th >Évaluation</th>
        </tr>
        <tr>

            <td class="dont"    id="titre"      contenteditable="true"  onkeyup="keyPress(this)"></td>
            <td class="dont"    id="auteur"     contenteditable="true"  onkeyup="keyPress(this)"></td>
            <td class="dont"    id="annee"      contenteditable="true"  onkeyup="keyPress(this)"></td>
            <td class="dont"    id="isbn"       contenteditable="true"  onkeyup="keyPress(this)"></td>
            <td class="dont"    id="editeur"    contenteditable="true"  onkeyup="keyPress(this)"></td>
            <td class="dont"    id="evaluation" contenteditable="true"  onkeyup="keyPress(this)"></td>
            <td class='lastTD'><a href="" id="ajouterLivre"><img src="images/Floopy.png" alt="Ajouter" height="25" width="25"> </td>
        </tr>
    </table>

</div>
<div id="display">

</div>
</body>
</html>
<script language="JavaScript">
    //boolean variable , donne information si le page est en mood ajouter noouveau livre ou chercher des livres
    var recherchLivres = true;
    var champ, valeur;
        $("table#entrees td").on("focus click",
            function () {
                valeur = $(this).html();
                $("table#entrees td.dont").html("");
            });
    $("input#ajouter").click(
        function () {
            recherchLivres = false;
            $("table#entrees td").off("focus click");

        });

    $("input#rechercher").click(
        function () {
            recherchLivres = true;
            $("table#entrees td").on("click", function () {
                valeur = $(this).html();
                $("table#entrees td.dont").html("");
            });
        });
    $("#ajouterLivre").click(function () {
        ajax("ajouter");
    });
    $("input#lister").click(function () {
        recherchLivres = true;
        ajax("lister");
    });


// http://easyautocomplete.com/guide
// http://stackoverflow.com/questions/12370614/jquery-ui-autocomplete-with-json-from-url
// http://blog.bcdsoftware.com/184/jquery-ui-autocomplete-json-and-php/

// http://jsfiddle.net/n3fmw1mw/

function keyPress(el ){
if (recherchLivres){
    valeur = el.firstChild.nodeValue;
    champ = el.id;
    ajax("rechercher");

/*    var options = {
        url: "./json/donnee.json",

        getValue: champ,

        list: {
            match: {
                enabled: true
            }
        }
    };

    $(this).easyAutocomplete(options);
*/

}
}

    /*
    if (recherchLivres) {

        $(function() {
             $( "table#entrees td" ).autocomplete({
                minLength: 0,
                source: './json/donnee.json',
             /*   focus: function( event, ui ) {
                    $( "#project" ).val( ui.item.label );
                    return false;
                },*/
/*                select: function( event, ui ) {
                    $( "#project" ).val( ui.item.label );
                    $( "#project-id" ).val( ui.item.value );
                //    $( "#project-description" ).html( ui.item.desc );
                    return false;
                }
            })
                .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                return $( "<li>" )
                    .append( "<a>" + item.titre + "<br>" + item.auteur + "</a>" )
                    .appendTo( ul );
            };
        });



    }

*/
    //EassyAutocomplete http://easyautocomplete.com/guide


    /**
     * Function qui envoier ler variable et valeurs en $_GET de controleur
     * */
    function ajax(methode) {
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

        if (methode === "ajouter") {
            var queryString = "?ajouter=1";
            queryString += "&titre="+$("td#titre").html();
            queryString += "&auteur="+$("td#auteur").html();
            queryString += "&annee="+$("td#annee").html();
            queryString += "&isbn="+$("td#isbn").html();
            queryString += "&editeur="+$("td#editeur").html();
            queryString += "&evaluation="+$("td#evaluation").html();
            console.log(queryString);
            req.open("GET", "./controleur/Controleur.php"+queryString, true);
        }
        else if (methode === "lister") {
            req.open("GET", "./controleur/Controleur.php?lister=oui", true);
        }
        /*
        else if (methode === "afficher") {
            var valeur = document.getElementById("livre").value;
            req.open("GET", "./controleur/Controleur.php?afficher=blabla&livre=" + valeur, true);
        }*/
        else if (methode === "rechercher") {
         //   alert (valeur + " : "+champ);
            var queryString = "?recherch=1";
            queryString += "&value="+valeur;
            queryString += "&champ="+champ;
            req.open("GET", "./controleur/Controleur.php"+queryString, true);
        }

        req.send(null);
        return false;
    }
</script>