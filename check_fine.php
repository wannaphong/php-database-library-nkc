<?php
require_once("check_studentid.php");
require_once("is_login.php");
require_once("db.php");
require("config.php");
$id=$_GET["borrowid"];
$sql = "SELECT Deadlines FROM student_not_return WHERE BorrowId=".$id;
$query = mysqli_query($con,$sql);
$rowcount=mysqli_fetch_array($query);
$datetime1 = new DateTime(date("Y-m-d"));
$datetime2 = new DateTime($rowcount["Deadlines"]);
$fine_cal=0;
if($datetime1>$datetime2){
    $fine_cal=(int)$datetime1->diff($datetime2)->format("%a");
    $fine_cal=$fine*$fine_cal;
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
<?php include("js.php"); ?></head>
<body>
    <?php include('header_web.php');?>
    <?php include('nav.php');?>
    <main>
      <article>
        <h3 align="center">ระบบคิดค่าปรับ</h1>
        <p>มีค่าปรับ จำนวน <?php echo $fine_cal; ?> บาท</p>
        <a href="./return.php?borrowid=<?php echo $id; ?>&Fine=<?php echo $fine_cal; ?>"><button>เรียบร้อย</button></a>
    </article>
    </main>
    <?php include('footer_web.php');?>
</body>
</html>
    <?php
}
else{
    ?>
<!DOCTYPE html>
<html>
<head>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=./return.php?borrowid=<?php echo $id; ?>&Fine=<?php echo $fine_cal; ?>">
</head>
</html>
<?php
}

?>