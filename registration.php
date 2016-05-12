<?php
$page_title = "Login";
require "includes/header.php";
require "includes/db_connect.php";
require "includes/useful_functions.php";
ob_start();



$username = mysqli_real_escape_string($mysqli,$_POST['username']);
$email = mysqli_real_escape_string($mysqli,$_POST['email']);
$password = mysqli_real_escape_string($mysqli,$_POST['password']);
$password_confirm = mysqli_real_escape_string($mysqli,$_POST['password_confirm']);
$newsletter = mysqli_real_escape_string($mysqli,$_POST['newsletter']);
$submit = $_POST[register];
$checked_male = $_POST["gender_male"];


$registration_error = "";
if ($password != $password_confirm){
  $registration_error .= "passwords do not match";
}
else if (empty($username)){
  $registration_error .= "username is empty <br/>";
}
else {
  $sql = "SELECT username from users WHERE username='$username'";
  $result = $mysqli->query( $sql );
  if ($result->num_rows > 0) {
    $registration_error .= "<br/> username already exists";
  } else {
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (id, username, password_hash, email, newsletter) VALUES
  (null, '$username', '$pass_hash','$email','$newsletter');";
    $result = $mysqli->query($sql);
    $_SESSION['username'] = $username;
    mail( $username, "welcome to my website", "pay me money", "from: info@php.theterrybrown.com\r\n");
    ob_clean();

  }
}
//language="HTML"
$registration_form = <<< REGISTRATION_FORM

<h3> $registration_error </h3>
<form method="post" method= "post"action="/registration.php">
  Username: <input type="text" name="username" value="$username"><br/>
  Email: <input type="text" name="email" value="$email"><br/>
  Password: <input type="password" name="password" value="$password"><br/>
  Confirm Password: <input type="password" name="password_confirm" value="$password_confirm"><br/>
   Subscribe to Newsletter:
    <input type="checkbox" name="gender_male" value="male" $checked_male>


  <input type="submit" name="submit" value="register">

</form>

REGISTRATION_FORM;
echo $registration_form;
?>
<?php require "includes/footer.php" ?>

