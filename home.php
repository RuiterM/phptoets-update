<?php

$db = new PDO("mysql:host=localhost;dbname=autovoorraad", "root", "");
$query = $db->prepare("SELECT * FROM autos");
$query->execute();
$autos = $query->fetchAll(PDO::FETCH_ASSOC);
$teller = 1;

echo "<div class='container'>";
echo "<table class='table'>";
echo "<tr>";
echo "<td>nummer</td>";
echo "<td>Model</td>";
echo "<td>Type</td>";
echo "<td>Prijs(euro)</td>";
echo "<td>Detail</td>";
echo "<td>Update</td>";
echo "<td>Delete</td>";

echo "</tr>";

foreach ($autos as $auto) {
    echo "<tr>";
    echo "<td>". $teller."</td>";
    echo "<td>". $auto['model']."</td>";
    echo "<td>". $auto['type']."</td>";
    echo "<td>". number_format($auto['prijs'])."</td>";
    echo "<td>";
    echo "<a href='detail.php?id=".$auto['id']."'>";
    echo "Detail";
    echo "</td>";
    echo "<td>";
    echo "<a href='Update.php?id=".$auto['id']."'>";
    echo "Update";
    echo "</td>";
    echo "<td>";
    echo "<a href='Delete.php?id=".$auto['id']."'>";
    echo "Delete";
    echo "</td>";
    $teller++;
}
echo "</table>";

?>


<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<html>
<a href="insert.php" style="text-decoration: none">Insert</a>
</html>