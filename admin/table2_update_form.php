<?php require '../header.php'; ?>
<body style="font-family:sans-serif;">
    <a href="/sae203/index.php">Accueil</a> | <a href="table1_gestion.php">Gestion</a>
	<hr>
    <h1>Modifier une plante</h1>
    <hr />
    <?php
        require '../lib_crud.inc.php';

        $id=$_GET['num'];
        $co=connexionBD();
        $resLieu = getLieu($co, $id);
        
        //var_dump($lieux);
        deconnexionBD($co);


        foreach ($resLieu as $value) {
            echo '<form method="POST" action="table2_update_valide.php" enctype="multipart/form-data">';
        
            echo '<input id="idlieux" name="num" type="hidden" value="'.$value['lieux_id'].'">';
        
            echo '<label for="name">nom lieu:</label>';
            echo '<input type="text" id="name" name="name" value="'.$value['lieux_nom'].'"></br></br>';

            echo '<label for="climat">climat lieu:</label>';
            echo '<input type="text" id="climat" name="climat" value="'.$value['lieux_climat'].'"></br></br>';

            echo '<label for="type">type(s) lieu:</label>';
            echo '<input type="text" id="type" name="type" value="'.$value['lieux_type'].'"></br></br>';

            echo '<input type="submit" value="Modifier">';
        
            echo '</form>';
        }
    ?>
    
</body>
</html>