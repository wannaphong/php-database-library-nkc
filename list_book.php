<?php
require_once("config.php");
$name=$_GET["namebook"];
if (empty($_GET)) {
    $name="*";
}
$perpage = 5;
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
    <div class="container" style="width: 100%;">
      
    <?php
        require("db.php");
        if($name!="*")
        $sql = "SELECT * FROM book_view WHERE Namebooks LIKE '%$name%' limit {$start} , {$perpage}";
        else $sql = "SELECT * FROM book_view limit {$start} , {$perpage}";
        //echo $sql;
        $query = mysqli_query($con,$sql);
        $total_p=mysqli_num_rows($query);
        if($total_p>0){
        if (isset($_COOKIE['studentid']))
        {
        ?>
        <h3 align="center">รายการหนังสือ</h1>
      <a href="./add_book.php"><button>เพิ่มหนังสือ</button></a>
    <b>รหัสนักเรียน : <?php echo $_COOKIE['studentid']; ?></b>
    <?php }?>
    <table>
    <thead>
        <tr>
        <th>รหัส</th>
        <th>รูป</th>
        <th>ชื่อหนังสือ</th>
        <th>รายละเอียด</th>
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
        <td><a href="./detail_book.php?bookid=<?php echo $result["BookId"];?>"><button>รายละเอียด</button></a></td>
        <?php
        if (isset($_COOKIE['studentid']))
        {
        ?>
        <td><a href="./borrowbook.php?bookid=<?php echo $result["BookId"];?>"><button>ยืม</button></a></td>
        <?php
        }
        ?>
  </tr>
    <?php
    }
    
    ?>
</table>
<?php
        if($name!="*")
        $sql = "SELECT * FROM book_view WHERE Namebooks LIKE '%$name%'";
        else $sql = "SELECT * FROM book_view";
        $query = mysqli_query($con,$sql);
        $total_record=mysqli_num_rows($query);
        $total_page = ceil($total_record / $perpage);
?>
  <ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li  class="waves-effect"><a href="./list_book.php?page=<?php echo $i; ?>&namebook=<?php echo $name; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
<?php
    if (isset($_COOKIE['studentid']))
    {
        ?>
        <form method="GET" action="./borrowbook.php">
        <br>Book ID : <input type="text" name="bookid"><br>
        <input type="submit" value="Submit">
        </form>
<?php } }
else{
    echo "<h1>ไม่พบหนังสือ</h1>";
}
?>
</div>
</div>
    <?php include('footer.php');?>
</body>
</html>