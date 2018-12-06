<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $name_web;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <header><?php echo $name_web;?></header>
    <?php include('nav.php');?>
    <main>
      <article>
        <h1>ระบบยืม-คืนหนังสือห้องสมุด</h1>
        <p>พัฒนาโดย นักศึกษาสาขาวิทยาการคอมพิวเตอร์และสารสนเทศ</p>
    </article>
    </main>
    <footer>Copyright <?php echo $name_web;?></footer>
</body>
</html>