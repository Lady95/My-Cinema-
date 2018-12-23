<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Formulaire Ajouter un client</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/styles.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css"/>
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
        <h1>Formulaire : Ajouter un client</h1>
        <form method="post" action="ajoutclient.php">
            <p>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom">
                <br>
                <label for="prenom">Prénom : </label>
                <input type="text" name="prenom" id="prenom">
                <br>
                <label for="datenaissance">Date de naissance : </label>
                <input type="text" name="datenaissance" id="datenaissance">
                <br>
                <label for="email">Adresse email : </label>
                <input type="text" name="email" id="email">
                <br>
                <label for="adresse">Adresse : </label>
                <input type="text" name="adresse" id="adresse">
                <br>
                <label for="cpostal">Code postal : </label>
                <input type="text" name="cpostal" id="cpostal">
                <br>
                <label for="ville">Ville : </label>
                <input type="text" name="ville" id="ville">
                <br>
                <label for="pays">Pays : </label>
                <input type="text" name="pays" id="pays">
            </p>
            <br>
            <button>Envoyer</button>
        </form> 

        <p><a href="index.php">Retour</a></p> 
        </div>      
    </body>
</html>