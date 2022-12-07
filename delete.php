<?php
$db = new PDO('mysql:host=localhost;dbname=autovoorraad',
    "root" . "");
$query = $db->prepare("select * FROM autos");
$query->execute();
$fietsen = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    $id=filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $query = $db->prepare("DELETE FROM autos WHERE id=:id");
    $query->bindParam("id",$id);
    $query->execute();
    header('location:home.php');
}
?>
