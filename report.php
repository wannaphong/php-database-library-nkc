<?php
require_once("config.php");
require_once("db.php");
$sql="SELECT * FROM Borrow;";
$borrow_all=mysqli_query($con,$sql);
$num_borrow=mysqli_num_rows($borrow_all);
$borrow_week=mysqli_query($con,"SELECT * FROM Borrow WHERE YEARWEEK(Date_of_borrow)=YEARWEEK(NOW());");
$num_borrow_week=mysqli_num_rows($borrow_week);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>รายงานการยืมหนังสือ : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
<body>
    <?php include('nav.php');?>
    <div class="row">
    <div class="container">
    <div>
    <h3>รายงานการยืมหนังสือ</h3>
    จำนวนการยืมทั้งหมด : <?php echo $num_borrow; ?><br>
    จำนวนการยืมในสัปดาห์นี้ : <?php echo $num_borrow_week; ?>
    </div>
    </div>
        </div>
        <?php include("footer.php"); ?>
</body>
</html>