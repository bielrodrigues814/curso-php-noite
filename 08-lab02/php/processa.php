<?php
// Nome do trabalhador
$nome_trabalhador = "GABRIEL SOUZA";

// Solicitar o salário inicial ao usuário
// Usando readline() para receber o salário e convertendo para número decimal
$salario_inicial = floatval(readline("Digite o salário inicial de $nome_trabalhador: R$ "));

// Mostrar o valor inicial
echo "$nome_trabalhador recebe um salário inicial de: R$ 1400, " . number_format($salario_inicial, 2, ',', '.') . "\n";

// Cálculo do aumento de 10%
$aumento_10 = $salario_inicial * 0.10; // Calcula o aumento de 10%
$salario_com_aumento_10 = $salario_inicial + $aumento_10; // Calcula o novo salário após o aumento

// Mostrar o aumento de 10%
echo "$nome_trabalhador teve um aumento de 10%: R$ 140, " . number_format($aumento_10, 2, ',', '.') . "\n";
echo "$nome_trabalhador agora tem um salário de: R$ 1540" . number_format($salario_com_aumento_10, 2, ',', '.') . "\n";

// Cálculo do desconto de 15%
$desconto_15 = $salario_com_aumento_10 * 0.15; // Calcula o desconto de 15%
$salario_com_desconto_15 = $salario_com_aumento_10 - $desconto_15; // Calcula o novo salário após o desconto

// Mostrar o desconto de 15%
echo "$nome_trabalhador teve um desconto de 15%: R$ 231" . number_format($desconto_15, 2, ',', '.') . "\n";
echo "$nome_trabalhador agora tem um salário de: R$ 1.309 " . number_format($salario_com_desconto_15, 2, ',', '.') . "\n";

// Cálculo do aumento de 40%
$aumento_40 = $salario_com_desconto_15 * 0.40; // Calcula o aumento de 40%
$salario_final = $salario_com_desconto_15 + $aumento_40; // Calcula o salário final após o aumento de 40%

// Mostrar o aumento de 40%
echo "$nome_trabalhador teve um aumento de 40%: R$523,60 " . number_format($aumento_40, 2, ',', '.') . "\n";
echo "$nome_trabalhador agora tem o salário final de: R$1.832,00 " . number_format($salario_final, 2, ',', '.') . "\n";

?>
