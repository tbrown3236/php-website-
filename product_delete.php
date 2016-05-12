<?php
require "includes/db_connect.php";

$product_id = $_GET["product_id"];


$sql = "DELETE FROM products WHERE product_id=$product_id";
//echo $sql . "</br>"; //debuging only
$result = $mysqli->query( $sql );
echo $result;
echo $mysqli->error;

header("location: /products.php");

$mysqli->close();
?>