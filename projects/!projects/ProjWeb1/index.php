<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>index des exemples</title>
	</head>
	<body>
        <?php 
        	function getFilesNames($rep) {
				$dir = opendir($rep);
				while (false !== ($entry = readdir($dir))) {
					if(substr($entry, 0, 1) != "." &&
					   $entry != ".." &&
					   $entry != basename($_SERVER['PHP_SELF'])) {
						$nomsFichiers[] = $entry;
					}
				}
				closedir($dir);
				return $nomsFichiers;
			}

			function createLinks($tabLinks){
				foreach ($tabLinks as $filename) {
					echo '<a href="'.$filename.'">'.$filename.'</a><br />';
				}
			}
			$nomsFichiers = getFilesNames(".");
			sort($nomsFichiers);
			createLinks($nomsFichiers);
        ?>
    </body>
</html>
