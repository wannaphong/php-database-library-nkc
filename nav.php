<nav>
<?php
session_start();?>
      <a href="./">Home</a>
      <?php
      if ($_SESSION['logged']==TRUE)
      {
        echo '<a href="logout.php">Logout</a>';
      }
      else{
        echo '<a href="login.php">Login</a>';
      }
      ?>
    </nav>