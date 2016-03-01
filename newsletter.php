<?php
include("include/connexion.inc.php");
include ("include/verif_util.inc.php");

if(isset($_POST['newsletterEmail']))
{
	$email = mysql_real_escape_string($_POST['newsletterEmail']); //On recupère la variable POST

	if(preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
	{
	     //On peut inscrire l'utilisateur 
	     $sql = 'INSERT INTO newsletter VALUES ("","' . $email . '")';
	     mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
	     echo "<h4>Inscrit a la newsletter</h4>";
	}
	else
	{
		//On previent l'utilisateur que l'email est incorrect;
		echo "<h4>Le format d'email n'est pas valide</h4>";
	}

}
else
{
	$newsletter="";
}


?>