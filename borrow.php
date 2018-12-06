<?php
/*
หน้านี้เป็นหน้าสำหรับเพิ่มรายการที่ยืม หรือ ลบรายการที่ยืม โดยสามารถยกเลิกการยืมได้
*/
require_once("is_login.php");
require_once("config.php");
require_once("check_studentid.php");
/*
แสดงรายการหนังสือที่ยืม ในการยืมแต่ละครั้ง

- เลือกหนังสือที่จะยิมเพิ่ม
- หากต้องการยกเลิกการยืม สามารถกดยกเลิกได้
*/
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
        <h1>รายการยืมหนังสือ</h1>
        <?php
        echo "รหัสนักเรียน : ".$_COOKIE['studentid'];
        ?>
        <?php
        require("db.php");
	    $sql = "SELECT Books.Namebooks, A.Date_of_borrow,A.BorrowId FROM student_not_return as A INNER JOIN Books ON A.BookId=Books.BookId WHERE A.StudentId=".$_COOKIE['studentid'];//"SELECT * FROM student_not_return WHERE StudentId=".$_COOKIE['studentid'];
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
    <td><a href="./check_fine.php?borrowid=<?php echo $result["BorrowId"];?>">คืนหนังสือ</a></td>
  </tr>
<?php
}
}
?>
</table>
<?php
mysqli_close($conn);
?>
        <br>
        <a href="book.php">ยืมหนังสือ</a><br>
        <a href="clean_studentid.php">เสร็จสิ้นรายการ</a>
    </article>
    </main>
    <footer>Copyright <?php echo $name_web;?></footer>
</body>
</html>