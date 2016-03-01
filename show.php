<?php
    include('includes/connexion.inc.php');
    include('includes/header.inc.php');
    include('includes/verif_util.inc.php');

    //On recupere l'id en GET
    $id = $_GET['id'];
    //On l'utilise pour recuperer l'article correspondant
    $res = mysql_query("SELECT * FROM articles WHERE id = '".$id."'");
    while($data = mysql_fetch_array($res))
    {
    	//On va recuperer l'id
        $id = $data['id'];
        //On affiche le titre
        echo '<h3>'.$data['titre'].'</h3>';
        //On recupere le chemin de l'image
        $imageFile = dirname(__FILE__).'/assets/images/'.$id.'.jpg';
        if(file_exists($imageFile))
        {
        	//Si l'image existe, on affiche celle ci
            echo "<img style='margin-right:10px;' id='image' src='vignette.jpg.php?id=$id' class='img-rounded pull-left'>";
        }
        //On affiche le corps de l'article ainsi que la date
        echo '<p>'.nl2br(htmlspecialchars($data['contenu'])).'</p>';
        echo '<p>'.gmdate('d M Y H:i', $data['date']).'</p>';

		//On va verifier que l'utilisateur est bien connecte
        if($connect == true)
        { 	?>
            <a href="article.php?id=<?php echo $id ?>" class="btn btn-primary" value="<?php echo $id ?>">Modifier</a>
            <a href="supprimer_article.php?id=<?php echo $id ?>" class="btn btn-primary" value="<?php echo $id ?>">Supprimer</a>
        	<?php
        }
        //Un peu de rendu
        echo '<div style="clear:both;"></div>';
        echo '<HR>';
    }
    include('includes/footer.inc.php');
?>