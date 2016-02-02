<?php
$connecte   = false;
$email_util = "";
$email      = "";

if (isset($_COOKIE['sid']) && !empty($_COOKIE['sid']))
{
    $sql  = 'SELECT * FROM utilisateurs WHERE sid="' . $_COOKIE['sid'] . '"';
    $d    = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
    $data = mysql_fetch_array($d);
    //On verifie que des lignes ont ete renvoye
    $nbLignes = mysql_num_rows($d);
    if (0 != $nbLignes)
    {
        $email      = $data['email'];
        $connecte   = true;
        $email_util = $email;
        ob_start();
    }

}
?>
