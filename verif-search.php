<?php
require_once 'mysql.php';

if (isset($_GET['button_search']) AND $_GET['button_search'] == "recherche"){
    $_GET['terme'] = htmlspecialchars($_GET['terme']);
    $terme = $_GET['terme']; 
    $terme = trim($terme); 
    $terme = strip_tags($terme); 
}
if (isset($terme) && !empty($terme)){
    $terme = strtolower($terme);

    $req = "SELECT fiche_personne.nom, fiche_personne.prenom, membre.id_fiche_perso, abonnement.nom AS abo 
    FROM fiche_personne 
    INNER JOIN membre ON membre.id_fiche_perso = fiche_personne.id_perso  
    INNER JOIN abonnement on abonnement.id_abo = membre.id_abo WHERE fiche_personne.nom LIKE '%{$_GET['terme']}%'
    OR fiche_personne.prenom LIKE '%{$_GET['terme']}%'"; 

    $select_term = $connexion->prepare($req);
    $select_term->execute(array("%".$terme."%", "%".$terme."%"));
}
?>

<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8" />
  <title>Les résultats de recherche</title>
  <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
 </head>
 <body>
 <header>
    <h1>My cinema</h1>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="ajoutclient.php">Ajouter un client</a></li>
            <li><a href="listes_clients.php">Listes des clients</a></li>
            <li><a href="listes_clientshisto.php">Listes de l'historique des clients</a></li>

        </ul>
    </nav>
    </header>
 <p><a href="index.php">Retour à l'accueil</a></p>
     <div>
         <?php while($term_find = $select_term->fetch()) {
             echo "<div>
             <h2> Prénom : ".$term_find['prenom']."</h2><h2> Nom : ".$term_find['nom']."</h2>
             <p> type d'abonnement : " .$term_find['abo']."</p>
            <div>"; } ?>
    </div>
 </body>
</html>