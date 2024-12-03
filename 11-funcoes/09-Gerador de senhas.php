<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senhas Fortes</title>
    <style>
        /* Estilo geral */
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50;
            color: #ecf0f1;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #34495e;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }
        h1 {
            margin-bottom: 20px;
        }
        input[type="number"], input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="number"] {
            background-color: #ecf0f1;
            color: #2c3e50;
        }
        input[type="text"] {
            background-color: #bdc3c7;
            color: #2c3e50;
        }
        button {
            background-color: #1abc9c;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #16a085;
        }
        .footer {
            margin-top: 15px;
            font-size: 12px;
            color: #95a5a6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerador de Senhas Fortes</h1>
        <form method="POST" action="">
            <input type="number" name="length" placeholder="Comprimento da senha" min="6" max="64" required>
            <button type="submit">Gerar Senha</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Função para gerar a senha
            function gerarSenha($length) {
                $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
                $senha = '';
                for ($i = 0; $i < $length; $i++) {
                    $senha .= $chars[random_int(0, strlen($chars) - 1)];
                }
                return $senha;
            }

            // Obtém o comprimento da senha
            $length = intval($_POST['length']);
            if ($length >= 6 && $length <= 64) {
                $senha = gerarSenha($length);
                echo '<input type="text" id="senha" value="' . htmlspecialchars($senha) . '" readonly>';
                echo '
                <form method="post" action="">
                    <input type="hidden" name="senha" value="' . htmlspecialchars($senha) . '">
                    <button type="submit" name="save">Salvar no Computador</button>
                </form>';
            } else {
                echo '<p style="color: #e74c3c;">Por favor, insira um comprimento válido (6-64).</p>';
            }
        }

        // Salvar a senha em um arquivo local
        if (isset($_POST['save']) && isset($_POST['senha'])) {
            $senha = $_POST['senha'];
            $fileName = "senha_gerada_" . date("Y-m-d_H-i-s") . ".txt";
            file_put_contents($fileName, "Senha gerada: $senha");
            echo '<p style="color: #2ecc71;">Senha salva como arquivo: <a href="' . htmlspecialchars($fileName) . '" download="' . htmlspecialchars($fileName) . '" style="color: #1abc9c;">Baixar Arquivo</a></p>';
        }
        ?>
        <div class="footer">Feito com ❤️ por você!</div>
    </div>
</body>
</html>
