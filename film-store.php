<?php

require_once('class/CRUD.php');

$crud = new CRUD;
$filmId = $crud->insert('film', $_POST); 

header("location:film-show.php?id=$filmId");


?>