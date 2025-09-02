<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $precos = [
        'gasolina' => 5.69,
        'gasolina_adt' => 5.85,
        'etanol' => 4.35,    
        'diesel' => 5.59,     
        'diesels10' => 5.79,  
        'gas' => 4.20         
    ];

    if(isset($_POST['combustivel']) && isset($_POST['litro'])){

        $combustivel = $_POST['combustivel'];
        $litro = $_POST['litro'];

        if(array_key_exists($combustivel, $precos)){
            // Get the price for the selected fuel
            $preco_por_litro = $precos[$combustivel];
            
            $valor_final = $litro * $preco_por_litro;

            echo "Foi abastecido " . $litro . " litros de " . $combustivel . ".<br>";
            echo "O preço por litro é de R$" . number_format($preco_por_litro, 2, ',', '.') . ".<br>"; 
            echo "Você tem que pagar R$" . number_format($valor_final, 2, ',', '.') . ".";
        } else {
            echo "Combustível inválido!";
        }
    } else {
        echo "Valor inválido!";
    }
}

?>