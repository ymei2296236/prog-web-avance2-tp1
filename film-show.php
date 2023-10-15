<?php
if(isset($_GET['id']) && $_GET['id'] != null) {

    require_once('class/CRUD.php');
    $crud = new CRUD;
    $film = $crud->selectId('film', $_GET['id']);

    extract($film);

    $genre = $crud->selectId('genre', $genre_id);
    $genre_nom = $genre['nom'];

    $acteur = $crud->selectId('acteur', $id);
    $acteur_nom = $acteur['prenom']. " ". $acteur['nom'] ;

} else {
    header('Location:film-index.php');
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
            margin-top: 1rem;
            margin-right:1rem;
            letter-spacing:0.5px;
            text-decoration:none;
            color:white;
            padding:0.3rem 1rem;
            background-color: #222;
            border-radius:10px;
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
                <th>Acteur / Actrice</th>
                <td><?=$acteur_nom?></td>
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
        <a class="bouton" href="film-index.php">Retourner à la liste</a>
    </main>    
</body>
</html>