<!DOCTYPE html>
<html>
<head>
	<title>SAE203</title>
</head>
<body style="font-family:sans-serif;">
    <a href="index.php">Accueil</a> | <a href="table1_gestion.php">Gestion</a>
	<hr>
    <h1>Modifier une plante</h1>
    <hr />
    <?php
        require './lib_crud.inc.php';

        $id=$_GET['num'];
        $co=connexionBD();
        $resPlante = getPlante($co, $id);
        //var_dump($resPlante);
        $lieux = getListeLieux($co);
        //var_dump($lieux);
        deconnexionBD($co);


        foreach ($resPlante as $value) {
            echo '<form method="POST" action="table1_update_valide.php" enctype="multipart/form-data">';
        
            echo '<input id="idplante" name="num" type="hidden" value="'.$value['pl_id'].'">';
        
            echo '<label for="name">nom plante:</label>';
            echo '<input type="text" id="name" name="name" value="'.$value['pl_nom'].'"></br></br>';

            echo '<label for="name2">nom 2 plante:</label>';
            echo '<input type="text" id="name2" name="name2" value="'.$value['pl_nom2'].'"></br></br>';
        
            echo '<label for="taille">taille:</label>';
            echo '<input type="number" id="taille" name="taille" value="'.$value['pl_taille'].'"></br></br>';
        
            echo '<label for="vie">Durée de vie:</label>';
            echo '<input type="text" id="vie" name="vie" value="'.$value['pl_vie'].'"></br></br>';
        
            echo '<label for="nourriture">Nourriture:</label>';
            echo '<input type="text" id="nourriture" name="nourriture" value="'.$value['pl_nour'].'"></br></br>';

            echo '<label for="propriete">Propriété:</label>';
            echo '<input type="text" id="propriete" name="propriete" value="'.$value['pl_propriete'].'"></br></br>';

            echo '<label for="lieu">lieu:</label>';
            echo '<select name="lieu" id="lieu">';
                foreach ($lieux as $lieu ) {
                    echo '<option value='.$lieu['lieux_id'].'>'.$lieu['lieux_nom'].'</option>';
                }
						
			echo'</select></br></br>';

            echo '<label for="photo">Photo: </label>';
            echo '<input type="file" id="photo" name="photo"></br></br>';
            echo '<input id="linkImage" name="img" type="hidden" value="'.$value['pl_photo'].'">';

            echo '<input type="submit" value="Modifier">';
        
            echo '</form>';
        }
    ?>
    
</body>
</html>