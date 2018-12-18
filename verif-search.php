<?php
require_once 'mysql.php';
if (isset($_GET['button_search']) AND $_GET['button_search'] == "recherche")
{
    $_GET['terme'] = htmlspecialchars($_GET['terme']);
    $terme = $_GET['terme']; 
    $terme = trim($terme); 
    $terme = strip_tags($terme); 
}
if (isset($terme) && !empty($terme))
{
    $terme = strtolower($terme);
    $select_term = $connexion->prepare("SELECT fiche_personne.nom AS nom, fiche_personne.prenom AS prenom,
    abonnement.nom AS abo
    FROM membre, fiche_personne, abonnement
    WHERE membre.id_fiche_perso = fiche_personne.id_perso
    AND membre.id_abo = abonnement.id_abo 
    AND fiche_personne.nom LIKE ? 
    OR fiche_personne.prenom LIKE ?");
    $select_term->execute(array("%".$terme."%", "%".$terme."%"));
}
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset = "utf-8" >
  <title>Les résultats de recherche</title>
 </head>
 <body>
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