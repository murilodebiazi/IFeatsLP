<?php
require_once "../php/conectar.php";
$nome = $_POST['nome'];
$desc = $_POST['desc'];

$sql = "INSERT INTO cad_Item_Pedido (nome, descricao) VALUES ('$nome','$desc');";

if (mysqli_query($conexao, $sql)) {
    echo "Item cadastrado com sucesso!<br>";
    echo "<a href='../html/form-cadastrar-item.html'>Cadastrar outro item</a><br>";
    echo "<a href='../html/menu-principal.html'>Voltar ao menu principal</a>";
} else {
    echo "Erro: " . mysqli_error($conexao);
}
mysqli_close($conexao);
?>