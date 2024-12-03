<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pegando o número fornecido pelo usuário
    $numero_inicial = $_POST['numero'];

    // Definindo o número de termos para PA e PG
    $num_termos = 10;
    $razao_pa = 2; // Razão da PA
    $razao_pg = 2; // Razão da PG

    // Calculando a Progressão Aritmética (PA)
    $pa = [];
    for ($i = 0; $i < $num_termos; $i++) {
        $pa[] = $numero_inicial + ($i * $razao_pa);
    }

    // Calculando a Progressão Geométrica (PG)
    $pg = [];
    for ($i = 0; $i < $num_termos; $i++) {
        $pg[] = $numero_inicial * pow($razao_pg, $i);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progressões Aritmética e Geométrica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        input[type="number"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 16px;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }

        .button:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 30px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .result h3 {
            margin-bottom: 10px;
        }

        .result ul {
            padding-left: 20px;
        }

        .result li {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Progressões Aritmética e Geométrica</h1>
    <form method="POST">
        <div class="input-group">
            <label for="numero">Digite um número inicial:</label>
            <input type="number" id="numero" name="numero" required min="1">
        </div>
        <button type="submit" class="button">Calcular</button>
    </form>

    <?php if (isset($pa) && isset($pg)): ?>
        <div class="result">
            <h3>Progressão Aritmética (PA):</h3>
            <ul>
                <?php foreach ($pa as $valor): ?>
                    <li><?php echo $valor; ?></li>
                <?php endforeach; ?>
            </ul>

            <h3>Progressão Geométrica (PG):</h3>
            <ul>
                <?php foreach ($pg as $valor): ?>
                    <li><?php echo $valor; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
