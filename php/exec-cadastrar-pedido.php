<?php
require_once "../php/conectar.php";
$numero = $_POST['numero'];
$cliente = $_POST['cliente'];
$item = $_POST['item'];
$hora_inicial = $_POST['hora_inicial'];
$hora_final = $_POST['hora_final'];

$sql = "INSERT INTO cad_Pedidos (numero, id_cliente, id_item, horario_inicial, horario_final) VALUES ('$numero','$cliente','$item','$hora_inicial','$hora_final');";

$verificacaoCliente = "SELECT * FROM cad_Clientes WHERE id='$cliente'";
$verificacaoItem = "SELECT * FROM cad_Item_Pedido WHERE id='$item'";

$resultadoCliente = $conexao->query($verificacaoCliente);
$resultadoItem = $conexao->query($verificacaoItem);

if ($resultadoCliente->num_rows > 0 && $resultadoItem->num_rows > 0) {
    if (mysqli_query($conexao, $sql)) {
        echo "Pedido cadastrado com sucesso!<br>";
        echo "<a href='../html/form-cadastrar-pedido.html'>Cadastrar outro pedido</a><br>";
        echo "<a href='../html/menu-principal.html'>Voltar ao menu principal</a>";
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }
} else {
    echo "Não tem cliente ou item com os IDs inseridos!<br>";
    echo "<a href='../html/form-cadastrar-pedido.html'>Voltar ao menu Cadastrar Pedidos</a><br>";
    echo "<a href='../html/menu-principal.html'>Voltar ao menu principal</a>";
}
mysqli_close($conexao);
?>