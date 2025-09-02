<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Define the fuel prices in an associative array
    $precos = [
        'gasolina' => 5.50,   // Example price for gasoline
        'etanol' => 3.99,     // Example price for ethanol
        'diesel' => 4.80,     // Example price for diesel
        'diesels10' => 4.95,  // Example price for diesel S10
        'gas' => 4.20         // Example price for gas
    ];

    if(isset($_POST['combustivel']) && isset($_POST['litro'])){

        $combustivel = $_POST['combustivel'];
        $litro = $_POST['litro'];
        
        // Check if the selected fuel exists in our prices array
        if(array_key_exists($combustivel, $precos)){
            // Get the price for the selected fuel
            $preco_por_litro = $precos[$combustivel];
            
            // Calculate the total value
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