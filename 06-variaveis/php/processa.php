<?php
//Usando variável do tipo Boolean(verdadeiro ou falso):
$logado = true;

if ($logado){
    echo "Bem Vindo ao Painel de Controle.";
} else {
    echo "Você não está logado. Faça login!";
}
//==================
echo "<hr>";
//Ponto Flutuante:
$altura = 1;
echo "Altura: $altura m"; //Saída: altura: 1.85m
//==================
echo "<hr>";
//Integer
$idade = 17.5;
echo "Idade: $idade";
//==================
echo "<hr>";
//Array:
$filhos = [ "João", "Maria", "Pedro", "Ana"];
echo $filhos[0];
//==================
echo "<hr>";
//Objeto:
class Pessoa {
    public $nome;
    public $idade;

    public function __construct($nome, $idade){
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function apresentar(){
        return "Olá, meu nome é  $this->nome e tenho $this->idade anos.";
    }


}
   $pessoa = new pessoa("Thiago", 40);
   echo $pessoa->apresentar();

?>