<?php
include("include/connexion.inc.php");
include ("include/header.inc.php");
include ("include/verif_util.inc.php");

//On selectionne tous les articles
$res=mysql_query("SELECT * FROM articles");
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
