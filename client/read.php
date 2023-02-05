<link rel="stylesheet" href="../style/style.css">
<link rel="shortcut icon" href="img/favicon.avif" type="image/x-icon">
<?php

require('lib/console_log.php');
require('config/config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$dbCharset";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
} catch (PDOException $e) {
    echo "<h1>Er is iets fout gegaan tijdens het verbinden met de database. Neem contact op met de Database Beheerder.</h1>";
    console_log($e->getMessage());
}

$sql = "SELECT id
              ,bodemFormaat
              ,saus
              ,topping
              ,kruiden
        FROM pizza
        ORDER BY id";

$statement = $pdo->prepare($sql);
$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $pizza) {
    $rows .= "<tr>
                <td>$pizza->id</td>
                <td>$pizza->bodemFormaat</td>
                <td>$pizza->saus</td>
                <td>$pizza->topping</td>
                <td>$pizza->kruiden</td>
                <td>
                    <a href='delete.php?id={$pizza->id}'>
                        <img src='img/b_drop.png' alt=''>
                    </a>
                </td>
                <td>
                    <a href='update.php?id={$pizza->id}'>
                        <img src='img/b_edit.png' alt=''>
                    </a>
                </td>
             </tr>";
}
?>
<div class="card">
    <h1>Overzicht van je eigen pizza's</h1>
    <table>
        <th>ID</th>
        <th>Bodem Formaat</th>
        <th>Saus</th>
        <th>Topping</th>
        <th>Kruiden</th>
        <th></th>
        <th></th>
        <tr>
            <?php echo $rows; ?>
        </tr>
    </table>
    <br>
    <div class="buttons">
        <a href="../index.php">
            <input type="submit" value="Nieuwe Pizza">
        </a>
        <a href="truncate.php">
            <input type="submit" class="truncate" value="Truncate">
        </a>
    </div>
</div>