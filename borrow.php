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
    <title>ระบบยืมหนังสือ : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>
    <div class="row">
    <div class="container">
        <h2 align="center">รายการยืมหนังสือ</h1>
        <?php
        echo "รหัสนักเรียน : ".$_COOKIE['studentid']."<br>";
        ?>
        <?php
        require("db.php");
	    $sql = "SELECT Books.Namebooks, A.Date_of_borrow,A.BorrowId FROM student_not_return as A INNER JOIN Books ON A.BookId=Books.BookId WHERE A.StudentId=".$_COOKIE['studentid'];//"SELECT * FROM student_not_return WHERE StudentId=".$_COOKIE['studentid'];
        $query = mysqli_query($con,$sql);
        $rowcount=mysqli_num_rows($query);
        if($rowcount== 0){
            echo "ไม่มีการยืม";
         }
         else{
    ?>
    <table border="1">
        <tr>
        <th> <div align="center">ชื่อหนังสือ</div></th>
        <th> <div align="center">วันที่ยืม</div></th>
        <th> <div align="center">คืน</div></th>
        <th> <div align="center">ลบ</div></th>
    </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["Namebooks"];?></div></td>
    <td><?php echo $result["Date_of_borrow"];?></td>
    <td><a href="./check_fine.php?borrowid=<?php echo $result["BorrowId"];?>"><button>คลิก</button></a></td>
    <td><a href="./del_borrow.php?borrowid=<?php echo $result["BorrowId"];?>" onclick="return confirm('คุณแน่ใจว่าต้องการลบ ?')">ลบการยืมหนังสือ</a></td>
  </tr>
<?php
}
}
?>
</table>
<?php

?>
        <a href="book.php"><button>ยืมหนังสือ</button></a><br>
        <a href="clean_studentid.php"><button>เสร็จสิ้นรายการ</button></a><br><br>
    </div>
    </div>
    <?php include('footer.php');?>
</body>
</html>