<?php

/**
 * @param null $db
 * @return array
 */
function getMenuItems($db = null)
{
	$aRes = Array();
	if(is_null($db))
	{
		$db = connection();
	}
	$requ = "SELECT * FROM n31__menu_admin ORDER BY ordre ASC, ordre ASC";
	$aMenu = Array();
	if($resultat = mysqli_query($db, $requ))
	{

		while($row = mysqli_fetch_assoc($resultat))
		{
			$aMenu[] = $row;
		}

	}
	//return $aMenu;
	return $aMenu;
	var_dump($aMenu);
}

/** Function qui recupere le menuItem
 * @param $aMenu
 * @return mixed
 */
function recupereMenuInf ($aMenu)
{
	//echo $_GET["menuItem"];
	foreach ($aMenu as $key)
	{
		if ($key['nom'] == $_GET["menuItem"])
		{
			return $key;
		}
	}
}

?>