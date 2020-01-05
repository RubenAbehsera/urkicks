<?php
// Connexion au serveur MySQL

$host= "localhost";
$user = "rabehsera";//root ou sur serveur rabehsera
$password = "s6Cc4LQ72z"; // root Sur MAC ou rien sur Windows  s6Cc4LQ72z
$bdd = "rabehsera"; //rabehsera

$lien = mysqli_connect($host,$user,$password,$bdd);
mysqli_query($lien,"set names utf8"); //pour récupérer les infos en UTF8
?>
