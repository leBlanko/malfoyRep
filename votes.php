<?php
include("include/connexion.inc.php");
include ("include/verif_util.inc.php");

	$nb = mysql_real_escape_string($_POST['nb']); //On recupère la variable POST
	//$id= mysql_real_escape_string($_POST['id']);
	$id=3;

	$sql = 'UPDATE articles SET votes=' . $nb . '+1 WHERE id='.$id.'';
            mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

?>