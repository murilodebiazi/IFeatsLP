<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ifood</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <div class="logo">
        <a href="../Menu Principal/MenuPrincipal.html"><img src="../Logo.png" alt="Logo"></a>
    </div>

    <form class="form" action="Login.php" method="POST">
        <div id="a-1">
            <label>Email:</label>
            <input type="text" name="email" required><br><br>
        </div>
        <div id="a-2">
            <label>Senha:</label>
            <input type="password" name="senha" required><br><br>
        </div>
        <div id="a-2">
            <label>Confirmar Senha:</label>
            <input type="password" name="confirmar" required><br><br>
        </div>
        <div id="a-2">
            <input type="submit">
        </div>
        <div class="botao">
            <a href="../Menu Cliente/MenuCliente.html">Voltar</a>
        </div>
    </form>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'senha'): ?>
    <script type="text/javascript">
        alert("Senha diferente");
    </script>
    <?php endif; ?>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'nao'): ?>
    <script type="text/javascript">
        alert("Cliente não encontrado");
    </script>
    <?php endif; ?>
    
</body>