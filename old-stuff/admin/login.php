<?php
require_once("../../includes/initialize.php");

if ($session->is_logged_in()) {
  redirect_to("index.php");
}

// FORM
if (isset($_POST['submit'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  //check database if username/password exist

  $found_user = User::authenticate($username, $password);

  if ($found_user) {
    $session->login($found_user);
    redirect_to("index.php");
  } else {
    $message = "Username/password combination incorrect";
  } //if ($found_user)

} else {
  $username = "";
  $password = "";
} //if (isset($_POST['submit']))
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Photo Gallery: Login</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="../css/style.css">
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
  <script src="js/scripts.js"></script>
  <div id="header">
    <h1>Photo Gallery: LOGIN</h1>
  </div><!--id="header"-->
  <div class="main">
    <h2>Staff Login</h2>
    <?php //echo output_message($message); ?>
    <form action="login.php" method="post">
      <table>
        <tr>
          <td>Username:</td>
          <td>
            <input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>">
          </td>
        </tr>
        <tr>
          <td>Password:</td>
          <td>
            <input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>">
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Login">
          </td>
        </tr>
      </table>
    </form>

  </div><!--class="main"-->
  <footer>
    <p>Copyright <?php echo date("Y", time()); ?></p>
</footer>
</body>
</html>
<?php if (isset($database)) { $database->close_connection(); } ?>

