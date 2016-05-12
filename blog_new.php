<?php
/**
 * Created by PhpStorm.
 * User: terry
 * Date: 11/7/15
 * Time: 12:49 AM
 */
ob_start();
$page_title = "New Blog";
require "includes/header.php";
require "includes/db_connect.php";

$title = $_POST["title"];
$author = $_POST["author"];
$blog_content = $_POST["blog"];
$submit = $_POST["submit"];

if ($submit) {
  $timestamp = date_create();
  $timestamp = $timestamp->format("Y-m-d H:i:s");
  $sql = "INSERT INTO blogs  (blog_id, title, author,date_posted, blog_content)
        VALUES (null, '$title', '$author','$timestamp', '$blog_content' )";
  echo $sql . "</br>";
  $result = $mysqli->query($sql);
  $blog_id = $mysqli->insert_id;
  echo $mysqli->error;
  ob_clean();
  header("location: /blog_show.php?blog_id=$blog_id");
}

$form =<<<END_OF_FORM

<form id="style", method="post" action="/blog_new.php">
<label for="title">Your Title: </label>
  <input id="title" name="title" type=text value="$title"></br>
<label for="author">Author Name: </label>
  <input id="author" name="author" type=text value="$author"></br>
  Blog: </br>
  <textarea name="blog">$blog_content</textarea></br>


<input type="submit" name="submit" value="Create New Blog">
</form>
END_OF_FORM;

echo $form;




require "includes/footer.php";
$mysqli->close();

ob_end_flush();
?>