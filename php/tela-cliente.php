<?php
    session_start();
    require_once('conectar.php');
    require_once('verificar-sessao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Tela Cliente</title>
  <link rel="icon" href="../img/Icon.png" type="image/png">
  <link rel="stylesheet" href="../css/estiloMenu.css">
</head>

<body>
  <?php
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM cad_Clientes WHERE email = '$email'";
    $resultado = $conexao -> query($sql);
    $linha = $resultado->fetch_assoc();
  ?> 

  <div class="cabecalho">
    <a id="voltar" href="perfil-cliente.php"><?php echo $linha['nome']?></a>
    <a id="logo" href="../html/menu-principal.html">
      <img src="../img/Logo.png" alt="Logo">
    </a>
    <a id="logout" href="../php/exec-logout-cliente.php">Logout</a>
  </div>

  <div class="corpo">
    
  </div>

  <div class="rodape">
    <p class="copyright">IFood @ 2025 - Murilo, Kesler, Maico, Richard</p>
  </div>
</body>

</html>