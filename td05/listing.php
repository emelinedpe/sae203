<?php
require('header.php');
$mesplantes = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', '22108119');

$mesplantes->query('SET NAMES utf8;');
$req = "SELECT * FROM plantes INNER JOIN Lieux ON plantes.lieux_id = Lieux.lieux_id;";
$resultat = $mesplantes->query($req);
echo '<div class="plantesList">' ;

foreach ($resultat as $value) {
    //print_r($value);
    echo '<div class="divPlante">' ;
    echo '<img src='.$value['pl_photo'].' alt='.$value['pl_nom'].'>';
    echo '<h3>'.$value['pl_nom'] .'</h3>';
    if ($value['pl_nom2']!="") {
        echo '<h4>'.$value['pl_nom2'] .'</h4>';
    }
    echo '<p> Taille maximale : '.$value['pl_taille'] .' cm</p>';
    if ($value['pl_nour']!="") {
        echo '<p> Leurs besoins : '.$value['pl_nour'] .'</p>';
    }
    if ($value['pl_propriete']!="") {
        echo '<p> Propriété : '.$value['pl_propriete'] .'</p>';
    }
    if ($value['pl_signif']!="") {
        echo '<p> A savoir : '.$value['pl_signif'] .'</p>'; 
    }
    echo '<p>Origine de la plante : '.$value['lieux_nom'] .'</p>';
    echo '<p>Climat du lieu : '.$value['lieux_climat'] .'</p>';
    
    echo '</div>';
}
echo '</div>';

?>
