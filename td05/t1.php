<?php
    if ( (empty($_POST['email'])) || (empty($_POST['mdp'])) ){
        header('Location: form1.php');
    }
 $emailFiltre=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    echo'<p>E-mail nettoyé : '.$emailFiltre.'</p>'."\n";
    if (filter_var($emailFiltre, FILTER_VALIDATE_EMAIL)) {
        echo '<p>E_mail valide ! </p>'."\n";
        echo '<p>Votre e-mail est : ';
        echo htmlentities($emailFiltre, ENT_QUOTES, "UTF-8").'</p>'."\n";
        } else {
        echo '<p>ERREUR : E_mail invalide !</p>'."\n";
    }
   /* echo '<p>'.$_POST['email'].'</p>'."\n";
    echo '<p>'.$_POST['mdp'].'</p>'."\n";*/