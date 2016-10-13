<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Achat de billets en ligne </title>
	<link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>
<body>

<div id="global">

	<div id="formulaire">  
	<?php
	if (empty($_POST['formValider'])){
		$_POST['txtCarte']="";}
	?>
	<form action= "<?= $_SERVER["PHP_SELF"] ?>" method="post"
		  enctype="application/x-www-form-urlencoded">

		<h1>Achat de billets en ligne </h1>
		<!--ETAPE 4 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
		<h2><span class="vert">&Eacute;tape 4 :</span> Information de paiement</h2>		
		<div id="hrr">
			<hr style="border-top: dotted 1px #000" />
		</div>

		<div>														
			<label for="cartecredit">Num&eacute;ro de carte de cr&eacute;dit</label>
			<input type="text" name="txtCarte" size="45%" id="carte" value="<?php echo isset($_POST['txtCarte']) ? $_POST['txtCarte'] : '' ?>"/>	
		</div>

		<fieldset>
			<legend>Type </legend>
			<div class="paddCheck">
				<input type="radio" name="radio" value="radVisa" id="radVisa"  <?php if (empty($_POST['radio'])): $_POST['radio']= '';endif; if($_POST['radio']=="radVisa"):    echo "checked='checked'"; endif;  ?> />   Visa 
			</div>	
			<div class="paddCheck">
				<input type="radio" name="radio" value="radMaster" id="radMaster" <?php if (empty($_POST['radio'])): $_POST['radio']= '';endif; if($_POST['radio']=="radMaster"):    echo "checked='checked'"; endif;  ?>/> Mastercard 	
			</div>
			
			<input type="submit" name="formValider" value="Valider" id="btn"/>			

		</fieldset>
	
		<?php	
		
		$strCard = str_replace(' ','',$_POST['txtCarte']);
		
                // Its checking if the numbers are less than 16 and if is entered something different from a number
		if (!empty($_POST['txtCarte'])&&(strlen($strCard)<>16)&& (is_numeric($strCard))) {
			echo "<p class=\"alert\">Ecrivez correctement votre numero de carte! La carte valide avec 16 chiffres</p>" ; 
			//exit;
		} 
		else {


		
			// Veryfying if its checked Visa and first symbole is 4 or is checked Master and first symbol is in the range 51-55 and lendth is <>16symbols and numbers
			if (((($_POST['radio']=="radVisa")&&(substr( $strCard , 0, 1 )==4)) 
					||(($_POST['radio']=="radMaster")&& 
						((substr( $_POST['txtCarte'], 0, 2 )>=51)&&(substr( $strCard , 0, 2 )<=55))))
				&& ((isset($_POST['txtCarte']))&& !(empty($_POST['txtCarte'])))
				)
			{
			
				$chrOdd=0;
				$chrEven=0;

				for( $i = 0; $i <= strlen($strCard)-1; $i++ ) {
					if (($i%2)!=0) {
						$chrEven += $strCard[$i];
						
					}
					else {
						$chrOdd2 = $strCard[$i]*2;
						if ($chrOdd2>9) {
							$chrOdd += $chrOdd2 - 9;}
						else $chrOdd += $chrOdd2;
					}

				} //for close
				
			
				if ((($chrOdd+$chrEven)%10)<>0 ) {
					echo "<p class=\"alert\">Vous devez entrer un numero valide de la carte!</p>";
					//exit;
					
				}
				else {echo "Votre carte est valide!";}
			}
			elseif(!empty($_POST['txtCarte'])) 
			{

				//cheks if is entered Mastercard number and is checked Visa
                                if (($_POST['radio']=="radVisa")&&(substr( $strCard , 0, 1 )!=4)) 
				{

					echo "<p class=\"alert\">Ce n'est pas le bon numero de la carte VISA!</p>";
				}
				elseif(
				//cheks if is entered Visacard number and is checked Mastercard
				($_POST['radio']=="radMaster")&& ((substr( $strCard, 0, 2 )<51)||(substr( $strCard , 0, 2 )>55)))
				{

					echo "<p class=\"alert\">Ce n'est pas le bon numero de la carte Mastercard!</p>";
				}
			}
			elseif(($_POST['radio']))
			{
				
				echo "<p class=\"alert\">Ecrivez votre carte s'il vous plait</p>";
			}
				
			
		}
		
		?>
		
	</form> 	
	</div>


    <div id="footer">
        <p> 
        Travail pratique commune <br/>582-N11-MA Introduction au d&eacute;velopement de sites web<br/>
        582-P11-MA Programation web dynamique 1<br/>Silviya Draganova &amp; Fabiola Ugarte Kopanski 2015 
        </p>
        
        
<!--
            <p>
              <a href="http://validator.w3.org/check?uri=referer"><img
                src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
            </p>
-->
  
    </div>
</div>	


</body>
</html>
