<?php
/**
 * Created by PhpStorm.
 * User: terry
 * Date: 11/7/15
 * Time: 12:49 AM
 */
ob_start();
$page_title = "New Article";
require "includes/header.php";
require "includes/db_connect.php";

$title = $_POST["title"];
$author = $_POST["author"];
$article_text = $_POST["article"];
$submit = $_POST["submit"];

if ($submit) {

  $timestamp = date_create();
  $timestamp = $timestamp->format("Y-m-d H:i:s");
  $sql = "INSERT INTO articles  (article_id, title, author, article_text, date_posted)
        VALUES (null, '$title', '$author', '$article_text', '$timestamp')";
//  echo $sql . "</br>";
  $result = $mysqli->query($sql);
  $article_id = $mysqli->insert_id;
//  echo $mysqli->error;
  ob_clean();
  header("location : /article_show.php?article_id=$article_id");
}

$form =<<<END_OF_FORM

<form id="style", method="post" action="/article_new.php">
<label for="title">Your Title: </label>
  <input id="title" name="title" type=text value="$title"></br>
<label for="author">Author Name: </label>
  <input id="author" name="author" type=text value="$author"></br>
  Article: </br>
  <textarea name="article">$article_text</textarea></br>


<input type="submit" name="submit" value="Create New Article">
</form>
END_OF_FORM;

echo $form;




require "includes/footer.php";
$mysqli->close();

ob_end_flush();
?>