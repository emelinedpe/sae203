<?php require '../header.php'; ?>
    <body>
        <a href="../index.php">Accueil</a>
        <hr />
        <h1>Gestion des données</h1>

        <?php
            
            require '../lib_crud.inc.php';
            $co=connexionBD();
            afficherListe($co);
            deconnexionBD($co);
        ?>
    </body>
</html>