<?php
require_once("../includes/database.php");
require_once("../includes/functions.php");
//require_once("../includes/user.php");

// SQL code
/*$sql = "INSERT INTO users (id, username, password, first_name, last_name) ";
$sql .= "VALUES (1, 'rortiz', 'secret', 'Rony', 'Ortiz')";
$result = $database->query($sql);*/

/*$sql = "SELECT * FROM users WHERE id = 1";
$result = $database->query($sql);
$found_user = $database->fetch_array($result);*/

//$user = new User();
//$found_user = User::find_by_id(1);

//$record = User::find_by_id(1);
//echo $record['username'];

?>

<?php include_once('layouts/header.php'); ?>
    <h1>Photo Gallery :: HOME</h1>
    <p><?php echo "is this working??"; ?></p>
    <p><?php if (isset($database)) { echo "true"; } else { echo "false"; }?></p>
    <p><?php echo $database->escape_value("It's time to dig into it!!"); ?></p>
    <hr>
    <h2>Testing the Database</h2>
    <p><?php //echo '$find_by_id(): ' . $found_user['username']; ?></p>
    <p><span>---</span></p>
    <?php
  /*    $user_set = User::find_all();
      while ($user = $database->fetch_array($user_set)) {
        echo "<p>User: " . $user['username'] . "</p>";
        echo "<p>Name: " . $user['first_name'] . " " . $user['last_name'] . "</p><br>";
      }*/
    ?>
    <h2>Testing OOP - showing user</h2>
    <p><?php //echo '$find_by_id(): ' . $found_user['username']; ?></p>
    <?php
      $user = User::find_by_id(1);
      echo $user->full_name();
    ?>

    <h2>Testing OOP - showing user set</h2>
    <?php
      $users = User::find_all();
      foreach ($users as $user) {
        echo "<p>User: " . $user->username . "</p>";
        echo "<p>Full name: " . $user->full_name() . "</p>";
      }

    ?>

    <?php include_once('layouts/footer.php'); ?>
