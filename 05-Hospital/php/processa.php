<?php
function calcularIdadeDetalhada($dataNascimento) {
    // Cria um objeto DateTime com a data de nascimento
    $nascimento = new DateTime($dataNascimento);
    // Cria um objeto DateTime com a data atual
    $hoje = new DateTime();
    // Calcula a diferença entre a data atual e a data de nascimento
    $diferenca = $hoje->diff($nascimento);

    // Retorna os anos, meses e dias como uma string formatada
    return "Você tem " . $diferenca->y . " anos, " . $diferenca->m . " meses e " . $diferenca->d . " dias.";
}

// Exemplo de uso da função
$dataNascimento = "1990-06-15"; // Data de nascimento no formato AAAA-MM-DD
echo calcularIdadeDetalhada($dataNascimento);
?>
[21:43, 11/12/2024] Thaigo: https://www.diffchecker.com/text-compare/
[21:48, 11/12/2024] Thaigo: <?php
function calcularIdade($dn){

    //Criando objeto data e hora:
$dn = new DateTime($dn);

//Criando data e hora atual:
$hoje = new DateTime();

//Calcular diferença entre as datas:
$diferenca = $hoje->diff($dn);

//Retornar anos, meses e dias:
return "Você tem " .$diferenca->y . " anos, " .$diferenca->m . "
meses e " .$diferenca->d . " dias.";
    
}

//Exemplo de uso da função:
$dn  = "2008-09-09";
echo calcularIdade($dn);



?>