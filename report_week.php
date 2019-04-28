<?php
require_once("config.php");
require_once("db.php");
$sql="SELECT * FROM borrow_view;";
$borrow_week=mysqli_query($con,"SELECT * FROM borrow_view WHERE YEARWEEK(Date_of_borrow,0)=YEARWEEK(NOW(),0);");
$num_borrow_week=mysqli_num_rows($borrow_week);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>รายงานการยืมหนังสือสัปดาห์ : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>
    <div class="row">
    <div class="container">
    <div>
    <h3>รายงานการยืมหนังสือ</h3>
    จำนวนการยืมในสัปดาห์นี้ : <?php echo $num_borrow_week; ?><br>
    <?php
    while($result=mysqli_fetch_array($borrow_week,MYSQLI_ASSOC))
    {
        echo $result["Student_name"];
        ?>
    
    <?php    
    }
    
    ?>
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>
    </div>
        </div>
        <?php include("footer.php"); ?>
</body>
</html>