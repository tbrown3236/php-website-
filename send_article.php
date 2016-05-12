<?php
ob_start();
require "includes/db_connect.php";
session_start();
/**
 * Created by PhpStorm.
 * User: terryb2123
 * Date: 12/4/2015
 * Time: 12:38 PM
 */
function SendArticle($title, $author, $article_text){
  $headers = "From: brownterry3236@gmail.com\r\n";
  $subject = "article info: $title";
  $message = "Author of article: $author";
  $content = "content: $article_text";
  mail($_SESSION["email"],$title, $author, $article_text, $headers );
}

$article_id = $_GET["article_id"];

$sql = "SELECT * from articles WHERE article_id=$article_id";
//echo $sql . "</br>"; //debuging only
$result = $mysqli->query( $sql );
list($article_id, $title, $author, $article_text, $date_posted, $created_at, $modified_at) = $result->fetch_row();

SendArticle($title, $author, $article_text);
ob_clean();
header( "Location: /articles.php?");

ob_end_flush();
?>