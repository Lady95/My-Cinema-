<?php
   include('mysql.php'); ?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8"/>
      <title>Listes des clients</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css"/>
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
         <main>
            <div>
               <h3>Listes des clients</h3>
               <table>
                  <thead>
                     <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Type d'abonnement</th>
                        <th>Modifier l'abonnement</th>
                        <th>Supprimer l'abonnement</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($clients as $val) :?>
                     <tr>
                        <td><?php echo $val['id_fiche_perso']; ?></td>
                        <td><?php echo $val['nom']; ?></td>
                        <td><?php echo $val['prenom'];?></td>
                        <td><?php print $val['abo']; ?></td>
                              <td><form action="listes_clients.php" method="get">
                              <select name="idabo" id="idabo" >
                                    <option value=" " selected disabled>veuillez sélectionner</option>
                                    <?php foreach($abo as $elem) {
                                          echo "<option value=" . $elem['id_abo'].">" .$elem['nom']."</option>";
                                          }?>
                                    </select>
                                    <?php echo "<input type='hidden' id='idmembre' name='idmembre' value=". $val['id_fiche_perso'].">";?>
                                    <input type="submit" value="modifier">
                              </td>
                              <td><button name="suppabo" id="suppabo">suppimer</button></td>
                        </form>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </main>
      </div>
   </body>
</html>
