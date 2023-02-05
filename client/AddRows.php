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

$sql = "INSERT INTO pizza (id ,bodemFormaat ,saus ,topping ,kruiden) 
        VALUES 
        (NULL ,20 ,'spicyTomaat' ,'vlees' ,'chiliFlakes, zwartePeper'),
        (NULL ,40 ,'tomaat' ,'vegan' ,'peterselie, oregano, chiliFlakes'),
        (NULL ,35 ,'cremeFraiche' ,'vlees' ,'peterselie, zwartePeper'),
        (NULL ,30 ,'BBQ' ,'vegetarisch' ,'peterselie, oregano');";
        
$statement = $pdo->prepare($sql);

$statement->execute();

echo 'Het invoeren is gelukt!';

header('Location: read.php');
