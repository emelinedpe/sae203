<?php
require('header.php');
?>

<h1 id="SearchH1">Recherches de plantes</h1>
<h2 id="SearchH2">Sur cette page, vous pourrez Rechercher toutes vos plantes préférés et ainsi obtenir des informations sur celles-ci.</h2>
<form METHOD="GET" action="reponse_recherche.php" id="formSearch" data-parsley-required>
    <div class="input-container">
    <input type="search"  name="inp_search">
		<label>Rechercher une plante</label>		
	</div>
    <a class="button" id="aSub"><input id="submitBtn" type="submit" name="envoyer"></a>
    
</form>

<?php
require('footer.php');
?>
