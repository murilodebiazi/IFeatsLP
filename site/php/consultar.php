<?php
// Exibir erros em ambiente de desenvolvimento
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("../php/conectar.php");

// Captura busca do usuário
$busca = $_GET['busca'] ?? '';

if ($busca !== '') {
    $busca = mysqli_real_escape_string($conexao, $busca);
    $sql = "SELECT * FROM cadastro WHERE id LIKE '%$busca%' OR nome LIKE '%$busca%'";
} else {
    $sql = "SELECT * FROM cadastro";
}

$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Consultar Produtos</title>
  <link rel="stylesheet" href="../css/estilo.css">
  <style>
    table img {
      max-width: 100px;
      height: auto;
    }
    main {
      padding: 30px;
    }
    main h2 {
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>

<header style="background:#ff6347; padding:15px; color:white; text-align:center;">
  <h1>Cesta Básica Online</h1>
  <nav>
    <a href="../php/principal.php" style="color:white; text-decoration:none; margin-right:15px;">Página Inicial</a>
  </nav>
</header>

<main>
  <div class="card">
    <h2>Consultar Produtos</h2>
    <form method="get" action="consultar.php">
      <input type="text" name="busca" placeholder="Digite código ou nome do produto" value="<?php echo htmlspecialchars($busca); ?>">
      <button type="submit">Buscar</button>
    </form>

    <table>
      <thead>
        <tr>
          <th>Código</th>
          <th>Nome do Produto</th>
          <th>Imagem</th>
        </tr>
      </thead>
      <tbody>
        <?php while($linha = mysqli_fetch_assoc($resultado)) { 
            $caminho_img = "../../fotos/" . $linha['id'] . ".png";
        ?>
        <tr>
          <td><?php echo htmlspecialchars($linha['id']); ?></td>
          <td><?php echo htmlspecialchars($linha['nome']); ?></td>
          <td>
            <?php 
            if(file_exists($caminho_img)) {
                echo '<img src="'.$caminho_img.'" alt="'.htmlspecialchars($linha['nome']).'">';
            } else {
                echo 'N/A';
            }
            ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <?php mysqli_close($conexao); ?>
</main>

<footer style="background:#ff6347; color:white; text-align:center; padding:15px; margin-top:20px;">
  Portal da Cesta Básica 2025 &copy;
</footer>

</body>
</html>