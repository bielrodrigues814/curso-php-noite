<?php 
    session_start(); // Iniciar a sessão para armazenar mensagens

    include 'config.php';
    
    // Inserir um cliente no banco
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $sexo = $_POST['sexo'];
        $bairro = $_POST['bairro'];

        // Inserir cliente no banco de dados
        $conn->query("INSERT INTO clientes(nome, email, sexo, bairro) VALUES ('$nome', '$email', '$sexo', '$bairro')");
        
        // Armazenar a mensagem de sucesso na sessão
        $_SESSION['sucesso'] = "Usuário cadastrado com sucesso!";
        
        // Redirecionar para a página inicial
        header("Location: index.php");
        exit();
    }
?>
