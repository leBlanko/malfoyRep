<?php
//On se connecte a la bdd en precisant son nom
mysql_connect('localhost', 'root', 'root');
mysql_select_db('blog');
mysql_query("SET NAMES 'utf8'");
?>