<?php
/**
 * Created by PhpStorm.
 * User: terry
 * Date: 11/7/15
 * Time: 12:02 AM
 */
ob_start();
$page_title = "Show Blogs";
require "includes/header.php";
require "includes/db_connect.php";
require "includes/useful_functions.php";

$blog_id = $_GET["blog_id"];

$submit = $_POST["submit"];
if ($submit) {
  $author = mysqli_real_escape_string($mysqli, $_POST["author"]);
  $comment_text = mysqli_real_escape_string($mysqli, $_POST["comment_text"]);
  $rating = mysqli_real_escape_string($mysqli, $_POST["rating"]);

  $timestamp = date_create();
  $timestamp = $timestamp->format("Y-m-d H:i:s");
  $sql = "INSERT INTO comment  (author,comment_text, rating, created_date, blog_id)
        VALUES ('$author','$comment_text', '$rating', '$timestamp', '$blog_id' )";
  $result = $mysqli->query($sql);
}

$sql = "SELECT * from blogs WHERE blog_id=$blog_id";
//echo $sql . "</br>"; //debuging only
$result = $mysqli->query($sql);
list($blog_id, $title, $author, $date_posted, $blog_content) = $result->fetch_row();

$detail = create_blog_html($title, $author, $blog_content, $date_posted, $cache_buster, $blog_id);
echo $detail;

$sql = "SELECT * from comment WHERE blog_id=$blog_id ORDER BY created_date DESC";
$result = $mysqli->query($sql);


while (list($comment_id,$author,$comment_text,$rating,$created_date,$blog_id ) = $result->fetch_row()){
  $formatted_time = time_elapsed_string($created_date);

//language="HTML"
  $comment_info = <<<COMMENT_INFO

  author: $author <br>
  comment text: $comment_text <br>
  rating: $rating <br>
  created Date: $formatted_time <br><br>

COMMENT_INFO;
echo $comment_info;
}



//language="HTML"
$comment_form = <<<END_COMMENT_FORM
<form action="" method="post">
  <label for="author">Author Name: </label>
  <input id="author" name="author" type=text value=""></br>

  <label for="comment_text">comment content: </label> <br>
  <textarea name="comment_text" id="comment_text" cols="30" rows="10"></textarea> <br>

  <label for="rating">rating: </label> <br>
  <select name="rating" id="rating">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>

  <input type="submit" name="submit" value="Submit Comment">
</form>
END_COMMENT_FORM;

echo $comment_form;

require "includes/footer.php";
$mysqli->close();
?>