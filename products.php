<?php
$page_title = "Products";
require "includes/header.php";
require "includes/db_connect.php";

$sql = "SELECT * from products ";
//echo $sql . "<br/>"; //debugging only
$result = $mysqli->query( $sql );

echo "<table border='1', id='style' >
<tr>
<th>ID</th>
<th>Name</th>
<th>Description</th>
<th>Price</th>
<th>Cost</th>
<th>Qty</th>
<th>Category</th>


</tr>";

while ( list($product_id, $name,$description,$price,$cost,$qty,$category) = $result->fetch_row() ) {

  echo "<tr>";
  echo "<td>$product_id</td>";
  echo "<td><a href='/product_show.php?product_id=$product_id'>$name</td>";
  echo "<td>$description</td>";
  echo "<td>$price</td>";
  echo "<td>$cost</td>";
  echo "<td>$qty</td>";
  echo "<td>$category</td>";
  echo "<td><a href='/product_edit.php?product_id=$product_id'> Edit Product</a> </td>";
  echo "<td><a href='/product_show.php?product_id=$product_id'> Show Product</a> </td>";
  echo "<td><a href='/product_delete.php?product_id=$product_id'> Delete Product</a> </td>";


  echo "</tr>";

}
echo "</table>";
echo "<td><a href='/product_new.php?product_id=$product_id'> Create Product</a> </td>";
?>



<?php require "includes/footer.php" ;
$mysqli->close();
?>
