<?php
require 'lib_crud.inc.php';
$co=connexionBD();
?>
<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<a href="./table1_gestion.php">retour au tableau de bord</a> 	
<hr> <h1>gestion de nos albums</h1> <hr>

<?php
// recupérer dans l'url l'id de l'album à supprimer
$pl_id=$_GET['num'];
//echo '<td><a href="table1_delete.php?num='.$value['bd_id'].'">Supprimer</a></td>'."\n";
deletePlante($pl_id,$co);
echo '<h2>vous venez de supprimer la plante numéro '.$pl_id.'</h2>';
?>

</body>
</html>