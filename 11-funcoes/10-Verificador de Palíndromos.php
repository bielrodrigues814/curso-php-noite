<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obter o texto inserido
    $input = $_POST['text'];

    // Normalizar: remover caracteres não alfanuméricos e converter para minúsculas
    $normalized = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($input));

    // Inverter a string
    $reversed = strrev($normalized);

    // Verificar se é um palíndromo
    $isPalindrome = $normalized === $reversed;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Palíndromos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #007bff;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center">Verificador de Palíndromos</h1>
    <p class="text-center text-muted">Digite uma palavra ou frase para verificar se é um palíndromo.</p>

    <form method="post" class="shadow-lg p-4 bg-white rounded">
        <div class="mb-3">
            <label for="text" class="form-label">Texto</label>
            <input type="text" id="text" name="text" class="form-control" placeholder="Digite aqui..." required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Verificar</button>
    </form>

    <?php if (isset($isPalindrome)): ?>
        <div class="mt-4 text-center">
            <?php if ($isPalindrome): ?>
                <div class="alert alert-success">
                    <strong>✔️</strong> O texto "<?php echo htmlspecialchars($input); ?>" é um palíndromo!
                </div>
            <?php else: ?>
                <div class="alert alert-danger">
                    <strong>❌</strong> O texto "<?php echo htmlspecialchars($input); ?>" não é um palíndromo.
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
