<?php
// Remover o limite de tempo para a execução do script
set_time_limit(0);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura os valores do formulário
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
    $result = null;

    // Realiza o cálculo baseado na operação
    if ($operation == 'add') {
        $result = $num1 + $num2;
    } elseif ($operation == 'subtract') {
        $result = $num1 - $num2;
    } elseif ($operation == 'multiply') {
        $result = $num1 * $num2;
    } elseif ($operation == 'divide') {
        if ($num2 != 0) {
            $result = $num1 / $num2;
        } else {
            $result = 'Erro: Divisão por zero';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Moderna</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6e7dff, #8f53d6);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }
        .calculator {
            background: #fff;
            border-radius: 15px;
            width: 350px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }
        .form-control {
            margin-bottom: 15px;
        }
        input[type="number"], select {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            background-color: #f4f4f4;
            border-radius: 8px;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h1>Calculadora Moderna</h1>
    <form method="POST" id="calcForm">
        <div class="form-control">
            <input type="number" name="num1" id="num1" placeholder="Digite o primeiro número" required>
        </div>
        <div class="form-control">
            <input type="number" name="num2" id="num2" placeholder="Digite o segundo número" required>
        </div>
        <div class="form-control">
            <select name="operation" id="operation" required>
                <option value="add">Soma</option>
                <option value="subtract">Subtração</option>
                <option value="multiply">Multiplicação</option>
                <option value="divide">Divisão</option>
            </select>
        </div>
        <button type="submit">Calcular</button>
    </form>

    <?php if (isset($result)): ?>
        <div class="result">
            <p>Resultado: <?php echo $result; ?></p>
        </div>
    <?php endif; ?>
</div>

<script>
    // Função para calcular em tempo real sem necessidade de atualizar a página
    document.getElementById('calcForm').addEventListener('submit', function(e) {
        e.preventDefault();  // Impede o envio do formulário
        let num1 = parseFloat(document.getElementById('num1').value);
        let num2 = parseFloat(document.getElementById('num2').value);
        let operation = document.getElementById('operation').value;
        let result;

        // Realiza o cálculo dependendo da operação selecionada
        switch(operation) {
            case 'add':
                result = num1 + num2;
                break;
            case 'subtract':
                result = num1 - num2;
                break;
            case 'multiply':
                result = num1 * num2;
                break;
            case 'divide':
                result = num2 !== 0 ? num1 / num2 : 'Erro: Divisão por zero';
                break;
        }

        // Exibe o resultado sem recarregar a página
        const resultDiv = document.createElement('div');
        resultDiv.classList.add('result');
        resultDiv.innerHTML = `<p>Resultado: ${result}</p>`;
        document.querySelector('.calculator').appendChild(resultDiv);
    });
</script>

</body>
</html>
