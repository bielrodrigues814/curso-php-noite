<?php
$dia = "sabádo";

switch ($dia) {
    case "segunda":
        echo "Hoje é o primeiro dia útil da semana.";
        break;

            case "terça-feira":
        echo "Hoje é o segundo dia útil da semana.";
        break;

            case "quarta-feira":
        echo "Hoje é o terceiro dia útil da semana.";
        break;
        
    case "quinta-feira":
        echo "Hoje é o quarta dia útil da semana.";
        break;
        

    case "sexta-feira":
        echo "Hoje é o quinto dia útil da semana.";
        break; 
        
        
    case "sábado":
    case " domingo":
        echo "É fim de semana!";
        break;

     default:
        echo "É um dia útil qualquer.";
}   
?>