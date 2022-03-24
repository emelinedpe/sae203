<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('header.php');
?>
<h1>Shokubutsu, la bibliothèque numérique de plantes et fleurs !</h1>
<p id="titleRecherche">Résultats de votre recherche</p>
<hr />
<?php
 /*require 'lib_crud.inc.php';
 $co=connexionBD();
 afficherResultatRecherche($co);
 deconnexionBD($co);*/
 if (!empty($_GET['inp_search'])) {
    $connectBDD = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', '22108119');
    $connectBDD->query('SET NAMES utf8;');
    $req = "SELECT * FROM plantes WHERE pl_nom LIKE '%".$_GET['inp_search']."%' OR pl_nom2 LIKE '%".$_GET['inp_search']."%';";
    $resultat = $connectBDD->query($req);

    echo '<div class="plantesList">' ;
    foreach ($resultat as $plante ) {
        echo '<div class="divPlante">' ;
        echo '<img src= ./'.$plante['pl_photo'].' alt='.$plante['pl_nom'].'>';
        echo '<h3> '.$plante['pl_nom'] .'</h3>';
        if ($plante['pl_nom2']!="") {
            echo '<h4>'.$plante['pl_nom2'] .'</h4>';
        }
        echo '<p> Taille maximale : '.$plante['pl_taille'] .' cm</p>';
        if ($plante['pl_nour']!="") {
            echo '<p> Leurs besoins : '.$plante['pl_nour'] .'</p>';
        }
        if ($plante['pl_propriete']!="") {
            echo '<p> Propriété : '.$plante['pl_propriete'] .'</p>';
        }
        if ($plante['pl_signif']!="") {
            echo '<p> A savoir :  '.$plante['pl_signif'] .'</p>';
        }
        
        echo '</div>';
    }
    echo '</div>';
}
else{
    header('Location: form_recherche.php');
}

?>


