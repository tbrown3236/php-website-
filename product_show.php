<?php

$page_title = "Products Show";
require "includes/header.php";
require "includes/db_connect.php";
require "includes/useful_functions.php";
$product_id = $_GET["product_id"];

$submit = $_POST["submit"];
if ($submit) {
  $author = mysqli_real_escape_string($mysqli, $_POST["author"]);
  $review = mysqli_real_escape_string($mysqli, $_POST["Review"]);
  $rating = mysqli_real_escape_string($mysqli, $_POST["rating"]);

  $timestamp = date_create();
  $timestamp = $timestamp->format("Y-m-d H:i:s");
  $sql = "INSERT INTO reviews  (author, review, rating, created_date, product_id)
        VALUES ('$author','$review', '$rating', '$timestamp', '$product_id' )";
  $result = $mysqli->query($sql);
}
//echo $product_id;
//echo $_GET["product_id"];
$sql = "SELECT * from products WHERE product_id=$product_id";
//echo $sql . "<br/>"; //debugging only
$result = $mysqli->query( $sql );
if ($result->num_rows>0) {
  list($product_id, $name, $description, $price, $cost, $qty, $category, $modified_date) = $result->fetch_row();


  $detail = <<<END_OF_DETAIL
<div class = 'detail', id='style'>

   <h2>$name</h2>
   <p>$description</td>
   Price: $price<br/>
   Cost: $cost<br/>
   Quantity: $qty<br/>
   Category: $category<br/>

  <a href="/products.php?$cache_buster">List All Products</a><br/>
  <a href='/product_edit.php?product_id=$product_id'> Edit Product</a><br/>;
   </div>
END_OF_DETAIL;
  echo $detail;
} else {
  echo "could not find product";

}

$sql = "SELECT * from reviews WHERE product_id=$product_id ORDER BY created_date DESC";
$result = $mysqli->query($sql);


while (list($review_id,$author,$review,$rating,$created_date,$product_id ) = $result->fetch_row()){
  $formatted_time = time_elapsed_string($created_date);

//language="HTML"
  $review_info = <<<COMMENT_INFO

  Author: $author <br>
  Review: $review <br>
  rating: $rating <br>
  created Date: $formatted_time <br><br>

COMMENT_INFO;
  echo $review_info;
}



//language="HTML"
$review_form = <<<END_COMMENT_FORM
<form action="" method="post">
  <label for="author">Author Name: </label>
  <input id="author" name="author" type=text value=""></br>

  <label for="review">Review: </label> <br>
  <textarea name="review" id="review" cols="30" rows="10"></textarea> <br>

  <label for="rating">rating: </label> <br>
  <select name="rating" id="rating">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>

  <input type="submit" name="submit" value="Submit Review">
</form>
END_COMMENT_FORM;

echo $review_form;


?>


<?php require "includes/footer.php" ;
$mysqli->close();
?>

