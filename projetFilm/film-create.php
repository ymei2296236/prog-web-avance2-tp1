<?php
require_once('class/CRUD.php');
$crud = new CRUD;
$genres = $crud->select('genre', 'nom');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un film</title>
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
        <h1>Ajouter un film</h1>
        <form action="film-store.php" method="post">
            <label>Titre
                <textarea name="titre" cols=40 rows=2 ></textarea>
            </label>
            <label>Année de production
                <input type="number" placeholder="YYYY" name="anneeProduction">
            </label>
            <label>Synopsis
                <textarea name="synopsis" cols=40 rows=10 ></textarea>
            </label>
            <label>Duree (minutes)
                <input type="number" name="duree">
            </label>
            <label>Genre
                <select name="genre_id">
                    <?php 
                        foreach ($genres as $genre) {
                    ?>
                        <option value="<?= $genre['id']?>"><?=$genre['nom']?></option>
                    <?php 
                        }
                    ?>
                </select>
            </label>
            <input type="submit" value="Enregistrer">
        </form>
        <a class="bouton bouton--secondaire" href="index.php">Retourner</a>
    </main>
</body>
</html>