<?php
/**
 * Created by PhpStorm.
 * User: terry
 * Date: 12/2/2015
 * Time: 8:21 PM
 */
$page_title = "Products";
require "includes/header.php";
require "includes/db_connect.php";


$name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];
$cost = $_POST["cost"];
$qty = $_POST["qty"];
$category = $_POST["category"];
$modified_date = $_POST["modified_date"];

if ($submit) {

    $timestamp = date_create();
    $timestamp = $timestamp->format("Y-m-d H:i:s");
    $sql = "INSERT INTO products  (product_id, name, description, price,cost,qty,category, modified_date)
        VALUES (null, '$name', '$description', '$price','$cost','$qty','$category' '$timestamp')";
//  echo $sql . "</br>";
    $result = $mysqli->query($sql);
    $article_id = $mysqli->insert_id;
//  echo $mysqli->error;
    ob_clean();
    header("location: /product_show.php?product_id=$product_id");
}

$detail =<<<END_OF_DETAIL
  <form id="style", method="post" action="/product_edit.php?product_id=$product_id">
  <label for="name">Your Name: </label>
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

<input type="submit" name="submit" value="Create New Product">
</form>
END_OF_DETAIL;
echo $detail;







?>

<?php require "includes/footer.php" ;
$mysqli->close();
?>
