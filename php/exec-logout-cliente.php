<?php
    session_start();
    session_destroy();
    header('Location: ../html/form-entrar-cliente.html');
?>