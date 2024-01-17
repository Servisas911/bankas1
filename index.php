<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bankas</title>
</head>
<body>
    <h1>Saskaitu sarasas</h1>
    <ul>
        <?php
            $accounts = json_decode(file_get_contents('accounts.json'), true);

            usort($accounts, function($a, $b) {
                return strcmp($a['pavarde'], $b['pavarde']);
            });

            foreach ($accounts as $account) {
                echo "<li>{$account['vardas']} {$account['pavarde']} ";
                echo "<a href='add_funds.php?account_id={$account['sąskaitos_numeris']}'>Prideti lesu</a> ";
                echo "<a href='withdraw_funds.php?account_id={$account['sąskaitos_numeris']}'>Nuskaiciuoti lesas</a> ";
                echo "<a href='delete_account.php?account_id={$account['sąskaitos_numeris']}'>Istrinti</a></li>";
            }
        ?>
    </ul>
    <a href="create_account.php">Nauja sąskaita</a>
</body>
</html>

