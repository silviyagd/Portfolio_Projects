<?php

/** Function qui execute un requette et retourne le resultat en array
 * @param $req - le requette
 * @return array - le resultat
 */
function recupereDonnees ($req)
{

    $db = connection();

    $res = array();
    if ($resultat = mysqli_query($db, $req)) {
        while ($row = mysqli_fetch_assoc($resultat)) {
            $res[] = $row;
        }
        return $res;
    }
}


/** Function pour enregistre un commentaire damn le base de donnee
 * @param $nom - nom du personne qui laise le commentaire
 * @param $coment  -  le text du commentaire
 * @param $note - le note
 * @param $id - id du choissi CDJ
 * @return bool - return TRUE s'il le commentaire est enregistre
 */
function RequetteInsertComent ($nom ,  $coment  , $note , $id)
{
    $db = connection();
    $res = false;
    $aList =' insert into n31__commentaires (nom , commentaire , note , id_CDJ) ';
    $aList .=' values ("'.$nom.'","'.$coment.'",'.$note.','. $id.' ) ';


    if ($resultat = mysqli_query($db, $aList))
    {
        $res = true;
    }

    return $res;
}

/** Function qui ajoute les condition dependant le choix du client
 * @param $subm - si le button <Recherch> est choisie
 * @param $arond -  le valeur d'arrondisements
 * @param $typeCDJ -  le valeur du Type de CDJ
 * @param $nomCDJ -  le valeur du Nom de CDJ
 * @param array $aAct -  le valeur des activites
 * @param $prixCDJ -  le valeur du prix de CDJ
 * @param $noteCDJ -  le valeur du note de commentaire du CDJ
 * @return string -  return des conditions por le requette d'affichage
 */
function ExecRecherche($subm , $arond , $typeCDJ , $nomCDJ , $aAct=array() , $prixCDJ , $noteCDJ)
{
    $req = ' where 1 ';
    if ($subm)
    {
        if (($arond) && (!($arond==0)))
        {
            $req .= ' and t2.id='.$arond ;
        }

        if (($typeCDJ) && (!($typeCDJ==0)))
        {
            $req .= ' and t3.id='.$typeCDJ ;
        }

        if ($aAct)
        {
            $aId = '';
            foreach ($aAct as $value)
            {
                $aId .= $value . ' , ';
            }
            $aId = trim ($aId , ' , ');

            $req .= ' and t5.id_specialites in ('.$aId.') ' ;
        }

        if ($nomCDJ)
        {
            $req .= ' and t1.nom_CDJ like "%'.$nomCDJ.'%"';
        }

        if ($prixCDJ)
        {
            $req .= ' and t4.prix_CDJ <= '.$prixCDJ;
        }

        if ($noteCDJ)
        {
            $req .= ' and t6.note >= '.$noteCDJ;
        }

    }

    $req .= ' group by t1.id '."\n\t";
    $req .= ' ORDER BY  "Arrondissement", "NOM CDJ", "Type de CDJ" '."\n\t";
   // echo $req;
    return  $req ;
}




?>