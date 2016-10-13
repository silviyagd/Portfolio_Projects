<?php
	//empty variables except the selectProv wich has quebec as preselected
	$txtPrenom='';
	$txtNom='';
	$txtApp='';
	$txtVille='';
	$txtCode='';
	$txtRue='';
	$txtCourriel='';
	$txtAdults='';
	$txtEnfants='';
	$selectProv='quebec';
	$textTelDebut='';
	$textTelMilieu='';
	$textTelFinal='';
	$radPay='';

	//if the $_Get exists, we put them in ours variables
	if (isset($_GET['txtPrenom'])&&checkNom($_GET['txtPrenom'])){
		$txtPrenom=$_GET['txtPrenom'];
	}
	if (isset($_GET['txtNom'])&&checkNom($_GET['txtNom'])){
		$txtNom=$_GET['txtNom'];
	}
	if (isset($_GET['txtApp'])&&checkNom($_GET['txtApp'])){
		$txtApp=$_GET['txtApp'];
	}
	if (isset($_GET['txtVille'])&&checkNom($_GET['txtVille'])){
		$txtVille=$_GET['txtVille'];
	}
	if (isset($_GET['txtCode'])&&checkCode($_GET['txtCode'])){
		$txtCode=$_GET['txtCode'];
	}
	if (isset($_GET['txtRue'])&&checkNom($_GET['txtRue'])){
		$txtRue=$_GET['txtRue'];
	}
	if (isset($_GET['txtCourriel'])&& !filter_var($_GET['txtCourriel'], FILTER_VALIDATE_EMAIL) === FALSE){
		$txtCourriel=$_GET['txtCourriel'];
	}
	if (isset($_GET['txtAdults'])&&checkIntier($_GET['txtAdults'])){
		$txtAdults=$_GET['txtAdults'];
	}
	if (isset($_GET['txtEnfants'])&&checkIntier($_GET['txtEnfants'])){
		$txtEnfants=$_GET['txtEnfants'];
	}
	if (isset($_GET['textTelDebut'])&&(checkIntier($_GET['textTelDebut'])) &&(strlen($_GET['textTelDebut'])==3)){
		$textTelDebut=$_GET['textTelDebut'];
	}
	if (isset($_GET['textTelMilieu'])&&(checkIntier($_GET['textTelMilieu'])) &&(strlen($_GET['textTelMilieu'])==3)){
		$textTelMilieu=$_GET['textTelMilieu'];
	}
	if (isset($_GET['textTelFinal'])&&(checkIntier($_GET['textTelFinal'])) &&(strlen($_GET['textTelFinal'])==4)){
		$textTelFinal=$_GET['textTelFinal'];
	}
	if (isset($_GET['selectProv'])){
		$selectProv=$_GET['selectProv'];
	}
	if (isset($_GET['radPay'])){
		$radPay=$_GET['radPay'];
	}


	//if all is fill we go to tratement.php page and we send the values of the variables
	if(
		isset($_GET['formSubmit'])&&
		(isset($txtPrenom)&&!empty($txtPrenom))&&
		(isset($txtNom)&&!empty($txtNom))&&
		(isset($txtApp)&&!empty($txtApp))&&
		(isset($txtVille)&&!empty($txtVille))&&
		(isset($txtCode)&&!empty($txtCode))&&
		(isset($txtRue)&&!empty($txtRue))&&
		(isset($txtCourriel)&& !empty($txtCourriel))&&
		//not necessary to have both so if we have one or the other we can go to traitement.php
		($txtAdults==TRUE || $txtEnfants==TRUE)&&
		(isset($textTelDebut)&& !empty($textTelDebut))&&
		(isset($textTelMilieu)&&!empty($textTelMilieu))&&
		(isset($textTelFinal)&&!empty($textTelFinal))&&
		isset($radPay)
		
		)
		{
		header("Location:traitement.php?txtPrenom={$txtPrenom} &txtNom={$txtNom} &txtApp={$txtApp} &txtVille={$txtVille}&txtCode={$txtCode} &txtRue={$txtRue} &txtCourriel={$txtCourriel}&txtAdults={$txtAdults} &txtEnfants={$txtEnfants} &textTelDebut={$textTelDebut} &textTelMilieu={$textTelMilieu}&textTelFinal={$textTelFinal}&radPay={$radPay}");
		}

	//check the integers, are they numeric string type? without . without , and without spaces
	function checkIntier($val){
		return is_numeric($val) && !stristr($val, ".")&& !(int)$val!=$val && round($val) && $val>=0  ? TRUE: FALSE;	
	}
	//check the postal code
	function checkCode($code){
		if((strlen($code)==6 && is_numeric($code[1]) && is_numeric($code[3]) && is_numeric($code[5]) && is_string($code[0]) && is_string($code[2]) && is_string($code[4]))||
			(strlen($code)==7 && is_numeric($code[1]) && is_numeric($code[4]) && is_numeric($code[6]) && is_string($code[0]) && is_string($code[2]) && is_string($code[5]))){
			return TRUE;
		}
		else{return FALSE;}		
	}
	//check the prenom, nom et ville, avoiding some elements
	function checkNom($nom){
		$liste= array(".","/","\\","!","@","#","$","%","?","&","*","(",")","=",";",":","<",">");
		$a=0;
		foreach($liste as $element){
			if (stristr($nom, $element)){
				$a++;
			}
		}
		return ($a>0)? FALSE :TRUE ;
		
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Achat de billets en ligne</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>

<body>

<div id="global">
	<!--bleu banner-->
	<div id="barreBlue">	
	</div>

	<div id="formulaire">

	<form action="<?=  $_SERVER['PHP_SELF'];?>" method="get">

		<fieldset id="achatbillets">
			<legend class='hh1'>Achat de billets en ligne </legend>

				<!--ETAPE 1 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
				<fieldset id="etape1">
					<legend class='hh2'><span class="vert">Étape 1 :</span> Inscrivez vos informations</legend>
						
						<div class="hrr">
							<hr style="border-top: dotted 1px #000" />
						</div>

						<!--Block Identité ########################################-->
						<fieldset id="ident">
							<legend>Identification</legend>	
							<div class="left">													
								<input type="text" name="txtPrenom" size="40%" id="prenom" value="<?php echo $txtPrenom ?>"/>	
								<label for="prenom">Prénom</label>

									<!--prenom error msg, validating the input and if it's the fisrt time page loaded-->
									<div class="left">
										<p class="alert" style="visibility:<?php echo $txtPrenom || empty($_GET['formSubmit']) ? "hidden" : "visible"?>">Ecrivez votre prenom s'il vous plaît</p>
									</div>
							</div>
							<div class="right">
																															
								<input type="text" name="txtNom" size="40%" id="nom" value="<?php echo $txtNom; ?>"/>	
								<label for="nom">Nom</label>

									<!--nom error msg, validating the input and if it's the fisrt time page loaded-->
									<div class="left">
										<p class="alert" style="visibility:<?php echo $txtNom || empty($_GET['formSubmit']) ? "hidden" : "visible"?>">Ecrivez votre nom s'il vous plaît</p>
									</div>	
							</div>					
						</fieldset>

						<!--Block Adresse ########################################-->
						<fieldset id="adresse">
							<legend>Adresse</legend>

							<div class="left">								
								<input type="text" name="txtApp" size="40%" id="numcivapp" value="<?php echo $txtApp; ?>"/>
								<label for="numcivapp">Appartement - No civique</label>
									<!--appartement error msg, validating the input and if it's the fisrt time page loaded-->
									<div>
										<p class="alert" style="visibility:<?php echo $txtApp || empty($_GET['formSubmit']) ? "hidden" : "visible"?>">Ecrivez votre numéro d'appartement</p>
									</div>	
								<input type="text" name="txtVille" size="40%" id="ville"  value="<?php echo $txtVille; ?>"/>
								<label for="ville">Ville</label>
									<!--ville error msg, validating the input and if it's the fisrt time page loaded-->
									<div>
										<p class="alert" style="visibility:<?php echo $txtVille || empty($_GET['formSubmit']) ? "hidden" : "visible"?>">Ecrivez votre ville</p>
									</div>
								
								<input type="text" name="txtCode" size="40%" id="cpostal"  value="<?php  echo $txtCode; ?>"/>
								<label for="cpostal">Code postal</label>
									<!--postal code error msg, validating the input and if it's the fisrt time page loaded-->
									<div class="left">
										<p class="alert" style="visibility:<?php echo $txtCode || empty($_GET['formSubmit']) ? "hidden" : "visible"?>">Ecrivez votre code postal</p>
									</div>
							</div>

							<div class="right">

								<input type="text" name="txtRue" size="40%" id="rue"  value="<?php echo $txtRue; ?>"/>
								<label for="rue">Rue</label>
									<!--rue error msg, validating the input and if it's the fisrt time page loaded-->
									<div class="left">
										<p class="alert" style="visibility:<?php echo $txtRue || empty($_GET['formSubmit']) ? "hidden" : "visible"?>">Ecrivez votre rue </p>
									</div>
								
								<select name="selectProv" id="prov" >
									<option value="alberta"   <?php if($selectProv == "alberta"):   echo "selected='selected'"; endif; ?>>Alberta</option>
									<option value="british"   <?php if($selectProv == "british"):   echo "selected='selected'"; endif; ?>>British Columbia</option>
									<option value="manitoba"  <?php if($selectProv == "manitoba"):  echo "selected='selected'"; endif; ?>>Manitoba</option>
									<option value="brunswick" <?php if($selectProv == "brunswick"): echo "selected='selected'"; endif; ?>>New Brunswick</option>
									<option value="labrador"  <?php if($selectProv == "labrador"):  echo "selected='selected'"; endif; ?>>Newfoundland and Labrador</option>
									<option value="scotia"    <?php if($selectProv == "scotia"):    echo "selected='selected'"; endif; ?>>Nova Scotia</option>
									<option value="ontario"   <?php if($selectProv == "ontario"):   echo "selected='selected'"; endif; ?>>Ontario</option>
									<option value="prince"    <?php if($selectProv == "prince"):    echo "selected='selected'"; endif; ?>>Prince Edward Island</option>
									<option value="quebec"    <?php if($selectProv == "quebec"):    echo "selected='selected'"; endif; ?>>Québec</option>
									<option value="saska"     <?php if($selectProv == "saska"):     echo "selected='selected'"; endif; ?>>Saskatchewan</option>
								</select>							
								<label for="prov">Province</label>
							</div>
						</fieldset>
						
						<!--Block Adresse Courriel et téléphone ########################################-->
						<div class ="left">
							<fieldset>
								<legend>Adresse de courriel </legend>
									<input type="text" name="txtCourriel" size="40%" id="courriel" value="<?php echo $txtCourriel; ?>"/>
									<label for="courriel">Ex: usager@domaine.com</label>
									<!--adresse de courriel error msg, validating the input and if it's the fisrt time page loaded-->
									<div class="left">
										<p class="alert" style="visibility:<?php echo $txtCourriel || empty($_GET['formSubmit']) ? "hidden" : "visible"?>">Remplissez votre courriel s'il vous plaît</p>
									</div>
							</fieldset>

						</div>

						<div class= "right">
							<fieldset>
								<legend>Téléphone </legend>
									<div class="left" >																				<!-- apllying the checkIntier Function, checking the lengh, printing-->
										<input type="text" name="textTelDebut" size="3px" id="telcodereg"  value="<?php  echo $textTelDebut;?>"/>-
										<label for="tel3dig">(###)</label>
									</div>
									<div class="left" >
										<input type="text" name="textTelMilieu" size="3px" id="tel3dig"  value="<?php  echo $textTelMilieu;?>"/>-
										<label for="tel3dig2">###</label>
									</div>
									<div >
										<input type="text" name="textTelFinal" size="4px" id="tel4dig"  value="<?php  echo $textTelFinal;?>"/>
										<label for="tel4dig">#### </label>
										
									</div>
									<!--phone number error msg, validating the 3 inputs and if it's the fisrt time page loaded-->
									<div>
										<p class="alert" style="visibility:<?php echo $textTelDebut && $textTelMilieu && $textTelFinal || empty($_GET['formSubmit']) ? "hidden" : "visible"?>">Remplissez le numéro de téléphone s'il vous plaît</p>
									</div>
							</fieldset>
						</div>					
				</fieldset>
                
                <!--ETAPE 2 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
				<fieldset id="etape2">
					<legend class='hh2'><span class="vert">Étape 2 :</span> Détails de la commande </legend>
						<div class="hrr">
							<hr style="border-top: dotted 1px #000" />
						</div>
						<!--Block Nb de billets ########################################-->
						<fieldset>
							<legend>Nombre de billets </legend>
								<div class="left">
									<input type="text" name="txtAdults" size="6px" id="adults"  value="<?php  echo $txtAdults;?>"/>
									<label for="adults">Adultes</label>
								</div>

								<div class="espace">
									<input type="text" name="txtEnfants" size="6px" id="enfants"  value="<?php echo $txtEnfants;?>"/>
									<label for="enfants">Enfants</label>
								</div>
									<!--Billets error msg, validating the input and if it's the fisrt time page loaded-->
									<div class="left">
										<p class="alert" style="visibility:<?php echo (($txtAdults>0) || ($txtEnfants>0)) || empty($_GET['formSubmit']) ? "hidden" : "visible"?>">Ecrivez le nombre de billets que vous desirez</p>
									</div>
						</fieldset>
						<!--Block Frais divers ########################################-->
						<fieldset>
							<legend>Frais divers </legend>
							<div class="paddCheck">
								
								<input type="radio" name="radPay" value="courrier_rec" id="courrier" <?php if (empty($radPay)): $radPay= '';endif; if($radPay=="courrier_rec"):    echo "checked='checked'"; endif;  ?> />  &nbsp; Courrier recommandé (Frais de 5$)
							</div>	
							<div class="paddCheck">
								<input type="radio" name="radPay" value="paiement_dif" id="paimentdiff" <?php if($radPay=="paiement_dif"):    echo "checked='checked'"; endif; ?> /> &nbsp; Paiement différé	
							</div>
									<!--radio error msg, validating the input and if it's the fisrt time page loaded-->
									<div class="left">
										<p class="alert" style="visibility:<?php echo ($radPay==TRUE || empty($_GET['formSubmit'])) ? "hidden" : "visible"?>">Cochez une case</p>
									</div>

						</fieldset>

				</fieldset>

			<!--SUBMIT ########################################-->
			 <input type="submit" name="formSubmit" value="Confirmer la commande" id="btn"/>			
		</fieldset>
	</form>
    </div>

    <div id="footer">
        <p> 
        Travail pratique commune Silviya Draganova et Fabiola Ugarte Kopanski <br/>582-N11-MA Introduction au dévelopement de sites web<br/>
        582-P11-MA Programation web dynamique 1<br/> Mehdi Lalou © 2015
        </p>
        <!--
        <p>
           <a href="http://validator.w3.org/check?uri=referer"><img
             src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
         </p>
        <p>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px"
                src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                alt="CSS Valide !" />
            </a>
        </p>
        
        -->
        
    </div>
</div>	

</body>
</html>
