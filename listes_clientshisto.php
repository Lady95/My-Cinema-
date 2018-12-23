<?php
include('mysql.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>historique des clients</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css"/>
        <script src="main.js"></script>
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
        <form method="get" action=" ">
            <h3>  historique du membre</h3>
            <input type="search" name="histomembre" placeholder="Nom et Prénom">
            <input type="submit" value="Envoyer">
        </form>
        <table border=1>
            <thead>
                <th>Id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Titre du film</th>
                <th>Date</th>

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
    </body>
</html>
