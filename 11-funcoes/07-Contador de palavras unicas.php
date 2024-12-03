<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Palavras Únicas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #282c34;
            color: #ffffff;
            text-align: center;
            padding: 50px;
        }
        form {
            margin-top: 20px;
        }
        textarea {
            width: 80%;
            height: 100px;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            resize: none;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #61dafb;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #21a1f1;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>Contador de Palavras Únicas</h1>
    <form method="POST">
        <label for="text">Digite um texto:</label><br>
        <textarea name="text" id="text" placeholder="Digite aqui seu texto..." required></textarea><br>
        <button type="submit">Contar Palavras Únicas</button>
    </form>

    <div class="result">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $text = $_POST['text'];
            $text = strtolower($text); // Ignora maiúsculas e minúsculas
            $words = preg_split('/\s+/', $text); // Divide o texto em palavras
            $uniqueWords = array_unique($words); // Remove palavras duplicadas
            $count = count($uniqueWords); // Conta palavras únicas
            echo "<p>Seu texto contém <strong>{$count}</strong> palavras únicas.</p>";
        }
        ?>
    </div>
</body>
</html>
