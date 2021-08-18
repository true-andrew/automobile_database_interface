<?php

$user = "root";
$password = "@yLHtq12";

try {
    $db = new PDO("mysql:host=localhost; dbname=automanufacture", $user, $password);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
