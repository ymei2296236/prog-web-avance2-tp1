<?php

if(isset($_GET['id']) && $_GET['id'] != null ) {

    require_once('class/CRUD.php');
    
    $crud = new CRUD;

    $film = $crud->selectId('film', $_GET['id']);
    extract($film);

    $genres = $crud->select('genre', 'nom');
    $genreTrouve = $crud->selectId('genre', $genre_id);
    $genreTrouve_id = $genreTrouve['id'];

    
    $acteurs = $crud->select('acteur', 'nom');
    $acteurTrouve = $crud->selectId('acteur', $id);
    $acteurTrouve_id = $acteurTrouve['id'];

}else {
    header('Location:film-index.php');
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le film</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin:4rem;
            background-color: #eee;
        }
        main {
            background-color: #fff;
            padding: 4rem;
            width:30rem;
        }
        input:not([type='submit']), textarea, select {
            display:block;
            margin: 0.5rem 0 1rem 0;
            width: 18rem;
            padding: 5px;
        }

        input[type='submit'] {
            padding: 0.5rem 2rem;
            font-size: 1rem;
            letter-spacing:0.5px;
            text-decoration:none;
            color:white;
            padding:0.5rem;
            width:10rem;
            background-color: #222;
            border-radius:10px;
            border: 0;
        }

        .bouton {
            display:inline-block;
            margin-top: 1.5rem;
            margin-right:1rem;
            letter-spacing:0.5px;
            text-decoration:none;
            color: black;
            padding:0.3rem 1rem;
            border-radius:10px;
            border: 1.5px solid black;
        }
    </style>
</head>
<body>
    <main>
        <h1>Modifier le film</h1>
        <form action="film-update.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">

            <label>Titre
                <input type="text" name="titre" value="<?=$titre?>">
            </label>
            <label>Année de production
                <input type="number" name="anneeProduction" value="<?=$anneeProduction?>"> 
            </label>
            <label>Synopsis
                <textarea name="synopsis" cols=40 rows=10><?=$synopsis?></textarea>
            </label>
            <label>Acteur / Actrice
                <select name="genre_id">
                    <?php 
                        foreach ($acteurs as $acteur) {
                    ?>
                        <option value="<?= $acteur['id']?>" <?php if ($acteurTrouve_id == $acteur['id']) {?> selected <?php } ?> ><?=$acteur['prenom']?> <?=$acteur['nom']?></option>
                    <?php 
                        }
                    ?>
                </select>
            </label>
            <label>Duree (minutes)
                <input type="number" name="duree" value="<?=$duree?>">
            </label>
            <label>Genre
                <select name="genre_id">
                    <?php 
                        foreach ($genres as $genre) {
                    ?>
                        <option value="<?= $genre['id']?>" <?php if ($genreTrouve_id == $genre['id']) {?> selected <?php } ?> ><?=$genre['nom']?></option>
                    <?php 
                        }
                    ?>
                </select>
            </label>
            <input type="submit" value="Enregistrer">

        </form>
        <a class="bouton" href="film-index.php">Retourner</a>
    </main>
</body>
</html>