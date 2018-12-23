<?php
require_once 'mysql.php';
if (isset($_GET['button_search']) AND $_GET['button_search'] == "recherche"){
    $_GET['terme'] = htmlspecialchars($_GET['terme']);
    $terme = $_GET['terme']; 
    $terme = trim($terme); 
    $terme = strip_tags($terme); 
}
$req = "SELECT fiche_personne.nom, fiche_personne.prenom, membre.id_fiche_perso, abonnement.nom AS abo 
    FROM fiche_personne 
    INNER JOIN membre ON membre.id_fiche_perso = fiche_personne.id_perso  
    INNER JOIN abonnement on abonnement.id_abo = membre.id_abo"; 
if (isset($terme) && !empty($terme)){
    $terme = strtolower($terme);
    $req = "SELECT fiche_personne.nom, fiche_personne.prenom, membre.id_fiche_perso, abonnement.nom AS abo 
    FROM fiche_personne 
    INNER JOIN membre ON membre.id_fiche_perso = fiche_personne.id_perso  
    INNER JOIN abonnement on abonnement.id_abo = membre.id_abo where CONCAT(fiche_personne.nom,' ',fiche_personne.prenom) LIKE '%{$_GET['terme']}%'
    OR CONCAT(fiche_personne.prenom,' ',fiche_personne.nom) LIKE '%{$_GET['terme']}%'" ; 
}
$select_term = $connexion->prepare($req);
$select_term->execute();
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
         <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="index.php">
            <img src="img/popcorn.png" alt="logo_popcorn">
            <span class="navbar-brand mb-0 h1">My Cinéma</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
               <div class="navbar-nav">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item active"><a class="nav-link" href="index.php">Accueil</a></li>
                     <li class="nav-item"><a class="nav-link" href="ajoutclient.php">Ajouter un client</a></li>
                     <li class="nav-item"><a class="nav-link" href="listes_clients.php">Listes des clients</a></li>
                     <li class="nav-item"><a class="nav-link" href="listes_clientshisto.php">Listes de l'historique des clients</a></li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>
      <div class="container-fluid" style="margin-top:100px">
         <p><a href="index.php">Retour à l'accueil</a></p>
         <div>
            <table>
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Nom</th>
                     <th>Prénom</th>
                     <th>Type d'abonnement</th>
                  </tr>
               </thead>
               <tbody>
                  <?php while($term_find = $select_term->fetch()) { ?>
                  <tr>
                     <td><?php echo $term_find['id_fiche_perso'];?></td>
                     <td><?php echo $term_find['nom'];?></td>
                     <td><?php echo $term_find['prenom'];?></td>
                     <td><?php echo $term_find['abo'];?></td>
                  </tr>
                  <?php }?>
               </tbody>
            </table>
         </div>
      </div>
   </body>
</html>
