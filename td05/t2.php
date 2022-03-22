<?php
    if ( (empty($_POST['prenom'])) || (empty($_POST['age'])) ) {
        header('Location: form2.php');
    }
    $prenomFiltre=filter_var($_POST['prenom'],FILTER_SANITIZE_STRING);
    echo '<p>Prénom nettoyé : '.$prenomFiltre.'</p>'."\n";
    echo '<p>Votre prénom est : ';
    echo htmlentities($prenomFiltre, ENT_QUOTES, "UTF-8").'</p>'."\n";
    if $sageFiltre=filter_var($_POST['age'],FILTER_SANITIZE_NUMBER_INT)) {   
    if($sagePropre=filter_var($sageFiltre,FILTER_VALIDATE_INT)) {
    echo '<p>Votre âge : '.htmlentities($sagePropre,ENT_QUOTES, "UTF-8")'</p>'."\n";
    }
        
    /*echo '<p>Votre prénom : '.$_POST['prenom'].'</p>'."\n";
    echo '<p>Votre âge : '.$_POST['age'].'</p>'."\n";*/