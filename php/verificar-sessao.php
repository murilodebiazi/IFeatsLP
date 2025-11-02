<?php
error_reporting(E_ALL);

if (!isset($_SESSION['email']) || $_SESSION['email'] == null) {
    $msg = urlencode('Voce não tem permissao!');
    header("location: ./entrar.php?retorno=$msg");
    exit;
}
?>