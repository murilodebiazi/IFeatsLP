<?php

    require_once "../Conexao.php";

    $email = $_POST['email'] ?? "";
    $senha = $_POST['senha'] ?? "";
    $confirmar = $_POST['confirmar'] ?? "";

    if($confirmar == $senha){
        $sql = "SELECT * FROM Entregador WHERE emailEntregador='$email' AND senhaEntregador='$senha'";
        $resultado = $conexao -> query($sql);
        if($resultado -> num_rows > 0){
            session_start();
            $linha = $resultado->fetch_assoc();
            $_SESSION['email'] = $linha["emailEntregador"];
            header("Location: DadosEntregador.php");
            exit();
        }   
        //else{
            //header("Location: LogarEntregador.php?status=nao");
        //}
    }
    else{
        header("Location: LogarEntregador.php?status=senha");
    }
?>