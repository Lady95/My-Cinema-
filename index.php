<?php include('mysql.php'); ?>
<!DOCTYPE html>
<html lang="fr"> 
    <head>
        <meta charset="utf-8" />
        <title>Cinema City</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/styles.css" />
    </head>
    <body>
        <div>
            <header>
            <h1>Cinema City</h1>
            <nav>
                <ul>
                    <li><a href="ajoutclient.php">Ajouter un client</a></li>
                    <li><a href="listes_clients.php">Listes des clients</a></li>
                </ul>
            </nav>
            
            </header>
            
            <form method="get" action="recherchefilms.php">
                <h3>Recherche film</h3>

                <input type="text" name='search_film' placeholder="Recherche">
                <label for="genre">Genres</label>
                <select name="genre" id="genre">
                <?php foreach($genres as $genre): ?>
                <option value="<?=$genre['id_genre']?>"><?= $genre['nom']?></option>
                <?php endforeach;?>
                </select>

                <label for="distrib">Distributeur</label>
                <select name="distrib" id="distrib">
                <?php foreach($distribs as $distrib): ?>
                <option value="<?=$distrib['id_distrib']?>"><?= $distrib['nom']?></option>
                <?php endforeach;?>
                </select>
                
                <input type="submit" name="valider" value="Entrer">
            </form>
            <form method="get" action="verif-search.php">
                <h3>Recherche membre</h3>
                <input type="search" name="terme" placeholder="Nom, prénom" >
                <input type="submit" name="button_search" value="recherche">
            </form>
            </div>
    </body>
</html>