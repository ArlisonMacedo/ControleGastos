<?php

    session_start();



    if(isset($_POST['nomegasto'])){

        if(preg_match('/^[\w\sà-úÀ-Ú]+$/',$_POST['nomegasto']) && preg_match('/^[\d]+\.?[\d]{2}$/',$_POST['valor'])
         && preg_match('/^[\d]{4}-[\d]{2}-[\d]{2}$/',$_POST['data_venc'])){

            include_once '../Models/conexao.php';

            $sql = "UPDATE gasto SET NOME_GASTO = :nomegasto, VALOR = :valor, DATA_VENC = :data_venc WHERE ID = :ID";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(":nomegasto",$_POST['nomegasto']);
            $stmt->bindValue(":valor",$_POST['valor']);
            $stmt->bindValue(":data_venc",$_POST['data_venc']);
            $stmt->bindValue(":ID",$_POST['id']);

            if($stmt->execute()){
                $_SESSION['SUCCESS'] = "ALTERADO COM SUCESSO";
                header("Location: ../pendentes.php");
            }
        }else{
            $_SESSION['ERRO'] = "ERRO AO ALTERAR";
            header("Location: ../pendentes.php");
        }

    }


 ?>
