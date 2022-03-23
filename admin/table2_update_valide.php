<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="/sae203/index.php">Accueil</a> | <a href="table2_gestion.php">Gestion</a>
	    <hr />
	    <h1>Modifier une plante</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
	
	        $nom = $_POST['name'];
            $climat = $_POST['climat'];
            $types = $_POST['type'];
            $lieu_id = $_POST['num'];


	        $co=connexionBD();
	        UpdateLieux($nom,$climat,$types,$lieu_id,$co);
	        deconnexionBD($co);
			
	    ?>
	</body>
</html>