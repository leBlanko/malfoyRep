<?php
ob_start();
include "include/connexion.inc.php";
include "include/header.inc.php";
include "include/verif_util.inc.php";

if (!$connecte) {
	//On peut alors s inscrire
	if(isset($_POST['email']))
	{
		$email= mysql_real_escape_string($_POST['email']);

		if(isset($_POST['nom']))
		{
			$nom = mysql_real_escape_string($_POST['nom']);
		}
		else
		{
			$nom="";
		}

		if(isset($_POST['prenom']))
		{
			$prenom = mysql_real_escape_string($_POST['prenom']);
		}
		else
		{
			$prenom="";
		}

		if(isset($_POST['password']))
		{
			$mdp = mysql_real_escape_string($_POST['password']);
		}
		else
		{
			$mdp="";
		}

		if(isset($_POST['verifpassword']))
		{
			$verifmdp = mysql_real_escape_string($_POST['verifpassword']);
		}
		else
		{
			$verifmdp="";
		}

		$c=0; //variable qui va detecter les erreurs
		$erreur="";

		// On va verifier que l'email n'est pas déjà utilisé
		$sql= 'SELECT * FROM utilisateurs WHERE email="' . $email . '"';
		$data     = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
	    $nbLignes = mysql_num_rows($data);

	    if($nbLignes != 0)
	    {
	    	//Un user a deja cet email
	    	$erreur="Cet email est déjà utilisé, veuillez en choisir un autre";
	    	$c++; // On incrémente le compteur d'erreur
	    }
	    
	    //Vérification 2 de l'email
	    if(!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
	    {
	        $erreur= "Format email non valide";
	        $c++;
	    }

	    //Vérification du mdp
	    if($mdp != $verifmdp || empty($verifmdp) || empty($mdp))
	    {
	        $erreur = "Erreur sur le mot de passe";
	        $c++;
	    }

	    //Vérification du nom et prénom
	    if(empty($nom) || empty($prenom))
	    {
	    	$erreur= " Veuillez renseigner votre nom et prénom";
	    	$c++;
	    }

	    //Vérifications terminés, on va pouvoir inscrire l'user si il n y a pas eu d erreurs
	    if($c==0)
	    {
	    	//Aucune erreur
	    	$sql = "INSERT INTO utilisateurs (nom,prenom,email,mdp) VALUES ('$nom','$prenom','$email','".md5($mdp) ."')";
	    	$data     = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

	    	//On permet a l user de se connecter directement

	    	$sid  = md5($email . time()); 
	        $sql2 = 'UPDATE  utilisateurs SET sid="' . $sid . '" WHERE email="' . $email . '"';
	        mysql_query($sql2) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

	        setcookie('sid', $sid, time() + 600);
	        header('location: ./index.php');

	    }
	    else
	    {
	    	//On previent l'user qu'une erreur a été détectée
	    	echo $erreur;
	    		
	    }


	}
	else
	{
		$email="";
	}


	

?>
<FORM Method="POST" Action="">

	<div class ="clearfix">
		<label for="nom">Nom: </label>
		<div class="input">
			<INPUT type="nom" name="nom">
		</div>
	</div>

	<div class ="clearfix">
		<label for="nom">Prenom: </label>
		<div class="input">
			<INPUT type="prenom" name="prenom">
		</div>
	</div>

	<div class="clearfix">
		<label for="email">Email: </label>
		<div class="input">
			<INPUT type="email" name="email">
		</div>
	</div>

	<div class="clearfix">
		<label for="password">Mot de passe: </label>
		<div class="input">
			<INPUT type="password" name="password">
		</div>
	</div>

	<div class="clearfix">
		<label for="password">Vérification Mot de passe: </label>
		<div class="input">
			<INPUT type="password" name="verifpassword">
		</div>
	</div>

		<INPUT type="submit" class="btn btn-primary" value="Inscription">

</FORM>

<?php

}
else
{
    echo "<h3>Vous avez déjà un compte utilisateur.</h3>";
}

include "include/footer.inc.php";
ob_end_flush();
?>