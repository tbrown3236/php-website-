<?php


ob_start();
$page_title = "Edit Article";
require "includes/header.php";
require "includes/db_connect.php";

$article_id = $_GET["article_id"];
$submit = $_POST["submit"];

if ($submit) {
  $title = $_POST["title"];
  $author = $_POST["author"];
  $article_text = $_POST["article"];
  $modified_at = $_POST["modified_at"];

  $sql = "UPDATE articles SET title='$title', author='$author', article_text='$article_text', modified_at='$modified_at'
          WHERE article_id='$article_id';";
  $result = $mysqli->query( $sql );
  ob_clean();
  header("location: /article_show.php?article_id=$article_id&$cache_buster");
}

$sql = "SELECT * from articles WHERE article_id=$article_id";
//echo $sql . "</br>"; //debuging only
$result = $mysqli->query( $sql );
list($article_id, $title, $author, $article_text, $date_posted, $created_at, $modified_at) = $result->fetch_row();


$form =<<<END_OF_FORM

  <form id="style", method="post" action="/article_edit.php?article_id=$article_id">
  <label for="title">Your Title: </label>
  <input id="title" name="title" type=text value="$title"></br>
  <label for="author">Author Name: </label>
  <input id="author" name="author" type=text value="$author"></br>
  Article: </br>
  <textarea name="article">$article_text</textarea></br>

  <a href="/articles.php?$cache_buster">List All Articles</a>

<input type="submit" name="submit" value="Update Article">
</form>
END_OF_FORM;
echo $form;





 require "includes/footer.php";
  $mysqli->close();
ob_end_flush();

?>