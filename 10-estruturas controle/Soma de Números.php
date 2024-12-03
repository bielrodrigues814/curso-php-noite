<?php
// Variáveis para armazenar os números e o resultado
$sum = 0;
$errorMessage = '';

// Função para verificar se um número é par
function isEven($num) {
    return $num % 2 == 0;
}

// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura dos números do formulário
    $num1 = (int)$_POST['num1'];
    $num2 = (int)$_POST['num2'];
    $num3 = (int)$_POST['num3'];

    // Verificação se os números são pares
    if (isEven($num1) && isEven($num2) && isEven($num3)) {
        // Soma dos números se forem pares
        $sum = $num1 + $num2 + $num3;
    } else {
        // Mensagem de erro caso algum número não seja par
        $errorMessage = "Erro: Todos os números devem ser pares!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma de Números Pares</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        .error {
            color: #dc3545;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Soma de Números Pares</h1>

    <form method="POST">
        <label for="num1">Primeiro número:</label>
        <input type="number" name="num1" id="num1" required>

        <label for="num2">Segundo número:</label>
        <input type="number" name="num2" id="num2" required>

        <label for="num3">Terceiro número:</label>
        <input type="number" name="num3" id="num3" required>

        <button type="submit">Calcular Soma</button>
    </form>

    <!-- Exibir o resultado ou mensagem de erro -->
    <div class="result">
        <?php if ($sum > 0): ?>
            <p>A soma dos números pares é: <?php echo $sum; ?></p>
        <?php elseif ($errorMessage): ?>
            <p class="error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
