<?php

require_once "../Conexao.php";

//pegar o nome do produto
$nome = $_POST['entregador'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$veiculo = $_POST['veiculo'];
$confirmar = $_POST['confirmar'];

$checarEmail = "SELECT * FROM Entregador WHERE emailEntregador='$email'";
$resultado = $conexao->query($checarEmail);

if($resultado -> num_rows> 0){
    header("Location: CadastroEntregador.php?status=email");
}
else{
    if ($confirmar == $senha) {
        $sql = "INSERT INTO Entregador (nomeEntregador, CPFEntregador, emailEntregador, senhaEntregador, transporte) VALUES ('$nome','$cpf','$email','$senha','$veiculo')";
        mysqli_query($conexao, $sql);
        $ultimocod = mysqli_insert_id($conexao);
        mysqli_close($conexao); //fechar a conexão com BD

        //voltar para o formulario de cadastro e passar parametro ok por GET

        header("Location: CadastroEntregador.php?status=ok");
        exit;
    } else
        header("Location: CadastroEntregador.php?status=erro");
}
?>