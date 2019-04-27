<?php
require_once("config.php");
?>
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
    <div class="container center">
        <?php if(!empty($_GET['loginfall'])){
            ?>
            <h2>User/Password ไม่ถูกต้อง</h2>
        <?php }
        ?>
        <form method="POST" action="check_login.php">
<div class="login">
    <input type="text" placeholder="👤 Username" id="username" name="user" required>  
  <input type="password" placeholder="🔑 password" id="password" name="password" required> 
  <input type="submit" value="Sign In">
</div>
        </form>
    </div>
    </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>