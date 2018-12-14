
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
function getgenre($connexion) 
{
    $sql = 'SELECT id_genre, nom FROM genre'; 
    $s = $connexion->prepare($sql); 
    $s->execute(); 
    $genres = $s->fetchAll(PDO::FETCH_ASSOC); 
    return $genres; 
}
$genres = getgenre($connexion); 
////////////////get distrib ///////////////
function getdistrib($connexion) 
{
    $sql = 'SELECT id_distrib, nom FROM distrib'; 
    $s = $connexion->prepare($sql); 
    $s->execute(); 
    $distribs = $s->fetchAll(PDO::FETCH_ASSOC); 
    return $distribs; 
}
$distribs = getdistrib($connexion);
//////////////get film ////////////////
function getfilm($connexion) 
{
    $sql = 'SELECT film.titre, genre.nom, distrib.nom AS distributeur FROM film 
    INNER JOIN genre ON genre.id_genre=film.id_genre 
    INNER JOIN distrib ON distrib.id_distrib = film.id_distrib
    WHERE 1 '; 
    if (isset($_GET['search_film']) AND !empty($_GET['search_film'])) {
        $sql .= "AND film.titre LIKE '%{$_GET['search_film']}%'";
    }
    elseif (isset($_GET['genre']) AND !empty($_GET['genre'])) {
        $sql .= "AND genre.id_genre = '{$_GET['genre']}' ";
    }
    elseif (isset($_GET['distrib']) AND !empty($_GET['distrib'])) {
        $sql .= "AND distrib.id_distrib LIKE '%{$_GET['distrib']}' ";
    }
    //echo $sql;
    $s = $connexion->prepare($sql); 
    $s->execute(); 
    $films = $s->fetchAll(PDO::FETCH_ASSOC); 
    return $films; 
}
$films = getfilm($connexion); 
?>