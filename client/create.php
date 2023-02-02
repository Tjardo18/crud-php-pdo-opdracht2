<?php

require('lib/console_log.php');
require('config/config.php');
require('config/input.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$dbCharset";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
} catch (PDOException $e) {
    echo "<h1>Er is iets fout gegaan tijdens het verbinden met de database. Neem contact op met de Database Beheerder.</h1>";
    console_log($e->getMessage());
}

$sql = "INSERT INTO pizza (id
                          ,bodemFormaat
                          ,saus
                          ,topping
                          ,kruiden)
        VALUES            (NULL
                          ,:bmft
                          ,:ss
                          ,:tg
                          ,:kn);";

$statement = $pdo->prepare($sql);

$statement->bindValue(':bmft', $formaat, PDO::PARAM_STR);
$statement->bindValue(':ss', $saus, PDO::PARAM_STR);
$statement->bindValue(':tg', $topping, PDO::PARAM_STR);
$statement->bindValue(':kn', $kruiden, PDO::PARAM_STR);

$statement->execute();

echo 'Het invoeren is gelukt!';

header('Location: read.php');