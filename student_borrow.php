<?php
/*
หน้านี้เป็นหน้าสำหรับเพิ่มรายการที่ยืม หรือ ลบรายการที่ยืม โดยสามารถยกเลิกการยืมได้
*/
$st_id=$_GET['stu_id'];
require_once("is_login.php");
require_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ทดสอบ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <header><?php echo $name_web;?></header>
    <?php include('nav.php');?>
    <main>
      <article>
        <h1>รายการยืมหนังสือที่ค้าง</h1>
        <?php
        echo "รหัสนักเรียน : ".$st_id;
        ?>
        <?php
        require("db.php");
	    $sql = "SELECT Books.Namebooks, A.Date_of_borrow,A.BorrowId FROM student_not_return as A INNER JOIN Books ON A.BookId=Books.BookId WHERE A.StudentId=".$st_id;//"SELECT * FROM student_not_return WHERE StudentId=".$_COOKIE['studentid'];
        $query = mysqli_query($con,$sql);
        $rowcount=mysqli_num_rows($query);
        if($rowcount== 0){
            echo "<br>ไม่มีการยืม";
         }
         else{
    ?>
    <table border="1">
        <tr>
        <th> <div align="center">ชื่อหนังสือ</div></th>
        <th> <div align="center">วันที่ยืม</div></th>
    </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["Namebooks"];?></div></td>
    <td><?php echo $result["Date_of_borrow"];?></td>
  </tr>
<?php
}
}
?>
</table>
<?php
mysqli_close($conn);
?>
    </article>
    </main>
    <footer>Copyright <?php echo $name_web;?></footer>
</body>
</html>