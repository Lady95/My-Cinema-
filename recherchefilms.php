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
    <script src="main.js"></script>
</head>
<body>
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
