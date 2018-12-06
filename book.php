<?php
        require("db.php");
	    $sql = "SELECT * FROM Books";
        $query = mysqli_query($con,$sql);
        //echo $sql;
        $rowcount=mysqli_num_rows($query);
        if($rowcount== 0){
            echo "<br>ไม่มีหนังสือให้ยืม";
         }
         else{
    ?>
    <table width="600" border="1">
        <tr>
        <th width="91"> <div align="center">ชื่อหนังสือ</div></th>
        <th width="98"> <div align="center">ผู้เขียน</div></th>
    </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["Namebooks"];?></div></td>
    <td><?php echo $result["Author"];?></td>
    <?php
    if (isset($_COOKIE['studentid']))
    {
    
    ?>
    <td><a href="./borrowbook.php?bookid=<?php echo $result["BookId"];?>">ยืมหนังสือ</a></td>
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
mysqli_close($conn);
?>
<br>
<a href="./add_book.php">เพิ่มหนังสือ</a>