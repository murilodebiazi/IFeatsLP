<?php
require_once "../php/conectar.php";
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$telefone = $_POST['telefone'];

$sql = "INSERT INTO cad_Fornecedores (nome, cnpj, telefone) VALUES ('$nome','$cnpj', '$telefone');";

if (mysqli_query($conexao, $sql)) {
    echo "Fornecedor cadastrado com sucesso!<br>";
    echo "<a href='../html/form-cadastrar-fornecedor.html'>Cadastrar outro fornecedor</a>";
} else {
    echo "Erro: " . mysqli_error($conexao);
}
mysqli_close($conexao);
?>