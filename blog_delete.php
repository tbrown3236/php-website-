<?php
require "includes/db_connect.php";

$blog_id = $_GET["blog_id"];


$sql = "DELETE FROM blogs WHERE blog_id=$blog_id";
//echo $sql . "</br>"; //debuging only
$result = $mysqli->query( $sql );
echo $result;
echo $mysqli->error;

header("location: /blog.php");

$mysqli->close();
?>