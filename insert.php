<?php
$melding = "";
$db = new PDO("mysql:host=localhost;dbname=autovoorraad", "root", "");
if (isset($_POST["submit"])) {
    if (!empty($_POST['Model']) && !empty($_POST['Type']) && !empty($_POST['Kleur']) && !empty($_POST['Gewicht']) && !empty($_POST['Prijs']) && !empty($_POST['Voorraad'])){

        $model = filter_input(INPUT_POST, 'Model', FILTER_SANITIZE_STRING);
        $type = filter_input(INPUT_POST, 'Type', FILTER_SANITIZE_STRING);
        $kleur = filter_input(INPUT_POST, 'Kleur', FILTER_SANITIZE_STRING);
        $gewicht = filter_input(INPUT_POST, 'Gewicht', FILTER_VALIDATE_INT);
        $prijs = filter_input(INPUT_POST, 'Prijs', FILTER_VALIDATE_INT);
        $voorraad = filter_input(INPUT_POST, 'Voorraad', FILTER_VALIDATE_INT);


        if ($gewicht === false || $prijs === false || $voorraad == false) {
            $melding = "Vul wel een getal in!";
        }elseif($voorraad < 1) {
            $melding = "Voorraad moet groter dan 1 zijn!";
        }else{

            $model = $_POST['Model'];
            $type = $_POST['Type'];
            $kleur = $_POST['Kleur'];
            $gewicht = $_POST['Gewicht'];
            $prijs = $_POST['Prijs'];
            $voorraad = $_POST['Voorraad'];


            $query = $db->prepare("INSERT INTO autos(model,type,kleur,gewicht,prijs,voorraad VALUES :model, :type, :kleur, :gewicht, :prijs, :voorraad)");

            $query->bindParam("Model", $model);
            $query->bindParam("Type", $type);
            $query->bindParam("Kleur", $kleur);
            $query->bindParam("Gewicht", $gewicht);
            $query->bindParam("Prijs", $prijs);
            $query->bindParam("Vooraad", $voorraad);

            if ($query->execute()) {
                $melding = "Gegevens zijn toegevoegd!";
            }
            }
        }else {
        $melding = "Vul alles in!";
    }

    }
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<html>
<br>
<div class="container">
<h4>
    <form method="post">
        <label>Voeg een auto toe!</label><br>
    <table class="table">
        <tr>
            <td>Model</td>
            <td>Type</td>
            <td>Kleur</td>
            <td>Gewicht</td>
            <td>Prijs</td>
            <td>Voorraad</td>
        </tr>
        <tr>
            <td><input type="text" placeholder="Model" name="Model"></td>
            <td><input type="text" placeholder="Type" name="Type"></td>
            <td><input type="text" placeholder="Kleur" name="Kleur"></td>
            <td><input type="text" placeholder="Gewicht" name="Gewicht"></td>
            <td><input type="text" placeholder="Prijs" name="Prijs"></td>
            <td><input type="text" placeholder="Voorraad" name="Voorraad"></td>
        </tr>
    </table>
    <button class="btn btn-dark" type="submit" name="submit"">Toevoegen!</button>
    </form>
    <br>
    <?php echo $melding ?>
</h4>
</div>
</html>
