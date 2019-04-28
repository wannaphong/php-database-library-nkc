<?php
require_once("is_login.php");
require_once("config.php");
$perpage = 5;
$category=null;
if (isset($_GET['category'])) {
    $category = $_GET['category'];
}
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}
$start = ($page - 1) * $perpage;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>รายการหนังสือ : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
</head>
<body>
<?php include('nav.php');?>
    <div class="row">
    <div class="container">
      <h3 align="center">รายการหนังสือ</h1>
      <a href="./add_book.php" class="waves-effect waves-light btn">เพิ่มหนังสือ</a>
      <form action="./book.php" method="get">
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
            <input type="submit" value="Submit" class="waves-effect waves-light btn">
        </form>
    <?php
        require("db.php");
        if($category==null)
        $sql = "SELECT * FROM Books limit {$start} , {$perpage}";
        else $sql = "SELECT * FROM Books  where categoryid=$category limit {$start} , {$perpage}";
        $query = mysqli_query($con,$sql);
        $rowcount=mysqli_num_rows($query);
        if($rowcount== 0){
            echo "<br>ไม่มีหนังสือให้ยืม";
         }
        else{
        if (isset($_COOKIE['studentid']))
        {
        ?>
    <b>รหัสนักเรียน : <?php echo $_COOKIE['studentid']; ?></b>
    <?php }?>
    <table>
    <thead>
        <tr>
        <th>รหัส</th>
        <th>รูป</th>
        <th>ชื่อหนังสือ</th>
        <th>รายละเอียด</th>
        <th>ลบหนังสือ</th>
        <?php
        if (isset($_COOKIE['studentid']))
        {
        ?>
        <th>ืยมหนังสือ</th>
        <?php }?>
    </tr>
    </thead>
    <?php
    while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
    {
    ?>
    <tr>
        <td><?php echo $result["BookId"];?></td>
        <td><?php 
        if(!IsNullOrEmptyString($result["image"])){
            echo '<img width="240" src="images/'.$result["image"].'" class="responsive-img">';
        }
        ?></td>
        <td><?php echo $result["Namebooks"];?></td>
        <td><a href="./detail_book.php?bookid=<?php echo $result["BookId"];?>" class="waves-effect waves-light btn">รายละเอียด</a></td>
        <td><a href="./del_book.php?bookid=<?php echo $result["BookId"];?>" class="waves-effect waves-light btn" onclick="return confirm('คุณแน่ใจว่าต้องการลบ ?')">คลิก</a></td>
        <?php
        if (isset($_COOKIE['studentid']))
        {
        ?>
        <td><a href="./borrowbook.php?bookid=<?php echo $result["BookId"];?>" class="waves-effect waves-light btn">ยืม</a></td>
        <?php
        }
        ?>
  </tr>
    <?php
    }
    }
    ?>
</table>
<?php
        if($category==null)
        $sql = "SELECT * FROM Books";
        else $sql = "SELECT * FROM Books  where categoryid=".$category;
        $query = mysqli_query($con,$sql);
        $total_record=mysqli_num_rows($query);
        $total_page = ceil($total_record / $perpage);
?>
  <ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <?php for($i=1;$i<=$total_page;$i++){ if($category==null){?>
 <li  class="waves-effect"><a href="./book.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php }else{
 ?>
 <li  class="waves-effect"><a href="./book.php?page=<?php echo $i; ?>&category=<?php echo $category; ?>"><?php echo $i; ?></a></li>
 <?php }
}?>
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
        
<br>
<?php
    if (isset($_COOKIE['studentid']))
    {
        ?>
        <form method="GET" action="./borrowbook.php">
        <br>Book ID : <input type="text" name="bookid"><br>
        <input type="submit" value="Submit">
        </form>
<?php } ?>
</div>
</div>
    <?php include('footer.php');?>
</body>
</html>