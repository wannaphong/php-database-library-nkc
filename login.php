<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เข้าสู่ระบบ : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>

  <div class="row">
      <div class="card">
    <div class="container">

        <?php if(!empty($_GET['loginfall'])){
            ?>
            <h3>User/Password ไม่ถูกต้อง</h3>
        <?php }
        ?>
    <form method="POST" action="check_login.php">
    <div class="row">
    <div class="input-field col s12 m4 l8">
      <input id="username" type="text" class="validate" name="user" required>
      <label class="active" for="username">👤 Username</label>
    </div>
    </div>
    <div class="row">
  <div class="input-field col s12 m4 l8">
      <input type="password"  class="validate" id="password" name="password"  required>
      <label class="active" for="password">🔑 password</label>
    </div>
    </div>
    <div class="row">
  <input type="submit" value="เข้าสู่ระบบ" class="waves-effect waves-light btn">
  </div>
        </form></div>
    </div>
    </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>