<?php	require_once("../../includes/initialize.php"); ?>

<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php include_layout_template("header_admin.php"); ?>

	<h2>Menu</h2>


<?php include_layout_template("footer_admin.php"); ?>

