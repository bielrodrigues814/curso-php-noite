<?php
    include 'config.php'; // Conexão com o banco
    session_start(); // Para gerenciar mensagens de sucesso ou erro

    // Função para deletar cliente
    if (isset($_GET['deletar'])) {
        $id_cliente = $_GET['deletar'];
        $conn->query("DELETE FROM clientes WHERE id = $id_cliente");
        header("Location: index.php"); // Redireciona após deletar
        exit();
    }

    // Função para editar cliente
    $cliente_editar = null;
    if (isset($_GET['editar'])) {
        $id_cliente = $_GET['editar'];
        $result = $conn->query("SELECT * FROM clientes WHERE id = $id_cliente");
        $cliente_editar = $result->fetch_assoc();
    }

    // Se o formulário for submetido, salva os dados editados
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_cliente'])) {
        $id_cliente = $_POST['id_cliente'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $sexo = $_POST['sexo'];
        $bairro = $_POST['bairro'];

        $conn->query("UPDATE clientes SET nome='$nome', email='$email', sexo='$sexo', bairro='$bairro' WHERE id = $id_cliente");

        header("Location: index.php"); // Redireciona após editar
        exit();
    }

    // Adicionar novo cliente
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['id_cliente'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $sexo = $_POST['sexo'];
        $bairro = $_POST['bairro'];

        // Verificar se o email já existe no banco
        $result = $conn->query("SELECT * FROM clientes WHERE email = '$email'");
        if ($result->num_rows > 0) {
            // Email já registrado, exibe mensagem de erro
            $_SESSION['erro'] = "Este email já está cadastrado!";
            header("Location: index.php"); // Redireciona para a página principal
            exit();
        } else {
            // Caso o email não exista, insere o novo cliente
            $conn->query("INSERT INTO clientes(nome, email, sexo, bairro) VALUES ('$nome', '$email', '$sexo', '$bairro')");
            $_SESSION['sucesso'] = "Usuário cadastrado com sucesso!";
            header("Location: index.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Clientes</title>
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Estilo para a mensagem de sucesso -->
    <style>
        .success-message {
            background-color: #28a745; /* Cor verde de sucesso */
            color: white; /* Texto branco */
            padding: 20px; /* Aumenta o espaçamento ao redor da mensagem */
            font-size: 1.5em; /* Aumenta o tamanho da fonte */
            font-weight: bold; /* Torna o texto em negrito */
            border-radius: 5px; /* Bordas arredondadas */
            text-align: center; /* Alinha o texto ao centro */
            margin-bottom: 20px; /* Espaçamento abaixo da mensagem */
            width: 80%; /* Faz a mensagem ocupar 80% da largura da tela */
            margin: 0 auto; /* Centraliza a mensagem */
        }

        .error-message {
            background-color: #dc3545; /* Cor vermelha de erro */
            color: white; /* Texto branco */
            padding: 20px; /* Aumenta o espaçamento ao redor da mensagem */
            font-size: 1.5em; /* Aumenta o tamanho da fonte */
            font-weight: bold; /* Torna o texto em negrito */
            border-radius: 5px; /* Bordas arredondadas */
            text-align: center; /* Alinha o texto ao centro */
            margin-bottom: 20px; /* Espaçamento abaixo da mensagem */
            width: 80%; /* Faz a mensagem ocupar 80% da largura da tela */
            margin: 0 auto; /* Centraliza a mensagem */
        }
    </style>
    
    <script>
        function toggleClientes() {
            const formContainer = document.getElementById('form-container');
            const clientesContainer = document.getElementById('clientes-salvos');
            if (clientesContainer.style.display === 'none' || clientesContainer.style.display === '') {
                clientesContainer.style.display = 'grid';
                formContainer.style.display = 'none'; // Ocultar formulário
            } else {
                clientesContainer.style.display = 'none';
                formContainer.style.display = 'block'; // Mostrar formulário novamente
            }
        }
    </script>
</head>
<body>

    <!-- Mensagem de Sucesso -->
    <?php if (isset($_SESSION['sucesso'])): ?>
        <div class="success-message">
            <?php echo $_SESSION['sucesso']; ?>
            <?php unset($_SESSION['sucesso']); ?> <!-- Limpar a mensagem após exibi-la -->
        </div>
    <?php endif; ?>

    <!-- Mensagem de Erro -->
    <?php if (isset($_SESSION['erro'])): ?>
        <div class="error-message">
            <?php echo $_SESSION['erro']; ?>
            <?php unset($_SESSION['erro']); ?> <!-- Limpar a mensagem após exibi-la -->
        </div>
    <?php endif; ?>

    <!-- Botão para Exibir "Clientes Salvos" -->
    <div class="clientes-salvos-btn">
        <button onclick="toggleClientes()" class="btn">Clientes Salvos</button>
    </div>

    <!-- Formulário de Adicionar Cliente -->
    <div id="form-container" class="form-container">
        <div class="form-box">
            <h1><?php echo isset($cliente_editar) ? 'Editar Cliente' : 'Adicionar Novo Cliente'; ?></h1>
            <form action="" method="post" onsubmit="return validarFormulario()">
                <?php if (isset($cliente_editar)): ?>
                    <input type="hidden" name="id_cliente" value="<?php echo $cliente_editar['id']; ?>">
                <?php endif; ?>
                <div class="input-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required placeholder="Digite o nome completo" value="<?php echo isset($cliente_editar) ? $cliente_editar['nome'] : ''; ?>">
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="Digite o seu email" value="<?php echo isset($cliente_editar) ? $cliente_editar['email'] : ''; ?>">
                </div>
                <div class="input-group">
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" required>
                        <option value="Masculino" <?php echo isset($cliente_editar) && $cliente_editar['sexo'] == 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
                        <option value="Feminino" <?php echo isset($cliente_editar) && $cliente_editar['sexo'] == 'Feminino' ? 'selected' : ''; ?>>Feminino</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" required placeholder="Digite o seu bairro" value="<?php echo isset($cliente_editar) ? $cliente_editar['bairro'] : ''; ?>">
                </div>
                <button type="submit" class="btn"><?php echo isset($cliente_editar) ? 'Salvar Alterações' : 'Salvar'; ?></button>
            </form>
        </div>
    </div>

    <!-- Lista de Clientes Salvos (Inicialmente Oculta) -->
    <div id="clientes-salvos" style="display:none;">
        <h2>Clientes Salvos</h2>
        <div class="clientes-list">
            <?php
                // Buscar todos os clientes cadastrados no banco de dados
                $result = $conn->query("SELECT * FROM clientes");
                while ($cliente = $result->fetch_assoc()) {
                    echo "<div class='cliente-card'>
                            <h3>{$cliente['nome']}</h3>
                            <p>Email: {$cliente['email']}</p>
                            <p>Sexo: {$cliente['sexo']}</p>
                            <p>Bairro: {$cliente['bairro']}</p>
                            <div class='actions'>
                                <a href='?editar={$cliente['id']}' class='edit-btn'>Editar</a>
                                <a href='?deletar={$cliente['id']}' class='delete-btn' onclick='return confirm(\"Você tem certeza que deseja deletar?\")'>Deletar</a>
                            </div>
                          </div>";
                }
            ?>
        </div>
    </div>

</body>
</html>
