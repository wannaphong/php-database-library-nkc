<?php
/*
ใช้เพิ่มข้อมูลหนังสือลงระบบ
*/
require_once("config.php");
require_once("db.php");
require_once("is_login.php");
$idbook=$_GET["id"];

$sql = "SELECT * FROM `Books` WHERE BookId=".$idbook;
$result=mysqli_query($con,$sql);
$rowcount=mysqli_fetch_array($result);
if($rowcount){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>แก้ไขข้อมูลหนังสือ : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
    <?php include('nav.php');?>
    <main>
      <article>
        <h3 align="center">แก้ไขข้อมูลหนังสือ</h1>
        <form action="./save_edit_book.php"  method="POST">
        <table>
        <tr>
            <td>ชื่อ :</td> 
            <td><input type="text" name="namebook" required value="<?php echo $rowcount['Namebooks']; ?>"></td>
        </tr><tr>
        <td>ผู้เขียน :</td> <td><input type="text" name="author" required value="<?php echo $rowcount['Author']; ?>"></td></tr>
        <tr>
            <td>หมวดหมู่ :</td>
            <td>
            <select required name="category">
            <?php
            require("db.php");
            $sql = "SELECT * FROM Category";
            $query = mysqli_query($con,$sql);
            while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
            {
            ?>
            <option value="<?php echo $result["categoryid"];?>"><?php echo $result["name"];?></option>
            <?php
            }
            ?>
            </select>
            </td>
        </tr>
        <tr>
        <td>สำนักพิมพ์ :</td> <td><input type="text" name="publisher" value="<?php echo $rowcount['Publisher']; ?>"></td></tr><tr>
        <td><input type="submit" value="บันทึก"></td></tr>
        </table><br><input type="hidden" name="id" value=<?php echo $idbook; ?>>
        </form>
    </article>
    </main>
    <?php include('footer.php');?>
</body>
</html>
<?php
}
else{
    header("Location: index.php");
    exit();
}
?>