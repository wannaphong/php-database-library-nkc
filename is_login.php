<?php
if (!isset($_COOKIE['user']))
      {
        header("Location: index.php");
        exit();
      }
?>