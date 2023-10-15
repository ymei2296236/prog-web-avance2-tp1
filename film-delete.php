<?php
if(isset($_GET['id']) && $_GET['id'] != null ) {
    $id = $_GET['id'];

    require_once('class/CRUD.php');
    
    $crud = new CRUD;
    $delete = $crud->delete('film', $id);

}else {
    header('Location:film-index.php');
}
?>