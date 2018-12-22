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
    <table border=1>
                <tbody>
                <?php foreach($films as $film): ?>
                    <tr>
                        <td><?= $film['titre']?></td> 
                        <td><?= $film['nom']?></td>
                        <td><?= $film['distributeur']?></td> 
                    </tr>
                    <?php endforeach;?>
                </tbody>
    </table>
</body>
</html>
