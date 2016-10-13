<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Achat de billets en ligne </title>
	<link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>
<body>

<div id="global_etap3">

	<div id="barreBlue">	
	</div>

	<div id="formulaire">  <!--we will leave this balise like this or chenge the name?-->

		<h1>Achat de billets en ligne </h1>
		
			<!--ETAPE 3 XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
			<div><span class="vert hh2">&Eacute;tape 3 :</span> Confirmation de votre commande</div>
					
				<div id="hrr">
					<hr style="border-top: dotted 1px #000" />
				</div>
		
                        
		<br/><h2>Montant total de l'achat: </h2><br/>	
		<?php		

			$total=0;  
			
			//Adults
			$adults=($_GET['txtAdults']);
			echo "<pre>";
			if (isset($adults)&&($adults)>0){
				$total += $adults*20;
				if ($adults <2) {
				echo sprintf("<b>%-30s %3s  %6.2f %1s</b><br/>","1 billet adulte",":",$total,"$");
				}
				else {
				echo sprintf("<b>%-30s %3s  %6.2f %1s b><br/>",$adults." billets adultes",":",$total,"$");
				}
			echo "<br/>";
			}
			//Enfants
			$enfants=$_GET['txtEnfants'];
			if (isset($enfants)&&(($enfants)>0)){
				$bil_enfants = $enfants*10;
				if ($enfants <2) {
				echo sprintf("<b>%-30s %3s  %6.2f %1s</b><br/>","1 billet enfant",":",$bil_enfants,"$");
				}
				else {
				echo sprintf("<b>%-30s %3s  %6.2f %1s </b><br/>",$enfants." billets enfant",":",$bil_enfants,"$");
				}
			$total += $bil_enfants;
			echo "<br/>";
			}
			
			//Courier recommand�
			$radPay=$_GET['radPay'];
			if ($radPay=='courrier_rec') { 
				echo sprintf("<b>%-37s %3s  %6.2f %1s </b><br/>","Courrier recommand&eacute;",":",5,"$");
				$total += 5.00;
				echo "<br/>";
			} 
			
			//Sous-total
			echo sprintf("<b>%-30s %3s  %6.2f %1s </b><br/>","Sous-total",":",$total,"$");
			echo "<br/>";
			
			//Taxes
			$taxes=$total*0.1497;
			echo sprintf("<b>%-30s %3s  %6.2f %1s </b><br/>","Taxes",":",$taxes,"$");
			echo "<br/>";
			
			//Total (TTC)
			$total += $taxes;
			echo sprintf("<b>%-30s %3s  %6.2f %1s </b><br/>","Total (TTC)",":",$total,"$");
			echo "<br/>";
			
	
			echo "</pre>";
			

			if ($radPay=='courrier_rec') {
			
				//verification of the addresse
				$txtApp=$_GET['txtApp'];
				$format="%d-%d";
				sscanf($txtApp,$format,$app,$civ);
				$appFormat= 0;
		
				if(is_null($civ)){
					$appFormat = $txtApp ;
				}
				else{
					$appFormat = "#".$txtApp;
				}

			
			
			//Nom&Adresse
	
				echo "<pre>";
                                print '<br/><font face=" Arial">Une facture vous sera post&eacute;e &agrave; l\'adresse :</font><br/>'; 
				echo sprintf("<b>%-4s %-30s </b><br/>"," ",ucfirst(strtolower($_GET['txtPrenom'])).",".strtoupper ($_GET['txtNom'])); 
				echo sprintf("<b>%-4s %-30s </b><br/>"," ",$appFormat." ".ucfirst(strtolower($_GET['txtRue'])));
				echo sprintf("<b>%-4s %-30s </b><br/>"," ",ucfirst(strtolower($_GET['txtVille']))." "."(".strtoupper ($_GET['txtCode']).")");

				echo "<br/><br/>";
				print '<font face=" Arial">Une confirmation vient d\'&ecirc;tre envoy&eacute;e (pour vos archives) &agrave; l\'adresse de courriel :</font>';
				echo "<br/><br/>";
				printf ($_GET['txtCourriel']);
				echo "</pre>";
			
			}
			else{

			echo "<br/><br/>";
			echo	"<form action='cartecredit.php' method='post'>";
			echo	"<fieldset id=\"proceder\">";
			echo 	"<input type=\"submit\" name=\"formProcede\" value=\"Proc&eacute;der\" id=\"btn2\"/>";			
			echo 	"</fieldset>";
			echo 	"</form>";
			
			 } 

	?>	
	</div>
	
    <div id="footer">
	<?php
            echo" <p> Travail pratique commune Silviya Draganova et Fabiola Ugarte Kopanski<br/>582-N11-MA Introduction au d&eacute;velopement de sites web<br/>
            582-P11-MA Programation web dynamique 1<br/> Mehdi Lalou &copy; 2015 </p>";
	?>
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


