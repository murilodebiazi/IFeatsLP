<?php
require_once "../php/conectar.php";

$email = $_POST['email'] ?? "";
$senha = $_POST['senha'] ?? "";
// LOGIN CLIENTE
$sql = "SELECT * FROM cad_Clientes WHERE email = '$email' AND senha = '$senha'";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    session_start();
    $linha = $resultado->fetch_assoc();
    $_SESSION['email'] = $linha['email'];
    header("Location: ../html/sessao-cliente.html");
    exit();
} else {
    echo "Cliente não encontrado!<br>";
    echo "<a href='../html/menu-principal.html'>Voltar ao menu principal</a>";
}
mysqli_close($conexao);
?>