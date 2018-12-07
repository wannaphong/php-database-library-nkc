<?php
require_once("config.php");
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เข้าสู่ระบบ : <?php echo $name_web;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
<?php include("js.php"); ?></head>
<body>
    <?php include('header_web.php');?>
    <?php include('nav.php');?>
    <main>
      <article>
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
<div class="shadow"></div>
        </form>
    </article>
    </main>
    <?php include('footer_web.php');?>
</body>
</html>