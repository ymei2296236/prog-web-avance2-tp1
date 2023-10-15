<?php
require_once('class/CRUD.php');

$crud = new CRUD;
$acteurs = $crud->select('acteur', 'nom');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acteurs / Actrices</title>
    <style>
        body {
            margin:4rem;
            background-color: #eee;
        }

        main {
            background-color: #eee;
            padding: 4rem;
            width:30rem;
        }

        h1{
            margin-bottom: 4rem;
        }

        p {
            font-size:1.5rem;
        }

        a {
            text-decoration:none;
            color: black;
        }

        .bouton {
            display:inline-block;
            margin-top: 2rem;
            margin-right:1rem;
            letter-spacing:0.5px;
            text-decoration:none;
            color:white;
            padding:0.4rem 1rem;
            background-color: #222;
            border-radius:10px;
        }

    </style>
</head>
<body>
    <main>
        <h1>Acteurs / Actrices</h1>
        <?php 
        foreach ($acteurs as $acteur) {
        ?>
            <p><?= $acteur['prenom']?> <?= $acteur['nom']?></p>
        <?php 
        }
        ?>
        <a class="bouton" href="index.php">Films</a>
        <a class="bouton" href="role-list.php">Rôles</a>
    </main>
</body>
</html>