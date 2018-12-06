<nav>
      <a href="./">Home</a>
      <?php
      if (isset($_COOKIE['user']))
      {
        echo '<a href="logout.php">Logout</a>';
      }
      else{
        echo '<a href="login.php">Login</a>';
      }
      ?>
</nav>