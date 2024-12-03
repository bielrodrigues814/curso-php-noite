<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Números Primos</title>
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
        input[type="number"] {
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            width: 200px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #61dafb;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            margin-left: 10px;
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
    <h1>Calculadora de Números Primos</h1>
    <form method="POST">
        <label for="number">Digite um número:</label><br>
        <input type="number" name="number" id="number" required>
        <button type="submit">Verificar</button>
    </form>

    <div class="result">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $number = intval($_POST['number']);
            $isPrime = true;

            if ($number < 2) {
                $isPrime = false;
            } else {
                for ($i = 2; $i <= sqrt($number); $i++) {
                    if ($number % $i == 0) {
                        $isPrime = false;
                        break;
                    }
                }
            }

            if ($isPrime) {
                echo "<p style='color: green;'>{$number} é um número primo!</p>";
            } else {
                echo "<p style='color: red;'>{$number} não é um número primo.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
