<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Base Numérica</title>
</head>
<body style="font-family: Arial, sans-serif; text-align: center; background-color: #f4f4f4; padding: 20px;">

    <h1>Conversor de Base Numérica</h1>
    <form method="POST">
        <label for="number">Digite um número decimal:</label><br>
        <input type="number" id="number" name="number" required style="padding: 10px; width: 200px; margin: 10px;"><br>
        
        <label for="base">Escolha a base:</label><br>
        <select id="base" name="base" style="padding: 10px; width: 220px; margin: 10px;">
            <option value="binary">Binário</option>
            <option value="octal">Octal</option>
            <option value="hexadecimal">Hexadecimal</option>
        </select><br>
        
        <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px;">Converter</button>
    </form>

    <div style="margin-top: 20px; font-size: 18px;">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $number = intval($_POST['number']); // Número inserido
            $base = $_POST['base']; // Base escolhida

            if ($base === 'binary') {
                $converted = decbin($number); // Decimal para Binário
                echo "<p>O número <strong>$number</strong> em binário é: <strong>$converted</strong></p>";
            } elseif ($base === 'octal') {
                $converted = decoct($number); // Decimal para Octal
                echo "<p>O número <strong>$number</strong> em octal é: <strong>$converted</strong></p>";
            } elseif ($base === 'hexadecimal') {
                $converted = strtoupper(dechex($number)); // Decimal para Hexadecimal
                echo "<p>O número <strong>$number</strong> em hexadecimal é: <strong>$converted</strong></p>";
            } else {
                echo "<p>Base inválida!</p>";
            }
        }
        ?>
    </div>

</body>
</html>
