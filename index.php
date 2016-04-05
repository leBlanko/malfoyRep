<?php
include("include/connexion.inc.php");
include ("include/header.inc.php");
include ("include/verif_util.inc.php");
include("slider.php");
?>

<?php

if(isset($_POST['search']))
{
	$search = mysql_real_escape_string($_POST['search']); //On recupère la variable POST
	$search = trim($search); //On enleve les espaces avant et après la chaine
 	$keyWords = explode (' ',$search); //On split par les espaces pour recuperer l'ensemble des mots clef
}
else
{
	$search="";
}

if( $search == null)
{
	//On selectionne tous les articles
	$res=mysql_query("SELECT * FROM articles");
}
else
{
	//On recupere les articles de la recherche
	//version 1 de la barre de recherche
	/*
	$res=mysql_query('SELECT * FROM articles WHERE contenu LIKE "%'.$search.'%" ');

	$nbLignes = mysql_num_rows($res);
	if($nbLignes == 0)
	{
		//Aucun article a été trouvé
		echo "<h3>Aucun article correspondant</h3>";
	}
	*/

	//Version améliorée Recherche

	//On va deja recuperer le premier mot clé et voir si il apparait dans le titre ou le contenu de l'article
	$sql='SELECT * FROM articles WHERE titre LIKE "%'.$keyWords[0].'%" OR contenu LIKE "%'.$keyWords[0].'%" ';
	//On parcours maintenant tout le reste du tableau et on l'ajoute a la requete principale
	for ($i=1;$i<count($keyWords);$i++)
	{
      	$sql.='OR titre LIKE "%'.$keyWords[$i].'%" OR contenu LIKE "%'.$keyWords[$i].'%"';
	}
	//Requete complete, on peut executer la requete
	$res=mysql_query($sql);

	$nbLignes = mysql_num_rows($res);
	if($nbLignes == 0)
	{
		//Aucun article a été trouvé
		echo "<h3>Aucun article correspondant</h3>";
	}

}

while($data=mysql_fetch_array($res))
{
	$id=$data['id'];
	echo '<h3>'.htmlspecialchars($data['titre']).'</h3>'.'<br>';
		
	$chemin=dirname(__FILE__).'/data/img/'.$id.'.jpg';
	if(file_exists($chemin))
	{
		//affiche la vignette apres verification
		?>
		<img src="vignette.jpg.php?id=<?php echo $id ?>" class="img-rounded pull-left" style="margin-right:10px;">
			
		<?php
		//positionnement img http://code.makery.ch/library/more-html-css/image-bootstrap/
	}
		
	echo '<p>'.nl2br(htmlspecialchars($data['contenu'])).'</p>';
	//htmlspecialchar pour encoder les differentes chose qui pourrait etre presente en html
	//nl2br qui remplace les br et fait des paragraphes
	echo gmdate('d M Y H:i', $data['date']);

	?>
	<button type='button'>
  		<i class='fa fa-thumbs-up'></i>
  			Like
  			<span id="votes"><?php echo htmlspecialchars($data['votes']); ?></span>
  		<p id="idArticle" style="visibility: hidden;"><?php echo $id; ?></p>
	</button>

	<?php
		
	if($connecte)
	{
		//fonctionnalités seulement présente si l utilisateur s est connecte avec un compte authentifie
		echo '<a href="./article.php?id='.$id.'" class="btn btn-primary" style="margin-left:10px;">Modifier</a>';
		echo '<a href="./supprimer_article.php?id='.$id.'" class="btn btn-primary" style="margin-left:2px;">Supprimer</a>';
	}
	echo '<div style="clear:both;"></div>';
	echo '<hr style=\"height:0;border-bottom: 1px dashed #000\" />';
}
	
include ("include/footer.inc.php");
?>

<script>
	 (function () {
	    $('button').click(function () {
	    	
	    	//window.alert($("#idArticle").text());
	    	sendToVotes();
	        $('#votes').html(function (i, val) {
	            	return val * 1 + 1;
	        });
	    });
	}.call(this));

	  function sendToVotes()
      {
        $.ajax({
          type: "POST",
          url: "votes.php",
          data:
              {
                nb: $("#votes").text(),
              },
        });
      }

</script>
