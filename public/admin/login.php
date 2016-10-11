<?php require_once("../../includes/initialize.php"); ?>

<?php if ($session->is_logged_in()) {redirect_to("index.php"); } ?>

<?php 
	// CHECK DATABASE FOR USERNAME/PASSWORD
	if (isset($_POST['submit'])) {
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		$found_user = User::authenticate($username, $password);

		if ($found_user) {
			$session->login($found_user);
			redirect_to("index.php");
		} else {
			$message = "Username/password combination incorrect.";
		} //if ($found_user) 

	} else {
		$username = "";
		$password = "";
	} //if (isset($_POST['submit']))


?>
<?php include_once("../layouts/header_admin.php"); ?>
<h2>Staff Login</h2>
<p><?php //echo output_message($message); ?></p>

<form action="login.php" method="post">
	<table>
		<tr>
			<td>Username:</td>
			<td>
				<input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" />
			</td>
		</tr>
		<tr>
			<td>Password:</td>
			<td>
				<input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" />
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="submit" value="Login" />
			</td>
		</tr>
	</table>
</form>








<?php include_once("../layouts/footer_admin.php"); ?>

