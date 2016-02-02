<?php
ob_start();
include "include/connexion.inc.php";
include "include/header.inc.php";
include "include/verif_util.inc.php";

if ($connecte)
{
    if (isset($_GET['id']))
    {
        $id = (int) $_GET['id']; //on transforme en int pour eviter les injection php
        // On peut aussi use mysql_real_escape_string($id);
        //On prepare la requete en utilisant l id
        $sql = 'DELETE FROM articles WHERE id=' . $id . '';
        $res = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
        unlink(dirname(__FILE__).'/data/img/'.$id.'.jpg');
        header('location: ./index.php');
    }
}
else
{
    echo "<h3>Vous devez etre connecte</h3>";
}

include "include/footer.inc.php";
ob_end_flush();
?>
