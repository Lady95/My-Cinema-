<?php
$serveur = "localhost"; 
$login = "root"; 
$pass = "root"; 
try{
    $connexion = new PDO("mysql:host=$serveur;dbname=epitech_tp", $login, $pass);
}
catch(Exception $e){
    die('Erreur :'.$e->getMessage()); 
}

$rep = $connexion->query('SELECT nom FROM fiche_personne'); 

while ($donnees = $rep->fetch())
{

    echo $donnees['nom'].'<br>';
}

?>