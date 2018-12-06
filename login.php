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
        <h1>Login</h1>
        <form method="POST" action="check_login.php">
        <br>User<br><input type="text" name="user"><br>
        Password<br><input type="password" name="password"><br>
        <input type="submit" value="Submit">
        </form>
    </article>
    </main>
    <footer>Copyright <?php echo $name_web;?>/footer>
</body>
</html>