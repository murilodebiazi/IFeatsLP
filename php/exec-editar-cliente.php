<?php
session_start();
require_once('conectar.php');

$emailAntigo = $_SESSION['email'];

//pegar o nome do produto
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "UPDATE cad_Clientes SET nome='$nome', email='$email', senha = '$senha' WHERE email='$emailAntigo'";
mysqli_query($conexao, $sql);
$ultimocod = mysqli_insert_id($conexao);
mysqli_close($conexao);

$_SESSION['email'] = $email;

header("Location: tela-cliente.php");
exit;

?>