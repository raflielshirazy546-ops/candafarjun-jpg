<?php
class//ini adalah kalkulator suhu
if (isset($_POST['celsius'])) {
    $c = $_POST['celsius'];
    $fahrenheit = ($c * 9/5) + 32;
    $kelvin = $c + 273.15;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Suhu</title>
</head>
<body>
    <h2>Kalkulator Suhu (PHP)</h2>

    <form method="post">
        <label>Masukkan Suhu Celsius:</label><br>
        <input type="number" name="celsius" step="any" required>
        <br><br>
        <button type="submit">Hitung</button>
    </form>

    <?php if (isset($fahrenheit)) { ?>
        <h3>Hasil:</h3>
        <p>Fahrenheit: <?= $fahrenheit ?></p>
        <p>Kelvin: <?= $kelvin ?></p>
    <?php } ?>
</body>
</html>

