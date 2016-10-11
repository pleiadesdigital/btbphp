<?php
/**
 * Created by PhpStorm.
 * User: ronyortiz
 * Date: 8/10/16
 * Time: 11:26 PM
 */
?>

    </div><!--class="main"-->
    <footer>
      <p>Copyright <?php echo date("Y", time()); ?></p>
    </footer>
  </body>
</html>
<?php if (isset($database)) {$database->close_connection(); } ?>
