<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nauja saskaita</title>
</head>
<body>
    <h1>Nauja saskaita</h1>
    <form action="" method="post">
        <label for="vardas">Vardas:</label>
        <input type="text" name="vardas" required>
        <button type="submit">Sukurti sąskaita</button>
    </form>
</body>
</html>
