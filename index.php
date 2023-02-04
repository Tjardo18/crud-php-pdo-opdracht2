<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="client/img/favicon.avif" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <title>Pizza Maken</title>
</head>

<body>
    <div class="card">
        <h1>
            <i class='bx bxs-pizza bx-flip-horizontal'></i>
            Maak je eigen pizza
            <i class='bx bxs-pizza'></i>
        </h1>
        <form action="client/create.php" method="POST">

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

            <input type="submit" value="Bestel">
        </form>
    </div>
</body>

</html>