<?php
//on remove le cookie
setcookie('sid',null);
header('location: ./index.php');
?>