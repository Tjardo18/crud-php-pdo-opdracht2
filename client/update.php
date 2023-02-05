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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $kruiden = $_POST['kruiden'];

        $kruid = "";
        foreach ($kruiden as $kruid1) {
            $kruid .= $kruid1 . ", ";
        }
        $kruiden1 = rtrim($kruid, ", ");

        $sql = "UPDATE pizza SET 
                                bodemFormaat = :bf
                                ,saus = :ss
                                ,topping = :tg
                                ,kruiden = :kn
                WHERE id = :id;";

        $yee = $pdo->prepare($sql);
        $yee->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $yee->bindValue(':bf', $_POST['bodemformaat'], PDO::PARAM_STR);
        $yee->bindValue(':ss', $_POST['saus'], PDO::PARAM_STR);
        $yee->bindValue(':tg', $_POST['pizzatoppings'], PDO::PARAM_STR);
        $yee->bindValue(':kn', $kruiden1, PDO::PARAM_STR);
        $yee->execute();

        echo "Het updaten is gelukt!";
        header('Refresh:3; url=read.php');
    } catch (PDOException $e) {
        // error
        echo "Het updaten is mislukt!";
        console_log($e->getMessage());
        header('Refresh:3; url=read.php');
    }

    exit();
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow+Condensed">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="img/favicon.avif" type="image/x-icon">
    <link rel="stylesheet" href="../style/style.css">
    <title>Update</title>
</head>

<body>

    <div class="card">
        <h1>
            <i class='bx bxs-pizza bx-flip-horizontal'></i>
            Update je eigen pizza
            <i class='bx bxs-pizza'></i>
        </h1>
        <form action="update.php" method="POST">

            <div class="bodemformaat">
                <label for="bodemformaat">
                    Bodemformaat:
                    <select name="bodemformaat" id="bodemformaat" required>
                        <option hidden>Maak je keuze</option>
                        <option value="20">20 centimeter</option>
                        <option value="25">25 centimeter</option>
                        <option value="30">30 centimeter</option>
                        <option value="35">35 centimeter</option>
                        <option value="40">40 centimeter</option>
                    </select>
                </label>
            </div>

            <div class="saus">
                <label for="saus">
                    Saus:
                    <select name="saus" id="saus" required>
                        <option hidden>Maak je keuze</option>
                        <option value="tomaat">Tomatensaus</option>
                        <option value="extraTomaat">Extra tomatensaus</option>
                        <option value="spicyTomaat">Spicy tomatensaus</option>
                        <option value="BBQ">BBQ saus</option>
                        <option value="cremeFraiche">Crème Fraîche</option>
                    </select>
                </label>
            </div>

            <div class="pizzatopping">
                <label for="pizzatoppings">
                    Pizzatoppings:<br>
                </label>
                <input type="radio" id="pizzatoppings" name="pizzatoppings" value="vegan">
                <label for="vegan">Vegan</label><br>
                <input type="radio" id="pizzatoppings" name="pizzatoppings" value="vegetarisch">
                <label for="vegetarisch">Vegetarisch</label><br>
                <input type="radio" id="pizzatoppings" name="pizzatoppings" value="vlees">
                <label for="vlees">Vlees</label>
            </div>

            <div class="kruiden">
                <label for="kruiden">
                    Kruiden:<br>
                    <input type="checkbox" id="kruiden" name="kruiden[]" value="peterselie">
                    <label for="peterselie">Peterselie</label><br>

                    <input type="checkbox" id="kruiden" name="kruiden[]" value="oregano">
                    <label for="oregano">Oregano</label><br>

                    <input type="checkbox" id="kruiden" name="kruiden[]" value="chiliFlakes">
                    <label for="chiliFlakes">Chili Flakes</label><br>

                    <input type="checkbox" id="kruiden" name="kruiden[]" value="zwartePeper">
                    <label for="zwartePeper">Zwarte Peper</label><br>
                </label>
            </div>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <input type="submit" value="Update">
        </form>
    </div>
</body>

</html>