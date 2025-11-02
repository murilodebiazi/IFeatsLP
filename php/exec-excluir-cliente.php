<?php
    session_start();
    require_once('conectar.php');
    require_once('verificar-sessao.php');

    $email = $_SESSION['email'];
    
    $sql = "DELETE FROM cad_Clientes WHERE email = '$email'";
    mysqli_query($conexao, $sql);
    $ultimocod = mysqli_insert_id($conexao);
    mysqli_close($conexao);
    
    session_destroy();

    header("Location: ..\html\menu-principal.html")
?>