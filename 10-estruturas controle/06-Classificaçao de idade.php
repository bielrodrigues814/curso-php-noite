<?php
// Definir a categoria com base na idade
$category = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $age = $_POST['age'];
    
    // Lógica para classificação de idades
    if ($age >= 0 && $age <= 12) {
        $category = 'Criança';
    } elseif ($age >= 13 && $age <= 17) {
        $category = 'Adolescente';
    } elseif ($age >= 18 && $age <= 59) {
        $category = 'Adulto';
    } elseif ($age >= 60) {
        $category = 'Idoso';
    } else {
        $category = 'Idade inválida';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificação de Idade - Interface Moderna</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Estilos gerais */
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
            transition: background 0.5s ease;
        }
        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            width: 320px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .container:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            letter-spacing: 2px;
            color: #fff;
        }
        input[type="number"] {
            width: 100%;
            padding: 15px;
            border-radius: 8px;
            border: 2px solid #fff;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 16px;
            margin: 10px 0;
            outline: none;
            transition: all 0.3s ease;
        }
        input[type="number"]:focus {
            border-color: #ff7e5f;
            background-color: rgba(255, 255, 255, 0.2);
        }
        button {
            width: 100%;
            padding: 15px;
            background-color: #ff7e5f;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #feb47b;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: 600;
            padding: 15px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
        .error {
            color: #ff4d4d;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Classificação de Idade</h1>
    <form method="POST" id="ageForm">
        <input type="number" name="age" placeholder="Digite sua idade" required>
        <button type="submit">Classificar</button>
    </form>

    <?php if (isset($category)): ?>
        <div class="result">
            <?php if ($category == 'Idade inválida'): ?>
                <p class="error"><?php echo $category; ?></p>
            <?php else: ?>
                <p>A classificação de idade é: <strong><?php echo $category; ?></strong></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
