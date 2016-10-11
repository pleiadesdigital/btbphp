<?php
  require_once("../../includes/initialize.php");
  if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php include_layout_template('header_admin.php'); ?>

  <div id="header">
    <h1>Photo Gallery: ADMIN</h1>
  </div><!--id="header"-->
  <div class="main">
    <h2>Menu</h2>

    <?php include_layout_template('footer_admin.php'); ?>
