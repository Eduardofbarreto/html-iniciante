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

    $cash_back = [
        'gasolina' => 0.06,
        'gasolina_adt' => 0.14,
        'etanol' => 0.12,
        'diesel' => 0.10,
        'diesels10' => 0.11,
        'gas' => 0.09
    ];

    if(isset($_POST['combustivel']) && isset($_POST['litro'])){

        $combustivel = $_POST['combustivel'];
        $litro = $_POST['litro'];

        if(array_key_exists($combustivel, $precos)
            && array_key_exists($combustivel, $cash_back)){
                $preco_por_litro = $precos[$combustivel];
                $percentual_cashback = $cash_back[$combustivel];

                $valor_final = $litro * $preco_por_litro;

                $valor_cashback = $valor_final * $percentual_cashback;

                $valor_a_pagar_com_cashback = $valor_final - $valor_cashback;

                echo "Foi abastecido " . $litro . " litros de " . 
                $combustivel . ".<br>";

                echo "Num valor de R$ " . number_format($valor_final, 2, ',', '.') . ".<br>";

                echo "O seu cashback de hoje é de R$ " . number_format($valor_cashback, 2, ',', '.') . ".<br>";

                echo "Você pagará: R$ " . number_format($valor_a_pagar_com_cashback, 2, ',', '.') . ".<br>";
                
            }
    }
}
?>