<?php
require "includes/header.php";
require "includes/useful_functions.php";

$page_title = "contact us ";



$products = array(
    "imac" => 1,
    "iphone" => 2,
    "iwatch" => 3,
    "icar" => 4,
);
$contact = $_POST["contact"];
if ( $contact == "email")
  $contact_email = "checked=checked";
if ($contact == "phone")
  $contact_phone = "checked=checked";
$username = $_POST["email"];
$first_name = $_POST["first"];
$last_name = $_POST["last"];
$checked_male = $_POST["gender_male"];
$checked_female = $_POST["gender_female"];
$email =$_POST["email"];
$question = $_POST["question"];
$product = $_POST["product"];
$submit = $_POST["submit"];

if ($gender_male=="male") {
  $checked_male = "checked";
}
if ($gender_female=="female") {
  $checked_female = "checked";
}

if ( empty($email)){
  $email_error = "<span class='error'>* Email is required</span>";
}

if ( empty($first_name)){
  $first_name_error = "<span class='error'>* First Name is required</span>";
}

if ( empty($last_name)){
  $last_name_error = "<span class='error'>* Last Name is required</span>";
}
if ($submit=="submit"){
  $headers = "From: brownterry3236@gmail.com\r\n";

  mail( $username, "welcome to my website", "pay me money", $headers);
}

echo $product . "<br/>";




$menu_string = selectMenu($products, $product, "product");

$form = <<<END_OF_FORM
<form id="contact" method= "post"action="/contactus.php">
  <label>Enter First Name:</label></br>
  <input type="text" name="first" value="$first_name" size="50">$first_name_error</br>

  <label>Enter Last Name:</label></br>
  <input type="text" name="last" value="$last_name" size="50">$last_name_error</br>

  <label>Enter Email Address:</label></br>
  <input type="email" name="email" value="$email" size="50"> $email_error </br>

  <label>Questions:</label>
  <textarea name="question">$question</textarea></br>

  <label>Select Product:</label>
  $menu_string</br>


  Subscribe to Newsletter:
    <input type="checkbox" name="gender_male" value="male" $checked_male>

  Notify me when new products are added:
    <input type="checkbox" name="gender_female" value="female" $checked_female></br>

    <label>Preferred Method Of Contact:</label></br>
    Email: <input type="radio" name="contact" value="email"$contact_email></br>
    Phone: <input type="radio" name="contact" value="phone"$contact_phone></br>

    <input name="submit" type="submit" value="Submit">
</form>
END_OF_FORM;
echo $form;
?>


<?php require "includes/footer.php" ?>

