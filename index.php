<?php include('mysql.php'); ?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8" />
      <title>Cinema City</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css"/>
      <script src="js/bootstrap.js"></script>
      <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
   </head>
   <body>
        
      <div>
         <header>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
               <a class="navbar-brand" href="index.php">
               <img src="img/popcorn.png" alt="logo_popcorn">
               <span class="navbar-brand mb-0 h1">My Cinéma</span>
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <div class="navbar-nav">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="ajoutclient.php">Ajouter un client</a></li>
                        <li class="nav-item"><a class="nav-link" href="listes_clients.php">Listes des clients</a></li>
                        <li class="nav-item"><a class="nav-link" href="listes_clientshisto.php">Listes de l'historique des clients</a></li>
                     </ul>
                  </div>
               </div>
            </nav>
         </header>

         <div class="container" style="margin-top:100px">
            <form method="get" action="recherchefilms.php">
               <h3>Recherche film</h3>
               <div class="form-group">
                    <input class="form-control" type="search" name='search_film' placeholder="Titre du film" aria-label="Search">
                </div>

               <div class="input-group mb-3">
               <div class="input-group-prepend">
               <label class="input-group-text" for="genre">Genre</label>
               </div>
               <select class="custom-select" name="genre" id="genre">
                  <option value="" selected>Veuillez selectionner</option>
                  <?php foreach($genres as $genre): ?>
                  <option value="<?=$genre['id_genre']?>"><?= $genre['nom']?></option>
                  <?php endforeach;?>
               </select>
               </div>

               <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="distrib">Distributeur</label>
                    </div>
                    <select class="custom-select" name="distrib" id="distrib">
                        <option value="" selected>Veuillez selectionner</option>
                        <?php foreach($distribs as $distrib): ?>
                        <option value="<?=$distrib['id_distrib']?>"><?= $distrib['nom']?></option>
                        <?php endforeach;?>
                    </select>
               </div>
               <button class="btn btn-primary btn-lg btn-block" type="submit" name="valider">Recherche</button>
            </form>
            <br>
            <div class="container">

            <form method="get" action="verif-search.php">
               <h3>Recherche membre</h3>
               <div class="form-group">
               <input class="form-control" type="search" name="terme" placeholder="Nom et/ou Prénom">
               </div>
               <input class="btn btn-secondary btn-lg" type="submit" name="button_search" value="Recherche">
            </form>
            <br>
            <form method="get" action="listes_clientshisto.php">
               <h3>Historique du membre</h3>
               <div class="form-group">
               <input class="form-control" type="search" name="histomembre" placeholder="Nom et/ou Prénom">
               </div>
               <input class="btn btn-secondary btn-lg" type="submit" value="Recherche">
            </form>

            </div>
         </div>
      </div>
   </body>
</html>
