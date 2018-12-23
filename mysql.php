<?php
$serveur = "localhost"; 
$login = "root"; 
$pass = "root"; 
try{
    $connexion = new PDO("mysql:host=$serveur;dbname=epitech_tp", $login, $pass);
    // afficher une erreur et bloquer le code
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
    $req = 'SELECT film.titre, genre.nom, film.resum, distrib.nom AS distributeur FROM film 
    LEFT JOIN genre ON genre.id_genre=film.id_genre 
    LEFT JOIN distrib ON distrib.id_distrib = film.id_distrib
    WHERE 1 '; 
    
    if (isset($_GET['search_film']) AND !empty($_GET['search_film'])) {
        $req .= "  AND film.titre LIKE '%{$_GET['search_film']}%'";
    }
    if (isset($_GET['genre']) AND !empty($_GET['genre'])) {
        $req .= " AND genre.id_genre = '{$_GET['genre']}' ";
    }
    if (isset($_GET['distrib']) AND !empty($_GET['distrib'])) {
        $req .= "  AND distrib.id_distrib = '{$_GET['distrib']}' ";
    }
    //echo $req;
    $s = $connexion->prepare($req); 
    $s->execute(); 
    $films = $s->fetchAll(PDO::FETCH_ASSOC); 
    return $films; 
}
$films = film($connexion); 

function listeClients($connexion) {
    $req = 'SELECT fiche_personne.nom, fiche_personne.prenom, membre.id_fiche_perso,abonnement.id_abo, abonnement.nom AS abo 
    FROM fiche_personne 
    LEFT JOIN membre ON membre.id_fiche_perso = fiche_personne.id_perso  
    LEFT JOIN abonnement on abonnement.id_abo = membre.id_abo 
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

function historiqueClient($connexion)
{
    $req = "SELECT membre.id_fiche_perso, fiche_personne.nom, fiche_personne.prenom, film.titre, historique_membre.date 
    FROM fiche_personne
    INNER JOIN membre ON membre.id_fiche_perso = fiche_personne.id_perso 
    INNER JOIN historique_membre ON historique_membre.id_membre = membre.id_membre
    INNER JOIN film ON film.id_film = historique_membre.id_film";
    
    if (isset($_GET['histomembre']) and !empty($_GET['histomembre'])) {
        $req = "SELECT membre.id_fiche_perso, fiche_personne.nom, fiche_personne.prenom, film.titre, historique_membre.date 
        FROM fiche_personne
        INNER JOIN membre ON membre.id_fiche_perso = fiche_personne.id_perso 
        INNER JOIN historique_membre ON historique_membre.id_membre = membre.id_membre
        INNER JOIN film ON film.id_film = historique_membre.id_film 
        WHERE CONCAT(fiche_personne.nom,' ',fiche_personne.prenom) LIKE '%{$_GET['histomembre']}%'
        OR CONCAT(fiche_personne.prenom,' ',fiche_personne.nom) LIKE '%{$_GET['histomembre']}%'"; 
        
        
    }
    $s = $connexion->prepare($req); 
    $s->execute(); 
    $histoclient = $s->fetchall(PDO::FETCH_ASSOC); 
    return $histoclient;
    print_r($histoclient);
}
$histoclient = historiqueClient($connexion);

function idClientsabo($connexion) {
    
    if (isset($_GET['idabo'])) {
        $req = "UPDATE membre SET id_abo= '{$_GET['idabo']}' WHERE id_fiche_perso= '{$_GET['idmembre']}' ";
        $connexion->quote($req);
        $s = $connexion->prepare($req); 
        $s->execute(); 
        $cliabo = $s->rowCount(); 
        return $cliabo;
    }
}
$cliabo = idClientsabo($connexion); 

function suppabo($connexion) {
    
    if (isset($_GET['suppabo'])){
        $req = "UPDATE membre SET id_abo= NULL  WHERE id_fiche_perso= '{$_GET['idmembre']}' ";
        $connexion->quote($req);
        $s = $connexion->prepare($req); 
        $s->execute(); 
        $suppabo = $s->rowCount(); 
        //echo $req;
        return $suppabo;
    }
}
$suppabo = suppabo($connexion);

?>