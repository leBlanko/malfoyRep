<?php

//valeur a modifier si on veux changer la taille de l image affichee
$widthCourant=200;

//on recupere l'id ainsi que le chemin
$id= $_GET['id'];
$chemin=dirname(__FILE__).'/data/img/'.$id.'.jpg';

//creer une nouvelle image a partir de celle choisie
$ImageChoisie=imagecreatefromjpeg($chemin);

//Calcul du ratio
list($width,$height)= getimagesize($chemin);
$ratio=$widthCourant/$width;

$heightCourant=$height*$ratio;
//On a maintenant la hauteur voulue, calculée avec le ratio

//creer avec les vrai couleurs
$newImage=imagecreatetruecolor($widthCourant,$heightCourant) or die ("Erreur");

//On peut preparer l image pour l affichage
imagecopyresampled($newImage,$ImageChoisie,0,0,0,0,$widthCourant,$heightCourant,$width,$height);
imagejpeg($newImage,null,100);
?>