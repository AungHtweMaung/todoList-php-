<?php
require("./config.php");
$id = $_GET["id"];
$pdostatement = $pdo->prepare("DELETE FROM todo WHERE id='$id'");
$result = $pdostatement->execute();

if ($result) {
    echo "<script>alert('$title is deleted');window.location.href='index.php'</script>";
}