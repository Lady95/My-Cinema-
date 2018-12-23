<?php
   include('mysql.php'); 
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Page Title</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
      <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
      <script src="main.js"></script>
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
         <form method="get" action="recherchefilms.php">
            <h3>Recherche film</h3>
            <input type="search" name='search_film' placeholder="Recherche">
            <label for="genre">Genres</label>
            <select name="genre" id="genre">
               <option value="" selected>veuillez sélectionner</option>
               <?php foreach($genres as $genre): ?>
               <option value="<?=$genre['id_genre']?>"><?= $genre['nom']?></option>
               <?php endforeach;?>
            </select>
            <label for="distrib">Distributeur</label>
            <select name="distrib" id="distrib">
               <option value="" selected>veuillez sélectionner</option>
               <?php foreach($distribs as $distrib): ?>
               <option value="<?=$distrib['id_distrib']?>"><?= $distrib['nom']?></option>
               <?php endforeach;?>
            </select>
            <input type="submit" name="valider" value="Entrer">
         </form>
         <table border=1>
            <thead>
               <tr>
                  <th>Titre</th>
                  <th>Resumé</th>
                  <th>Genre</th>
                  <th>Distributeur</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach($films as $film): ?>
               <tr>
                  <td><?= $film['titre']?></td>
                  <td><?= $film['resum']?></td>
                  <td><?= $film['nom']?></td>
                  <td><?= $film['distributeur']?></td>
               </tr>
               <?php endforeach;?>
            </tbody>
         </table>
      </div>
   </body>
</html>
