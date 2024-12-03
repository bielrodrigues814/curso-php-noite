<?php
echo "Classificação de Idades\n";
echo "Insira a idade de 5 pessoas para classificá-las como:\n";
echo "- Criança (0 a 12 anos)\n";
echo "- Adolescente (13 a 17 anos)\n";
echo "- Adulto (18 a 59 anos)\n";
echo "- Idoso (60 anos ou mais)\n\n";

for ($i = 1; $i <= 5; $i++) {
    echo "Digite a idade da pessoa $i: ";
    $idade = trim(fgets(STDIN));

    // Verifica se é um número válido
    if (!is_numeric($idade) || $idade < 0) {
        echo "Idade inválida! Por favor, insira um número positivo.\n";
        $i--; // Repetir a iteração para corrigir o erro
        continue;
    }

    // Converte a idade para inteiro
    $idade = (int)$idade;

    // Classifica a idade
    if ($idade <= 12) {
        echo "Pessoa $i: $idade anos - Criança\n";
    } elseif ($idade <= 17) {
        echo "Pessoa $i: $idade anos - Adolescente\n";
    } elseif ($idade <= 59) {
        echo "Pessoa $i: $idade anos - Adulto\n";
    } else {
        echo "Pessoa $i: $idade anos - Idoso\n";
    }
}
?>
