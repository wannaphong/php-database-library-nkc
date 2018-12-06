<?php
/*
หน้านี้เป็นหน้าสำหรับเพิ่มรายการที่ยืม หรือ ลบรายการที่ยืม โดยสามารถยกเลิกการยืมได้
*/
require_once("is_login.php");
require_once("config.php");

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
	    $sql = "SELECT * FROM student_not_return WHERE StudentId=".$_COOKIE['studentid'];
        $query = mysqli_query($con,$sql);
        //echo $sql;
        $rowcount=mysqli_num_rows($query);
        if($rowcount== 0){
            echo "<br>ไม่มีการยืม";
         }
         else{
    ?>
    <table width="600" border="1">
        <tr>
        <th width="91"> <div align="center">CustomerID </div></th>
        <th width="98"> <div align="center">Name </div></th>
        <th width="198"> <div align="center">Email </div></th>
    </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["BorrowId"];?></div></td>
    <td><?php echo $result["LibrarianId"];?></td>
    <td><?php echo $result["Date_of_borrow"];?></td>
    <td><a href="./return.php?borrowid=<?php echo $result["BorrowId"];?>">คืนหนังสือ</td>
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
        <a href="clean_studentid.php">เสร็จสิ้นรายการ</a>
    </article>
	  <aside>
	    <p>More information</p>
	  </aside>
    </main>
    <footer>Copyright ทดสอบ</footer>
</body>
</html>