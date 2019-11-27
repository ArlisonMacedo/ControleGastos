<?php

    session_start();


    if(isset($_POST['id_finish'])){
        include_once '../Models/conexao.php';

        $sql = "UPDATE gasto SET checked = :checked WHERE ID = :ID";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":checked",1);
        $stmt->bindValue(":ID",$_POST['id_finish']);
        if($stmt->execute()){
            $_SESSION['SUCCESS'] = "GASTO FOI FINALIZADO COM SUCESSO";
            header("Location: ../pendentes.php");
        }

    }


 ?>
