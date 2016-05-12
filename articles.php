<?php
$page_title = "Articles";
require "includes/header.php";
require "includes/db_connect.php";



$sql = "SELECT * from articles";
//echo $sql . "</br>"; //debuging only

$result =  $mysqli->query( $sql );
echo "<a href='/article_new.php'>Create New Article</a><br/>";
echo "<table border='1', id='style' >
<tr>
<th>Title</th>
<th>Author</th>
<th>Article</th>
<th>Date Posted</th>


</tr>";
while ( list($article_id, $title, $author, $article_text, $date_posted, $created_at, $modified_at) = $result->fetch_row()){
  echo "<tr>";
  echo "<td><a href='/article_show.php?article_id=$article_id'> $title</a> </td>";
  echo "<td> $author </td>";
  echo "<td> $article_text </td>";
  echo "<td> $date_posted </td>";
  echo "<td><a href='/article_edit.php?article_id=$article_id'> Edit </a> </td>";
  echo "<td><a href='/article_show.php?article_id=$article_id'> Show</a> </td>";
  echo "<td><a href='/article_delete.php?article_id=$article_id'> Delete</a> </td>";
  echo "<td><a href='/send_article.php?article_id=$article_id'> Send Email</a> </td>";
  echo "</tr>";
}
echo "</table>";





 require "includes/footer.php";
  $mysqli->close();
?>
