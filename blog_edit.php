<?php

ob_start();
$page_title = "Edit Blog";
require "includes/header.php";
require "includes/db_connect.php";



$blog_id = $_GET["blog_id"];
$submit = $_POST["submit"];

if ($submit) {
  // TODO: escape content
  $title = mysqli_real_escape_string($mysqli, $_POST["title"]);
  $author = mysqli_real_escape_string($mysqli, $_POST["author"]);
  $blog_content = mysqli_real_escape_string($mysqli, $_POST["blog"]);
  $date_posted = mysqli_real_escape_string($mysqli, $_POST["date_posted"]);

  $sql = "UPDATE blogs SET title='$title', author='$author', blog_content='$blog_content', date_posted='$date_posted'
          WHERE blog_id='$blog_id';";

  echo $sql . "<br/>";
  $result = $mysqli->query( $sql );
  ob_clean();

  header("location: /blog_show.php?blog_id=$blog_id&$cache_buster");
}

$sql = "SELECT * from blogs WHERE blog_id=$blog_id";
//echo $sql . "</br>"; //debuging only
$result = $mysqli->query( $sql );
list($blog_id, $title, $author, $date_posted, $blog_content) = $result->fetch_row();


//language="HTML"
$form =<<<END_OF_FORM
  <form id="style", method="post" action="/blog_edit.php?blog_id=$blog_id&$cache_buster">
  <label for="title">Your Title: </label>
  <input id="title" name="title" type=text value="$title"></br>
  <label for="author">Author Name: </label>
  <input id="author" name="author" type=text value="$author"></br>
  Article: </br>
  <textarea name="blog">$blog_content</textarea></br>
  
  <label for="date_posted">date posted</label>
  <input type="text" name="date_posted" id="date_posted" value="$date_posted"> <br>
  
  <a href="/blog.php?$cache_buster">List All Blogs</a>

<input type="submit" name="submit" value="Update Blog">
</form>
END_OF_FORM;
echo $form;





require "includes/footer.php";
$mysqli->close();
ob_end_flush();

?>