<?php
require_once "../php/conectar.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO cad_Clientes (nome, email, senha) VALUES ('$nome','$email','$senha');";

if (mysqli_query($conexao, $sql)) {
    echo "Cliente cadastrado com sucesso!<br>";
    echo "<a href='../html/form-cadastrar-cliente.html'>Cadastrar outro cliente</a><br>";
    echo "<a href='../html/menuCadastro.html'>Voltar ao menu principal</a>";
} else {
    echo "Erro: " . mysqli_error($conexao);
}
mysqli_close($conexao);
?>