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
    <title>prideti lesas</title>
</head>
<body>
    <h1>Prideti lesas</h1>
    <form action="" method="post">
        <label for="suma">Suma:</label>
        <input type="number" name="suma" required>
        <button type="submit">Prideti lesas</button>
    </form>
</body>
</html>
