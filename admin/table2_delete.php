<?php
require '../header.php';
require '../lib_crud.inc.php';
$co=connexionBD();
?>
<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<a href="table2_gestion.php">retour au tableau de bord</a> 	
<hr> <h1>gestion des lieux</h1> <hr>

<?php
// recupérer dans l'url l'id de l'album à supprimer
$lieu_id=$_GET['num'];
//echo '<td><a href="table1_delete.php?num='.$value['bd_id'].'">Supprimer</a></td>'."\n";
deleteLieu($lieu_id,$co);
echo '<h2>vous venez de supprimer le lieu numéro '.$lieu_id.'</h2>';
?>

</body>
</html>