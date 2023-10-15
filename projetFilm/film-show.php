<?php
if(isset($_GET['id']) && $_GET['id'] != null)  {
    $id = $_GET['id'];
    
} else if (isset($_GET['film_id']) && $_GET['film_id'] != null) {
    $id = $_GET['film_id'];
} else {
    header('Location:index.php');
}

if($id) {

    require_once('class/CRUD.php');
    $crud = new CRUD;
    $film = $crud->selectId('film', $id); 
    extract($film);
    
    $genre = $crud->selectId('genre', $genre_id);
    $genre_nom = $genre['nom'];
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>
    <style>
        body {
            margin:4rem;
            background-color: #eee;
        }

        main {
            background-color: #fff;
            padding: 4rem;
            width:30rem;
        }

        table{
            margin-bottom: 2rem;
        }

        th {
            text-align: left;

        }

        td {
            max-width:25rem;
            padding:1rem 2rem;
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

        .bouton--secondaire {
            margin-top: 1.5rem;
            color: black;
            padding:0.3rem 1rem;
            background-color:white;
            border: 1.5px solid black;
        }

    </style>
</head>
<body>
    <main>
        <h1>Détails</h1>

        <table>
            <tr>
                <th>Titre</th>
                <td><?=$titre?></td>
            </tr>
            <tr>
                <th>Année de production</th>
                <td><?=$anneeProduction?></td>
            </tr>
            <tr>
                <th>Synopsis</th>
                <td><?=$synopsis?></td>
            </tr>
            <tr>
                <th>Durée</th>
                <td><?=$duree?></td>
            </tr>
            <tr>
                <th>Genre</th>
                <td><?=$genre_nom?></td>
            </tr>
        </table>
        
        <a class="bouton" href="film-edit.php?id=<?=$id?>">Modifier</a>
        <a class="bouton" href="film-delete.php?id=<?=$id?>">Supprimer</a>
        <a class="bouton bouton--secondaire" href="index.php">Retourner à la liste</a>
    </main>    
</body>
</html>