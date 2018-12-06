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
	    $sql = "SELECT * FROM Students WHERE id=".$st_id;//"SELECT * FROM student_not_return WHERE StudentId=".$_COOKIE['studentid'];
        $query = mysqli_query($con,$sql);
        $rowcount=mysqli_num_rows($query);
        if($rowcount== 0){
            echo "<br>ไม่มีรายชื่อในระบบ";
         }
         else{
    ?>
<?php
$result=mysqli_fetch_array($query,MYSQLI_ASSOC)
?>
  <form action="./save_edit_student.php"  method="POST">
        <br>ชื่อ : <input type="text" name="name" value="<?php echo $result['Name'];  ?>"><br>
        ที่อยู่ : <input type="text" name="address" value="<?php echo $result['Address'];  ?>"><br>
        ปีเดือนวันเกิด : <input type="date" name="dob" value="<?php echo $result['DOB'];  ?>"><br>
        เพศ : <input type="text" name="gender" value="<?php echo $result['Gender'];  ?>"><br>
        เบอร์ : <input type="tel" name="phone" value="<?php echo $result['Phone'];  ?>"><br>
        <input type="hidden" name="id" value=<?php echo $st_id; ?>>
        <input type="submit" value="Submit">
    </form>
<?php
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