<?php require '../header.php'; ?>
	<body style="font-family:sans-serif;">
	    <a href="/sae203/index.php">Accueil</a> | <a href="admin.php">Gestion</a>
	    <hr />
	    <h1>Ajouter une Plante</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
            
            $nom = $_POST['nom'];
            $climat = $_POST['climat'];
            $type = $_POST['types'];
            


            
	        $co=connexionBD();
	        insertionLieu($nom,$climat,$type,$co);
	        deconnexionBD($co);
	    ?>
	</body>
</html>