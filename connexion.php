<?php
ob_start();
include "include/connexion.inc.php";
include "include/header.inc.php";
include "include/verif_util.inc.php";

if (!$connecte) {
    //code de connexion
    //on check les donnees
    if (isset($_POST['email']))
    {
        $email = mysql_real_escape_string($_POST['email']);

        if (isset($_POST['password']))
        {
            $mdp = mysql_real_escape_string($_POST['password']);
        }
        else
        {
            $mdp = "";
        }
        //On va verifier si les informations tapees sont correctes
        $sql      = 'SELECT * FROM utilisateurs WHERE email="' . $email . '" AND mdp="' . md5($mdp) . '"'; //MD5 pour crypter le mot de passe.
        $data     = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
        $nbLignes = mysql_num_rows($data);

        if (0 != $nbLignes)
        {
            //On genere l identifiant de session, nouveau a chaque fois grace au time()
            $sid  = md5($email . time()); 
            $sql2 = 'UPDATE  utilisateurs SET sid="' . $sid . '"';
            mysql_query($sql2) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());

            setcookie('sid', $sid, time() + 600);
            header('location: ./index.php');
        }
        else
        {
            //Message informant l utilisateur
            echo "<h3>Mot de passe incorrect</h3>";
        }
        mysql_close();
    }
    ?>

<FORM Method="POST" Action="">

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

		<INPUT type="submit" class="btn btn-primary" value="Envoyer">

</FORM>

<?php
}
else
{
    echo "<h3>Vous êtes déjà connecté</h3>";
}
include "include/footer.inc.php";
ob_end_flush();
?>
