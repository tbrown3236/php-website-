<?php
require "includes/db_connect.php";

$article_id = $_GET["article_id"];


$sql = "DELETE FROM articles WHERE article_id=$article_id";
//echo $sql . "</br>"; //debuging only
$result = $mysqli->query( $sql );
echo $result;
echo $mysqli->error;

header("location: /articles.php");

$mysqli->close();
?>