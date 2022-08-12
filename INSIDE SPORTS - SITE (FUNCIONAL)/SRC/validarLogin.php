<?php
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['fieldEmail']) && !empty($_POST['fieldSenha']))
    {
        // Acessa
        include_once('config.php');
        $email = $_POST['fieldEmail'];
        $senha = $_POST['fieldSenha'];

        // print_r('Email: ' . $email);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        $result = $conexao->query($sql);

        // print_r($sql);
        // print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['fieldEmail']);
            unset($_SESSION['fieldSenha']);
            echo '<script>alert("Email ou senhas incorretos!!")</script>';
            header('Location: loginUsuario.php');
        }
        else
        {
            $_SESSION['fieldEmail'] = $email;
            $_SESSION['fieldSenha'] = $senha;
            header('Location: areaCliente.php');
        }
    }
    else
    {
        echo '<script>alert("Campos de email ou senha estao vazios !!")</script>';
        header('Location: loginUsuario.php');
    }
?>