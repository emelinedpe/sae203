<?php
require '../header.php'; 
require '../lib_crud.inc.php';
$co=connexionBD();
$lieux = getListeLieux($co);
?>
<!DOCTYPE html>
<html>
	<head>
	    <title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="/sae203/index.php">Accueil</a> | <a href="./admin/admin.php">Gestion</a>
	    <hr />
	    <h1>Ajouter un Lieu</h1>
	    <hr />
	    <form action="table2_new_valide.php" method="POST" >
	        Nom du lieu : <input type="text" name="nom" required /><br />
			Climat du lieu : <input type="text" name="climat" required /><br />
	        Type(s) des lieux : <input type="text" name="types" required /><br />
	        <?php
	            deconnexionBD($co);
	        ?>
	        </select><br />
	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>