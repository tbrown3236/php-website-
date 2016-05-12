<?php


ob_start();
$page_title = "Edit Product";
require "includes/header.php";
require "includes/db_connect.php";

$product_id = $_GET["product_id"];
$submit = $_POST["submit"];

if ($submit) {
  $name = $_POST["name"];
  $description = $_POST["description"];
  $price = $_POST["price"];
  $cost = $_POST["cost"];
  $qty = $_POST["qty"];
  $category = $_POST["category"];
  $modified_date = $_POST["modified_date"];

    $timestamp = date_create();
    $timestamp = $timestamp->format("Y-m-d H:i:s");
  $sql = "UPDATE products SET name='$name', description='$description', price='$price', cost='$cost',qty='$qty',category='$category',modified_at='$modified_at'
          WHERE product_id='$product_id';";
  $result = $mysqli->query( $sql );
  ob_clean();
  header("location: /product_show.php?product_id=$product_id&$cache_buster");
}

$sql = "SELECT * from products WHERE product_id=$product_id";
echo $sql . "</br>"; //debuging only
$result = $mysqli->query( $sql );
list($product_id, $name, $description, $price, $cost, $qty, $category, $modified_date) = $result->fetch_row();


$detail =<<<END_OF_DETAIL
  <form id="style", method="post" action="/product_edit.php?product_id=$product_id">
  <label for="name">Product Name: </label>
  <input id="name" name="name" type=text value="$name"></br>
  <label for="description">description: </label>
  <input id="description" name="description" type=text value="$description"></br>
  <label for="price">price: </label>
  <input id="price" name="price" type=text value="$price"></br>
  <label for="cost">cost: </label>
  <input id="cost" name="cost" type=text value="$cost"></br>
 <label for="qty">qty: </label>
  <input id="qty" name="qty" type=text value="$qty"></br>
  <label for="category">category: </label>
  <input id="category" name="category" type=text value="$category"></br>
  <label for="modified_date">modified date: </label>
  <input id="modified_date" name="modified_date" type=timestamp value="$modified_date"></br>


  <a href="/products.php?$cache_buster">List All Products</a>

<input type="submit" name="submit" value="Update Products">
</form>
END_OF_DETAIL;
echo $detail;






require "includes/footer.php";
$mysqli->close();
ob_end_flush();

?>