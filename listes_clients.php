<?php
include('mysql.php'); 


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css"/>
        
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
        <main>
            <div>
                <h3>Listes des clients</h3>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Type d'abonnement</th>
                            <th>Modifier l'abonnement</th>
                            <th>Supprimer l'abonnement</th>
                            <!--<th>supprimer le membre</th>-->
                        </tr>
                    </thead>
                <tbody>
                <?php foreach($clients as $val) :?>
                    <tr>
                        <td><?php echo $val['id_fiche_perso']; ?></td>
                        <td><?php echo $val['nom']; ?></td>
                        <td><?php echo $val['prenom'];?></td>
                        <td><?php print $val['abo']; ?></td>
                        <td>
                        <form action="listes_clients.php?idmembre=<?php $_GET['idmembre']?>" method="get" target="_self">
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
                       <!-- <td><button name ="supmembre" id="supmembre">supprimer le membre</button></td>-->
                        </form>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table> 
            </div>
        </main>
    </body>
</html>

