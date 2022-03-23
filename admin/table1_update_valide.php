<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="/sae203/index.php">Accueil</a> | <a href="table1_gestion.php">Gestion</a>
	    <hr />
	    <h1>Modifier une plante</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
	
	        $nom = $_POST['name'];
            $nom2 = $_POST['name2'];
            $taille = $_POST['taille'];
            $vie = $_POST['vie'];
            $nourriture = $_POST['nourriture'];
            $propriete = $_POST['propriete'];
            $pays = $_POST['lieu'];
			$id_plante = $_POST['num'];
			//echo $_POST['img'];
	       
			
			if ($_FILES["photo"]["size"]==0) {
				
				$linkImage = $_POST['img'];
			}
			else{
				$imageType=$_FILES["photo"]["type"];
				if ( ($imageType != "image/png") && ($imageType != "image/jpg") && ($imageType != "image/jpeg") ) {
						echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
						die();
				}
		
				$nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];
		
				if(is_uploaded_file($_FILES["photo"]["tmp_name"])) {
					if(!move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/".$nouvelleImage)) {
						echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
						die();
					}
				} else {
					echo '<p>Problème : image non chargée...</p>'."\n";
					die();
				}
				$linkImage = " /images/".$nouvelleImage;
			}
	        
	        $co=connexionBD();
	        UpdatePlantes($nom,$nom2,$taille,$vie,$nourriture,$propriete,$pays,trim($linkImage),$id_plante,$co);
	        deconnexionBD($co);
			
	    ?>
	</body>
</html>