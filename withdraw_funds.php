<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: index.php');
    exit;
}

$account_id = $_GET['account_id'] ?? null;
$accounts = json_decode(file_get_contents('accounts.json'), true);
$selected_account = null;

foreach ($accounts as $account) {
    if ($account['sąskaitos_numeris'] == $account_id) {
        $selected_account = $account;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuskaiciuoti lesas</title>
</head>
<body>
    <h1>Nuskaiciuoti lesas</h1>

    <?php if ($selected_account): ?>
        <p>Savininko vardas: <?= $selected_account['vardas'] ?></p>
        <p>Savininko pavarde: <?= $selected_account['pavarde'] ?></p>
        <p>Sąskaitos likutis: <?= $selected_account['likutis'] ?></p>

        <form action="" method="post">
            <label for="suma">Suma:</label>
            <input type="number" name="suma" required>
            <button type="submit">Nuskaiciuoti lesas</button>
        </form>
    <?php else: ?>
        <p>Saskaita nerasta.</p>
    <?php endif; ?>
</body>
</html>
