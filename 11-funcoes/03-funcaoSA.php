<?php
function login() {
  $logado= true;
  
  if($logado){
    echo"painel de controle";
  }else{
    echo "faça login para acessar o cpanel";
  }
}
echo login();