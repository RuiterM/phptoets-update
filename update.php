<?php
$melding = "";
$db = new PDO('mysql:host=localhost;dbname=autovoorraad',
    "root" . "");
if (isset($_POST['submit'])) {
    $model = filter_input(INPUT_POST, 'Model', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'Type', FILTER_SANITIZE_STRING);
    $kleur = filter_input(INPUT_POST, 'Kleur', FILTER_SANITIZE_STRING);
    $gewicht = filter_input(INPUT_POST, 'Gewicht', FILTER_VALIDATE_FLOAT);
    $prijs = filter_input(INPUT_POST, 'Prijs', FILTER_VALIDATE_FLOAT);
    $voorraad = filter_input(INPUT_POST, 'Voorraad', FILTER_VALIDATE_FLOAT);

    $query = $db->prepare("UPDATE autos SET model = :Model, type = :Type, kleur = :Kleur, gewicht = :Gewicht, prijs = :Prijs, voorraad = :Voorraad WHERE id = :id");
    $query->bindParam("Model", $model);
    $query->bindParam("Type", $type);
    $query->bindParam("Kleur", $kleur);
    $query->bindParam("Gewicht", $gewicht);
    $query->bindParam("Prijs", $prijs);
    $query->bindParam("Gewicht", $gewicht);
    $query->bindParam("id",$_GET['id']);
    if ($query->execute()) {
        $melding = "De gegeven zijn geUpdate!";
        header('Location: home.php');
    } else {
        $melding = "Er is een fout opgetreden!";
    }
}else{
    $db = new PDO('mysql:host=localhost;dbname=autovoorraad',
        "root" . "");
    $query = $db->prepare("select * FROM autos WHERE id =". $_GET['id']);
    $query->bindParam("id", $_GET['id']);
    $query->execute();
    $autos = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($autos as $auto) {
        $model = $_POST['Model'];
        $type = $_POST['Type'];
        $kleur = $_POST['Kleur'];
        $gewicht = $_POST['Gewicht'];
        $prijs = $_POST['Prijs'];
        $voorraad = $_POST['Voorraad'];

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
<form method="post" action="">
    <label>Model</label>
    <input type="text" name="Model" value="<?php echo $model ?>"><br>
    <label>Type</label>
    <input type="text" name="Type" value="<?php echo $type ?>"><br>
    <label>Kleur</label>
    <input type="text" name="Kleur" value="<?php echo $kleur ?>"><br>
    <label>Gewicht</label>
    <input type="text" name="Gewicht" value="<?php echo $gewicht ?>"><br>
    <label>Prijs</label>
    <input type="text" name="Prijs" value="<?php echo $prijs ?>"><br>
    <label>Voorraad</label>
    <input type="text" name="Voorraad" value="<?php echo $voorraad ?>"><br>
    <input type="submit" name="submit" value="Opslaan!">
</form>
    </h4>
</div>
</html>