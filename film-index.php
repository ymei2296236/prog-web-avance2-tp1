<?php

require_once('class/CRUD.php');
$crud = new CRUD;
$film = $crud->select('film', 'titre');
$genre = $crud->select('genre');
// print_r($film);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de films</title>
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
        <h1>Tous les films</h1>

            <?php foreach ($film as $row) 
            {?>
                <p><a href="film-show.php?id=<?=$row['id']?>"> <?=$row['titre']?></a> </p>
            <?php         
            } ?>
        
        <a class="bouton" href="film-create.php">Ajouter un film</a>
    </main>
</body>
</html>