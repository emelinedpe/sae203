<?php
  // LIBRAIRIE "lib_crud.inc.php"
  // 2022 - BUT MMI - IUT Troyes - URCA
  // JL

  // insertion des dépendances
  require 'secretxyz123.inc.php';

  // connexion à la base de données
  function connexionBD()
  {
    // on initialise la variable de connexion à null
    $mabd = null;
    try {
      // on essaie de se connecter
      // le port et le dbname ci-dessous sont À ADAPTER à vos données
      $mabd = new PDO('mysql:host=127.0.0.1;port=3306;
                dbname=sae203;charset=UTF8;', 
                LUTILISATEUR, LEMOTDEPASSE);
      // on passe le codage en utf-8
      $mabd->query('SET NAMES utf8;');
    } catch (PDOException $e) {
      // s'il y a une erreur, on l'affiche
      echo '<p>Erreur : ' . $e->getMessage() . '</p>';
      die();
    }
    // on retourne la variable de connexion
    return $mabd;
  }

  // déconnexion de la base de données
  function deconnexionBD(&$mabd) {
    // on se déconnexte en mettant la variable de connexion à null 
    $mabd=null;
  }
  // affichage du catalogue des BDs
  function afficherCatalogue($mabd) {
    $req = "SELECT * FROM plantes 
            INNER JOIN lieux
            ON plantes.lieux_id = lieux.lieux_id";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }

}

// affichage de la liste des plantes pour la gestion
function afficherListe($mabd) {
    $req = "SELECT * FROM plantes
            INNER JOIN lieux 
            ON plantes.lieux_id = lieux.lieux_id";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    echo '<a href="admin.php"><input type="button" value="Retour"></a>';
    echo '<a href="table1_new_form.php"><input type="button" value="Ajouter une plante"></a>';
    echo '<table>'."\n";
    echo '<thead><tr><th>Photo</th><th>nom</th><th>la taille</th><th>propriété</th><th>lieu</th><th>modifier</th><th>Supprimer</th></tr></thead>'."\n";
    echo '<tbody>'."\n";
    foreach ($resultat as $value) {
        echo '<tr>'."\n";
        echo '<td><img class="photo" style="width:200px" src="../'.$value['pl_photo'].'" alt="image_'.$value['pl_id'].'" /></td>'."\n";
        echo '<td>'.$value['pl_nom'].'</td>'."\n";
        echo '<td>'.$value['pl_taille'].'</td>'."\n";
        echo '<td>'.$value['pl_propriete'].'</td>'."\n";
        echo '<td>'.$value['lieux_nom'].'</td>'."\n";
        echo '<td><a href="table1_update_form.php?num='.$value['pl_id'].'">Modifier</a></td>'."\n";
        echo '<td><a href="table1_delete.php?num='.$value['pl_id'].'">Supprimer</a></td>'."\n";
        echo '</tr>'."\n";
    }
    echo '</tbody>'."\n";
    echo '</table>'."\n";
}

// affichage de la liste des plantes pour la gestion
function afficherLieux($mabd) {
  $req = "SELECT * FROM lieux";
  try {
      $resultat = $mabd->query($req);
  } catch (PDOException $e) {
      // s'il y a une erreur, on l'affiche
      echo '<p>Erreur : ' . $e->getMessage() . '</p>';
      die();
  }
  echo '<a href="admin.php"><input type="button" value="Retour"></a>';
  echo '<a href="table2_new_form.php"><input type="button" value="Ajouter un lieu"></a>';
  echo '<table>'."\n";
  echo '<thead><tr><th>nom</th><th>climat</th><th>type(s)</th><th>modifier</th><th>Supprimer</th></tr></thead>'."\n";
  echo '<tbody>'."\n";
  foreach ($resultat as $value) {
      echo '<tr>'."\n";
      echo '<td>'.$value['lieux_nom'].'</td>'."\n";
      echo '<td>'.$value['lieux_climat'].'</td>'."\n";
      echo '<td>'.$value['lieux_type'].'</td>'."\n";
      echo '<td><a href="table2_update_form.php?num='.$value['lieux_id'].'">Modifier</a></td>'."\n";
      echo '<td><a href="table2_delete.php?num='.$value['lieux_id'].'">Supprimer</a></td>'."\n";
      echo '</tr>'."\n";
  }
  echo '</tbody>'."\n";
  echo '</table>'."\n";
}


//Supprime une plante en BDD en fonction d'un id passé en paramètre.
function deletePlante($planteId,$mabd){
  $req = 'DELETE FROM `plantes` WHERE pl_id = '.$planteId.';'; 
  $resultat = $mabd->query($req);
}

//Supprime une plante en BDD en fonction d'un id passé en paramètre.
function deleteLieu($lieuId,$mabd){
  $req = 'DELETE FROM `lieux` WHERE lieux_id = '.$lieuId.';'; 
  $resultat = $mabd->query($req);
}

// Insertion des données en bases
function insertionPlantes($nom,$nom2,$taille,$vie,$nourriture,$propriete,$pays,$images,$mabd) {
  $req = "INSERT INTO plantes (pl_nom, pl_nom2,pl_taille,pl_vie,pl_nour,pl_propriete,lieux_id,pl_photo) 
  VALUES ('$nom', '$nom2', $taille, '$vie','$nourriture','$propriete',$pays,'$images')";
  try {
      $resultat = $mabd->query($req);
  } catch (PDOException $e) {
      // s'il y a une erreur, on l'affiche
      echo '<p>Erreur : ' . $e->getMessage() . '</p>';
      die();
  }

}

// Insertion des données en bases
function insertionLieu($nom,$climat,$type,$mabd) {
  $req = "INSERT INTO lieux (lieux_nom, lieux_climat,lieux_type) VALUES ('$nom', '$climat', '$type');";
  try {
      $resultat = $mabd->query($req);
  } catch (PDOException $e) {
      // s'il y a une erreur, on l'affiche
      echo '<p>Erreur : ' . $e->getMessage() . '</p>';
      die();
  }

}

// mise a jour des données en bases
function UpdatePlantes($nom,$nom2,$taille,$vie,$nourriture,$propriete,$pays,$images,$id_plante,$mabd) {
  $req = "UPDATE plantes
  SET pl_nom = '$nom',
    pl_nom2 = '$nom2',
    pl_taille = $taille,
    pl_vie = '$vie',
    pl_nour ='$nourriture',
    pl_propriete = '$propriete',
    lieux_id = $pays,
    pl_photo = '$images'
  WHERE pl_id = $id_plante ;";
  try {
      $resultat = $mabd->query($req);
  } catch (PDOException $e) {
      // s'il y a une erreur, on l'affiche
      echo '<p>Erreur : ' . $e->getMessage() . '</p>';
      die();
  }
}

// mise a jour des données en bases
function UpdateLieux($nom,$clim,$type,$idLieu,$mabd) {
  $req = "UPDATE lieux
  SET lieux_nom = '$nom',
  lieux_climat = '$clim',
    lieux_type = '$type'
  WHERE lieux_id = $idLieu ;";
  try {
      $resultat = $mabd->query($req);
  } catch (PDOException $e) {
      // s'il y a une erreur, on l'affiche
      echo '<p>Erreur : ' . $e->getMessage() . '</p>';
      die();
  }
}
//Récupère les informations d'une plante en fonction d'un ID passé en paramètre
function getPlante($mabd, $idPlante){
  $req = "SELECT * FROM plantes INNER JOIN lieux ON plantes.lieux_id = lieux.lieux_id WHERE pl_id = $idPlante;";

  try {
    $resPlante = $mabd->query($req);
  } 
  catch (PDOException $e) {
    // s'il y a une erreur, on l'affiche
    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
    die();
  }
  return $resPlante;
}

//Récupère les informations d'un lieu en fonction d'un ID passé en paramètre
function getLieu($mabd, $idLieu){
  $req = "SELECT * FROM lieux WHERE lieux_id = $idLieu;";

  try {
    $resLieu = $mabd->query($req);
  } 
  catch (PDOException $e) {
    // s'il y a une erreur, on l'affiche
    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
    die();
  }
  return $resLieu;
}

//Récupère la liste des lieux
function getListeLieux($mabd){
  $req="SELECT lieux_id, lieux_nom FROM lieux;";
  try {
    $resLieux = $mabd->query($req);
  } catch (PDOException $e) {
    // s'il y a une erreur, on l'affiche
    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
    die();
  }
  return $resLieux;
}
