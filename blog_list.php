<?php
$page_title = "Blogs";
require "includes/header.php";
require "includes/db_connect.php";
require "includes/useful_functions.php";

$sql = "SELECT * from blogs ORDER BY date_posted DESC";

$result = $mysqli->query( $sql );

echo "<a href='/blog_new.php'>Create New Blog</a><br/>";

echo "<table border='1', id='style' >
<tr>
<th>Title</th>
<th>Author</th>
<th>Blog Content</th>
<th>Date Posted</th>


</tr>";
while ( list($blog_id, $title, $author, $date_posted,$blog_content) = $result->fetch_row()){
  echo "<tr>";
  echo "<td><a href='/blog_show.php?blog_id=$blog_id'> $title</a> </td>";
  echo "<td> $author </td>";
  echo "<td> $blog_content </td>";
  echo "<td> $date_posted </td>";
  echo "<td><a href='/blog_edit.php?blog_id=$blog_id'> Edit Blog</a> </td>";
  echo "<td><a href='/blog_show.php?blog_id=$blog_id'> Show Blog</a> </td>";
  echo "<td><a href='/blog_delete.php?blog_id=$blog_id'> Delete Blog</a> </td>";

  echo "</tr>";
}
echo "</table>";


require "includes/footer.php";
$mysqli->close();
?>
