<?php

    session_start();


    if(isset($_POST['id_delete'])){
        include_once '../Models/conexao.php';

        $sql = "DELETE FROM gasto WHERE ID = :ID";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":ID",$_POST['id_delete']);
        if($stmt->execute()){
            
            header("Location: ../pendentes.php");
        }
    }



 ?>
