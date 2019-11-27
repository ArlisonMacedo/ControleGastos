<?php
    session_start();
    include '../Models/conexao.php';

    if(isset($_POST['nomegasto'])){

        if(preg_match('/^[\w\sà-úÀ-Ú]+$/',$_POST['nomegasto']) && preg_match('/^[\d]+\.?[\d]{2}$/',$_POST['valor'])
         && preg_match('/^[\d]{4}-[\d]{2}-[\d]{2}$/',$_POST['data_venc'])){

            $sql = "INSERT INTO gasto VALUES(null,:nomegasto,:valor,:data_venc,NOW(),:checked)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":nomegasto",$_POST['nomegasto']);
            $stmt->bindValue(":valor",$_POST['valor']);
            $stmt->bindValue(":data_venc",$_POST['data_venc']);
            $stmt->bindValue(":checked","false");
            if($stmt->execute()){
                header("Location: ../dashboard.php");
            }
        }else{
            $_SESSION['ERRO'] = "Dados Invalidos";
            header("Location: ../inserir.php");
        }

    }

 ?>
