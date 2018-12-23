<?php
include('mysql.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>historique des clients</title>
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
        <form method="get" action="listes_clientshisto.php">
            <h3>  historique du membre</h3>
            <input type="search" name="histomembre" placeholder="Nom et Prénom">
            <input type="submit" value="Envoyer">
        </form>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Titre du film</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($histoclient as $var): ?>
                <tr>
                    <td><?php echo $var['id_fiche_perso']; ?></td> 
                    <td><?php echo $var['nom']; ?></td> 
                    <td><?php echo $var['prenom']; ?></td>
                    <td><?php echo $var['titre']; ?></td> 
                    <td><?php echo $var['date']; ?></td> 
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        </div>
    </body>
</html>
