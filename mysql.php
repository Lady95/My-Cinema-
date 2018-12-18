<?php
$serveur = "localhost"; 
$login = "root"; 
$pass = "root"; 
try{
    $connexion = new PDO("mysql:host=$serveur;dbname=epitech_tp", $login, $pass);
    // afficher une erreur et bloquer le code
    //$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
    die('Erreur :'.$e->getMessage()); 
}
/////////// get genre //////////////////
function film_genre($connexion) 
{
    $req = 'SELECT id_genre, nom FROM genre ORDER BY nom'; 
    $s = $connexion->query($req); 
    $genres = $s->fetchAll(PDO::FETCH_ASSOC); 
    return $genres; 
}
$genres = film_genre($connexion); 
////////////////get distrib ///////////////
function distributeur($connexion) 
{
    $req = 'SELECT id_distrib, nom FROM distrib ORDER BY nom'; 
    $s = $connexion->query($req); 
    $distribs = $s->fetchAll(PDO::FETCH_ASSOC); 
    return $distribs; 
}
$distribs = distributeur($connexion);
//////////////get film ////////////////
function film($connexion) 
{
    $req = 'SELECT film.titre, genre.nom, distrib.nom AS distributeur FROM film 
    LEFT JOIN genre ON genre.id_genre=film.id_genre 
    LEFT JOIN distrib ON distrib.id_distrib = film.id_distrib
    WHERE 1 '; 

    if (isset($_GET['search_film'])) {
        $req .= "  AND film.titre LIKE '%{$_GET['search_film']}%' ";
    }
    
    if (isset($_GET['genre']) AND !empty($_GET['genre'])) {
        $req .= " AND genre.id_genre = '{$_GET['genre']}' ";
    }
    
    if (isset($_GET['distrib']) AND !empty($_GET['distrib'])) {
        $req .= "  AND distrib.id_distrib ='{$_GET['distrib']}' ";
    }
    //echo $req;
    $s = $connexion->prepare($req); 
    $s->execute(); 
    $films = $s->fetchAll(PDO::FETCH_ASSOC); 
    return $films; 
}
$films = film($connexion); 

function listeClients($connexion) {
    $req = 'SELECT fiche_personne.nom, fiche_personne.prenom, membre.id_fiche_perso, abonnement.nom AS abo 
    FROM fiche_personne 
    INNER JOIN membre ON membre.id_fiche_perso = fiche_personne.id_perso  
    INNER JOIN abonnement on abonnement.id_abo = membre.id_abo 
    ORDER BY membre.id_fiche_perso '; 
    $s = $connexion->query($req); 
    $clients = $s->fetchAll(PDO::FETCH_ASSOC);
    return $clients; 
}
$clients = listeClients($connexion);

function abonnement($connexion) {
    $req = 'SELECT id_abo, nom FROM abonnement'; 
    $s = $connexion->query($req); 
    $abo = $s->fetchAll(); 
    return $abo; 

}
$abo = abonnement($connexion);
function modifClient($connexion) {

}
?>