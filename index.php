<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Pizza Maken</title>
</head>

<body>
    <div class="create">
        <h1>Maak je eigen pizza</h1>
        <form action="createPizza.php" method="POST">

            <div class="bodemformaat">
                <label for="bodemformaat">
                    Bodemformaat:
                    <select name="bodemformaat" id="bodemformaat">
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
                    <select name="saus" id="saus">
                        <option hidden>Maak je keuze</option>
                        <option value="TO">Tomatensaus</option>
                        <option value="ExTo">Extra tomatensaus</option>
                        <option value="ST">Spice tomatensaus</option>
                        <option value="BS">BBQ saus</option>
                        <option value="CF">Crème Fraîche</option>
                    </select>
                </label>
            </div>

            <div class="pizzatopping">
                <label for="pizzatoppings">
                    Pizzatoppings:<br>
                    <input type="radio" id="vegan" name="pizzatopping1" value="vegan">
                    <label for="vegan">Vegan</label><br>
                    <input type="radio" id="vegetarisch" name="pizzatopping2" value="vegetarisch">
                    <label for="vegetarisch">Vegetarisch</label><br>
                    <input type="radio" id="vlees" name="pizzatopping3" value="vlees">
                    <label for="vlees">Vlees</label>
                </label>
            </div>

            <div class="kruiden">
                <label for="kruiden">
                    Kruiden:<br>
                    <input type="checkbox" id="peterselie" name="kruid1" value="peterselie">
                    <label for="peterselie">Peterselie</label><br>

                    <input type="checkbox" id="oregano" name="kruid2" value="oregano">
                    <label for="oregano">Oregano</label><br>

                    <input type="checkbox" id="chiliFlakes" name="kruid3" value="chiliFlakes">
                    <label for="chiliFlakes">Chili Flakes</label><br>

                    <input type="checkbox" id="zwartePeper" name="kruid4" value="zwartePeper">
                    <label for="zwartePeper">Zwarte Peper</label><br>
                </label>
            </div>

            <input type="submit" value="Bestel">
        </form>
    </div>
</body>

</html>