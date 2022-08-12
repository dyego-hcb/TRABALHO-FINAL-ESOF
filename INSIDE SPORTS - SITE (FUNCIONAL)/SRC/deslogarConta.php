<?php
    session_start();
    unset($_SESSION['fieldEmail']);
    unset($_SESSION['fieldSenha']);
    unset($_SESSION['carrinho_final']);
    header("Location: home.php");
?>