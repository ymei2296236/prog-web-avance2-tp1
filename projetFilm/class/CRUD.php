<?php

class CRUD extends PDO {

    public function __construct() {
        // Pour connecter à la base des données sur mon serveur local 
        // parent::__construct('mysql:host=localhost; dbname=film; port=8889; charset=utf8', 'root', 'root');

        // Pour connecter à la base des données de Webdev
        parent::__construct('mysql:host=localhost; dbname=e2296236; port=3306; charset=utf8', 'e2296236', 'owioZ7vb1n0D0d4uLPw4');
    }

    public function select($table, $field='id', $order='ASC') {
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    } 

    public function selectId($table, $value, $field = 'id') {
        $sql = "SELECT * FROM $table WHERE $field = '$value'";
        $stmt = $this->query($sql);
        $count = $stmt->rowCount();

        if($count == 1) {
            return $stmt->fetch();
        } else {
            header('Locatoin:index.php');
        }
    }

    public function insert($table, $data){
    
        $nomChamp = implode(", ",array_keys($data));
        $valeurChamp = ":".implode(", :", array_keys($data));
    
        $sql = "INSERT INTO $table ($nomChamp) VALUES ($valeurChamp)";
        $stmt = $this->prepare($sql);

        foreach($data as $key => $value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
    
        return $this->lastInsertId();
    
    }


    public function delete($table, $value, $field = 'id'){

        $sql = "DELETE FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        header('location:index.php');
    }

    public function update($table, $data, $field='id'){
      
        $queryField = null;
        foreach($data as $key=>$value){
            $queryField .="$key =:$key, ";
        }
        $queryField = rtrim($queryField, ", ");
        
        $sql = "UPDATE $table SET $queryField WHERE $field = :$field";

        $stmt = $this->prepare($sql);
        foreach($data as $key => $value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }
}


?>