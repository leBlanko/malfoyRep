<?php
include("include/connexion.inc.php");
include ("include/verif_util.inc.php");

if(isset($_POST['newsletterEmail']))
{
	$email = mysql_real_escape_string($_POST['newsletterEmail']); //On recupère la variable POST

	//On verifie le format de l'email
	if(preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
	{
		//On va maintenant verifier que l'email n'est pas deja present dans la BDD
		$sql= 'SELECT * FROM newsletter WHERE email="' . $email . '"';
		$data     = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
	    $nbLignes = mysql_num_rows($data);

	    if($nbLignes != 0)
	    {
	    	//Un user a deja cet email
	    	echo "Vous êtes déjà abonné";
	    }
	    else
	    {
	    	//On peut inscrire l'utilisateur
	     	$sql = 'INSERT INTO newsletter VALUES ("","' . $email . '")';
	    	mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
	     	echo "Inscrit à la newsletter";
	    }

	}
	else
	{
		//On previent l'utilisateur que l'email est incorrect;
		echo "Le format d'email n'est pas valide";
	}

}
else
{
	$newsletter="";
}


?>