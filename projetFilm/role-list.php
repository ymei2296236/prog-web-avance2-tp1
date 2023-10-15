<?php

require_once('class/CRUD.php');
$crud = new CRUD;
$roles = $crud->select('role', 'nom');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rôles de films classiques</title>
    <style>
        body {
            margin:4rem;
            background-color: #eee;
        }

        main {
            background-color: #eee;
            padding: 4rem;
            width:60rem;
        }

        h1{
            margin-bottom: 4rem;
        }

        p {
            font-size:1.5rem;
        }

        a {
            text-underline-offset: 8px;
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
        <h1>Rôles de films classiques</h1>
        <?php 
        foreach ($roles as $role) { 
            $film = $crud->selectId('film', $role['film_id']);
            $nom_film = $film['titre'];
            $acteur = $crud->selectId('acteur', $role['acteur_id']);
            $nom_acteur = $acteur['prenom']. " " . $acteur['nom'];
        ?>
            <p> 
            <?= $role['prenom'] . " ". $role['nom']?> par <?= $nom_acteur ?> dans le film <a href="film-show.php?id=<?= $role['film_id']?>"><?= $nom_film?></a></p>
        <?php 
        } 
        ?>
        <a class="bouton" href="index.php">Films</a>
        <a class="bouton" href="acteur-list.php">Acteurs / Actrices</a>
    </main>
</body>
</html>