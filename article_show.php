<?php
/**
 * Created by PhpStorm.
 * User: terry
 * Date: 11/7/15
 * Time: 12:02 AM
 */
$page_title = "Show Articles";
require "includes/header.php";
require "includes/db_connect.php";
$article_id = $_GET["article_id"];



$sql = "SELECT * from articles WHERE article_id=$article_id";
//echo $sql . "</br>"; //debuging only
$result = $mysqli->query( $sql );
 list($article_id, $title, $author, $article_text, $date_posted, $created_at, $modified_at) = $result->fetch_row();


$detail =<<<END_OF_DETAIL
<div class = 'detail', id='style'>
  <h2>$title</h2>
  Author: $author</br></br>
  Article:</br> $article_text</br></br>
  Date Posted: $date_posted</br></br>
  Date Created: $created_at</br></br>
  Modified Date: $modified_at</br></br>

<a href="/articles.php?$cache_buster">List All Articles</a><br/>
<a href="/article_edit.php?article_id=$article_id">Edit Article</a><br/>
</div>
END_OF_DETAIL;

echo $detail;


 require "includes/footer.php";
  $mysqli->close();
?>