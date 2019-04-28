<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบรายงานห้องสมุด : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>

  <div class="row">
    <div class="container center">
       <h3>ระบบรายงานห้องสมุด</h3>
       <ul class="collection">
      <li class="collection-item"><a href="./report_week.php">รายสัปดาห์</a></li>
      <li class="collection-item"><a href="./report_all.php">ทั้งหมด</a></li>
    </ul>
    </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>