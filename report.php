<?php
require_once("config.php");
require_once("db.php");
$sql="SELECT * FROM borrow_view;";

$borrow_all=mysqli_query($con,$sql);
$num_borrow=mysqli_num_rows($borrow_all);
$list_book="SELECT * FROM Books;";//"SELECT DISTINCT Book_name FROM Books;";
$list_book_data=mysqli_query($con,$list_book);
$num_book=mysqli_num_rows($list_book_data);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>รายงานการยืมหนังสือทั้งหมด : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>
    <div class="row">
    <div class="container">
    <div>
    <h3>รายงานการยืมหนังสือ</h3>
    จำนวนการยืมทั้งหมด : <?php echo $num_borrow; ?><br>
    จำนวนหนังสือ : <?php echo $num_book; ?>
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>
    </div>
        </div>
        <?php include("footer.php"); ?>
</body>
</html>