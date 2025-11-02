<?php
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['email']) || $_SESSION['login'] != 'ok') {
    $msg = urlencode('Voce não tem permissao!');
    header("location: ./entrar.php?retorno=$msg");
    exit;
}
?>