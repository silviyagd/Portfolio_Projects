<?php


/** Le requette pour un CDJ
* @return string
*/
function RequetteAccueil ()
{
    $aList = ' select t1.id as "ID",t1.adresse_site , t1.nom_CDJ as "NOM CDJ",t1.image as "Image", '."\n\t" ;
    $aList .= '  t2.nom as "Arrondissement", t3.nom as "Type de CDJ", DATE_FORMAT(t1.debut,"%d %b") as "Debut", '."\n\t" ;
    $aList .= '  DATE_FORMAT(t1.fin,"%d %b") as "Fin", AVG(t4.prix_CDJ) as "Prix" , Min(t4.age_min) as "Min", Max(t4.age_max) as "Max" '."\n\t";
    $aList .= ' from n31__coordonnees_CDJ as t1 '."\n\t";
    $aList .= ' inner join n31__arrondissements as t2 '."\n\t";
    $aList .= ' on t1.id_arrondissement=t2.id '."\n\t";
    $aList .= ' inner join n31__types_CDJ as t3 '."\n\t";
    $aList .= ' on t1.id_type=t3.id '."\n\t";
    $aList .= ' inner join n31__groupe_CDJ as t4 '."\n\t";
    $aList .= ' on t4.id_coordonnees_CDJ=t1.id '."\n\t";
    $aList .= ' left join n31__specialites_CDJ as t5 '."\n\t";
    $aList .= ' on t5.id=t4.id '."\n\t";
    $aList .= ' left join n31__commentaires as t6 '."\n\t";
    $aList .= ' on t6.id_CDJ=t1.id '."\n\t";


//$aList .= ' group by t1.id '."\n\t";
//$aList .= ' ORDER BY  "Arrondissement", "NOM CDJ", "Type de CDJ" '."\n\t";

return $aList;
}


/** Requette pour affiche un CDJ
* @param $id -  Id du choissi CDJ
* @return string - le requette
*/
function RequetteUnCDJ ($id)
{

$aList = 'SELECT t1.id, t1.nom_CDJ, t1.nom_Contacts, t1.adresse, t1.telephone, t1.courriel,  ';
$aList .= ' t1.adresse_site, t1.image, t1.description_CDJ, DATE_FORMAT(t1.debut,"%d %b"), DATE_FORMAT(t1.fin,"%d %b") ,  ';
$aList .= ' t2.nom as Arrondissement , t3.nom as "Type de CDJ" ';
$aList .= ' from n31__coordonnees_CDJ as t1 ';
$aList .= ' inner join n31__arrondissements as t2 ';
$aList .= ' on t1.id_arrondissement=t2.id ';
$aList .= ' inner join n31__types_CDJ as t3 ';
$aList .= ' on t3.id=t1.id_type ';
$aList .= ' where t1.id='.$id;

return $aList;
}

/** Le requette qui viaualisse les activites d'un CDJ
* @param $id -  Id du choissi CDJ
* @return string -  le requette
*/
function RequetteActivitesUn($id)
{

$aList =' select t1.nom ';
$aList .=' from n31__specialites as t1 ';
$aList .=' inner join n31__specialites_CDJ as t2 ';
$aList .=' on t2.id_specialites=t1.id ';
$aList .=' where t2.id='.$id;

return $aList;
}

function RequetteActivites()
{
    $aList = 'select * from n31__specialites ORDER BY nom';

    return $aList;
}


/** Le requette qui vissualise tous les groups du choissi CDJ
* @param $id -  Id du choissi CDJ
* @return string -  le requette
*/
function RequetteGroupes($id)
{
$aList =' select id , age_min , age_max , description , prix_CDJ ';
$aList .=' from n31__groupe_CDJ ';
$aList .=' where id_coordonnees_CDJ='.$id;

return $aList;
}

/** Le requette qui vissualise tous les commentaire laise pour un CDJ
* @param $id -  Id du choissi CDJ
* @return string -  le requette
*/
function RequetteComent ($id)
{
$aList =' select nom, commentaire , date , note ';
$aList .=' from n31__commentaires where id_CDJ = '.$id;
$aList .='order by date DESC';
return $aList;
}

/** Function qui affiche les arrondissements
 * @return string -  le requette
 */
function RequetteArrondissements ()
{
$aList =' select * from n31__arrondissements ';
$aList .=' order by nom ';

return $aList;
}


/** Function qui affiche les type de CDJ
 * @return string -  le requette
 */
function RequetteTypeCDJ ()
{
    $aList =' select * from n31__types_CDJ ';
    $aList .=' order by nom ';

    return $aList;
}

?>