<?php
ob_start();
$page_title = "Login";
require "includes/db_connect.php";
require "includes/header.php";

$username = mysqli_real_escape_string($mysqli,$_POST['username']);
$password = mysqli_real_escape_string($mysqli,$_POST['password']);
$login_error = "";
$submit = $_POST["login"];
// connect to database
$sql = "SELECT username, password_hash, email from users WHERE username='$username' and password_hash=$password ";
$result = $mysqli->query( $sql );



echo $sql . "<br/>";
$pass_hash =  password_hash($password, PASSWORD_DEFAULT);

if ( $result->num_rows >0) {
  list($username, $password_hash, $email) = $result->fetch_row();
  if ($password_verify($password, $password_hash)) {
    $login_error = "Successful";
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    ob_clean();
    header("Location: /articles.php?");
  }
}else{
  $login_error = "unknown user or password";
}


$login_form =<<< LOGIN_FORM

<h3> $login_error </h3>
<form method="post" action="login.php">
  Username: <input type="text" name="username"><br/>
  Password: <input type="password" name="password"><br/>
  <input type="submit" name="login" value="Login">
</form>

LOGIN_FORM;
echo $login_form;
echo "<a href='/registration.php'>Registration Page</a>";
?>
<?php /*require "includes/footer.php" */?>
