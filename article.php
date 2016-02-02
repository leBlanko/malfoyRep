<?php
ob_start();
include "include/connexion.inc.php";?>
<?php 
include "include/header.inc.php";
include "include/verif_util.inc.php";

//Forme ternaire: $var = condition ? sivrai: sifaux
// extract ($data) equivaut a >> $foo=$data['foo'] pour chaque clef
if ($connecte) {
    if (isset($_POST['titre']) && isset($_POST['contenu'])) {
        //On peut enlever dans php.ini les erreur pour le site en production

        //On verifie les entrees
        if (isset($_POST['titre']))
        {
            $titre = $_POST['titre'];
        }
        else
        {
            $titre = "";
        }

        if (isset($_POST['contenu']))
        {
            $contenu = $_POST['contenu'];
        }
        else
        {
            $contenu = "";
        }
        if (isset($_POST['id']))
        {
            $id = $_POST['id'];
        }

        //eviter les hacks
        $titre   = mysql_real_escape_string($titre);
        $contenu = mysql_real_escape_string($contenu);

        if (isset($_POST['id']))
        {
            //On met a jour l article
            $sql = 'UPDATE articles SET titre="' . $titre . '",contenu="' . $contenu . '",date=UNIX_TIMESTAMP() WHERE id=' . $id . '';
            mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
            $cheminImage = $_FILES['image']['tmp_name'];
            move_uploaded_file($cheminImage, dirname(__FILE__) . '/data/img/' . $id . '.jpg');
        }
        else
        {
            $sql = 'INSERT INTO articles VALUES ("","' . $titre . '","' . $contenu . '",UNIX_TIMESTAMP())';
            mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
            //gere l image
            $idArticle   = mysql_insert_id();
            $cheminImage = $_FILES['image']['tmp_name'];
            move_uploaded_file($cheminImage, dirname(__FILE__) . '/data/img/' . $idArticle . '.jpg');
        }
        mysql_close();
        header('location: ./index.php');
    }
    else
    {
        if (isset($_GET['id']))
        {
            $id = (int) $_GET['id']; //on transforme en int pour eviter les injection php
            // On peut aussi use mysql_real_escape_string($id);

            $sql  = 'SELECT * FROM articles WHERE id=' . $id . '';
            $res  = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br />' . mysql_error());
            $data = mysql_fetch_array($res);

            $tit  = $data['titre'];
            $cont = $data['contenu'];
        }
        ?>
		<FORM Method="POST" Action="article.php" enctype="multipart/form-data">

			<div class="clearfix">
				<label for="titre">Titre: </label>
				<div class="input">
					<INPUT type=text name=titre value="<?php if (isset($tit)) { echo $tit; } ?>" >
				</div>
			</div>

			<div class="clearfix">
				<label for="texte">Texte: </label>
				<div class="input">
					<textarea name="contenu" id="contenu" rows="10" cols="20"><?php if (isset($cont)) { echo $cont; } ?></textarea>
				</div>
			</div>

			<div class="clearfix">
				<input type="file" name="image">
				<!-- attention dans php.ini: upload_max_filesize est egal a 2 Mega, il faudra l augmenter si on est au dessus -->
			</div>


			<?php
            if (isset($_GET['id']))
            {
                ?>
				<input type="hidden" name="id" value="<?php if (isset($id)) {echo $id; } ?>">
				<?php
            }
            ?>

			<?php
            if (isset($id)) //Le Bouton change si on est en update ou en creation
                {
                    ?>
				    <INPUT type=submit class="btn btn-primary" value=Modifier>
				    <?php
                }
            else
                {
                    ?>
				    <INPUT type=submit class="btn btn-primary" value=Envoyer>
				    <?php
                }
                ?>
		</FORM>

<?php
}
}
else
{
    echo "<h3>Vous devez être connecté</h3>";
}

include "include/footer.inc.php";
ob_end_flush();
?>
