<?php include('mysql.php')

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Modifier l'abonnement du client</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/styles.css" />
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
                </ul>
            </nav>
            </header>
        <h1>Formulaire : modifier l'abonnement du client <?php $clients['nom']?></h1>
        <form method="post" action="">
                <label for="abonnement">abonnement</label>
                <select name="abonnement" id="abonnement">
                    <option value="" selected>veuillez sélectionner</option>
                    <?php foreach($abo as $val): ?>
                    <option value="<?=$val['id_abo']?>"><?= $val['nom']?></option>
                    <?php endforeach;?>
                </select>
            <br>
            <button>Envoyer</button>
        </form> 

        <p><a href="index.php">Retour</a></p>       
    </body>
</html>