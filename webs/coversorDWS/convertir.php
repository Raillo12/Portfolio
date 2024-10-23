<?php
// Ver que se ejecuta en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sacamos variables
    $moneda = $_POST['moneda'];
    $cantidad = $_POST['cantidad'];

    // Condicional múltiple que hace los cálculos correspondientes
    switch ($moneda) {
        case "euro":
            $dolares = $cantidad * 1.10; // Tasa de cambio: 1 EUR = 1.10 USD
            $libras = $cantidad * 0.84;   // Tasa de cambio: 1 EUR = 0.84 GBP
            $yenes = $cantidad * 161.80;  // Tasa de cambio: 1 EUR = 161.80 JPY

            echo "
            <style>
                body {
                    background-color: cadetblue;
                }
            </style>
            <h1 style='text-align: center'>Resultado</h1>
            <h2 style='text-align: center'>Dolares: " . number_format($dolares, 2) . "<br>
            Libras: " . number_format($libras, 2) . "<br>
            Yenes: " . number_format($yenes, 2) . "</h2>";
            break;

        case "dolar":
            $euros = $cantidad * 0.90;    // Tasa de cambio: 1 USD = 0.90 EUR
            $libras = $cantidad * 0.84;    // Tasa de cambio: 1 USD = 0.84 GBP
            $yenes = $cantidad * 146.78;   // Tasa de cambio: 1 USD = 146.78 JPY

            echo "
            <style>
                body {
                    background-color: cadetblue;
                }
            </style>
            <h1 style='text-align: center'>Resultado</h1>
            <h2 style='text-align: center'>Euros: " . number_format($euros, 2) . "<br>
            Libras: " . number_format($libras, 2) . "<br>
            Yenes: " . number_format($yenes, 2) . "</h2>";
            break;

        case "libras":
            $dolares = $cantidad * 1.10; // Tasa de cambio: 1 GBP = 1.10 USD
            $euros = $cantidad * 1.19;    // Tasa de cambio: 1 GBP = 1.19 EUR
            $yenes = $cantidad * 161.80;   // Tasa de cambio: 1 GBP = 161.80 JPY

            echo "
            <style>
                body {
                    background-color: cadetblue;
                }
            </style>
            <h1 style='text-align: center'>Resultado</h1>
            <h2 style='text-align: center'>Dolares: " . number_format($dolares, 2) . "<br>
            Euros: " . number_format($euros, 2) . "<br>
            Yenes: " . number_format($yenes, 2) . "</h2>";
            break;

        case "yenes":
            $dolares = $cantidad * 0.0071; // Tasa de cambio: 1 JPY = 0.0071 USD
            $libras = $cantidad * 0.0057;   // Tasa de cambio: 1 JPY = 0.0057 GBP
            $euros = $cantidad * 0.0062;    // Tasa de cambio: 1 JPY = 0.0062 EUR

            echo "
            <style>
                body {
                    background-color: cadetblue;
                }
            </style>
            <h1 style='text-align: center'>Resultado</h1>
            <h2 style='text-align: center'>Dolares: " . number_format($dolares, 2) . "<br>
            Libras: " . number_format($libras, 2) . "<br>
            Euros: " . number_format($euros, 2) . "</h2>";
            break;

        default:
            echo "<h2 style='text-align: center'>Moneda no reconocida.</h2>";
            break;
    }
}
?>
