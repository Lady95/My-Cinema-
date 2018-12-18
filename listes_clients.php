<?php
include('mysql.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
         <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <main>
            <div>
                <form action="modifclient.php" method="get">
                <table border="1">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>type d'abonnement</th>
                            <th>modifier</th>
                            <th>supprimer</th>
                        </tr>
                    </thead>
                <tbody>
                <?php foreach($clients as $val) :?>
                    <tr>
                        <td><?php echo $val['id_fiche_perso']; ?></td>
                        <td><?php echo $val['nom']; ?></td>
                        <td><?php echo $val['prenom']; ?></td>
                        <td><?php echo $val['abo']; ?></td>
                        <td><button name="modifier">modifier</button>
                        </td>
                        <td><button>suppimer</button></td>
                        <input type="hidden" id="modifier" name="modifier" value="<?php echo $val['id_fiche_perso'];?>">
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table> 
                </form>
            
            </div>
        </main>
    </body>
</html>