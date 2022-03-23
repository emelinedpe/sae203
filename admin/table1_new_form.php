<?php
require '../lib_crud.inc.php';
$co=connexionBD();
$lieux = getListeLieux($co);
?>
<?php require '../header.php'; ?>
	<body style="font-family:sans-serif;">
	    <a href="/sae203/index.php">Accueil</a> | <a href="./admin/admin.php">Gestion</a>
	    <hr />
	    <h1>Ajouter une plante</h1>
	    <hr />
	    <form action="table1_new_valide.php" method="POST" enctype="multipart/form-data">
	        Nom : <input type="text" name="nom" required /><br />
			Nom 2 : <input type="text" name="nom2" /><br />
	        Taille : <input type="number" name="taille" min="0" max="50000" required /><br />
			Durée de vie : <input type="text" name="vie" required /><br />
			Nourriture : <input type="text" name="nourriture" required /><br />
	        Propriété : <input type="resume" name="propriete" required /><br />
            Pays : <select name="lieu" id="lieu"><?php
						foreach ($lieux as $lieu ) {
							echo '<option value='.$lieu['lieux_id'].'>'.$lieu['lieux_nom'].'</option>';
						}
						?>
					</select><br />
	        Photo : <input type="file" name="photo" required /><br />
	        <?php
	            
	            //afficherAuteursOptions($co);
	            //deconnexionBD($co);
	        ?>
	        </select><br />
	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>