<?php
/*
เพิ่มข้อมูลหนังสือใหม่เข้าไป
*/
require_once("is_login.php");
require_once("db.php");
$namebook=$_POST['namebook'];
$author=$_POST['author'];
$category=$_POST['category'];
$publisher=$_POST['publisher'];
$sql="";
if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $temp = explode(".", $_FILES["image"]["name"]);
    $file_name = round(microtime(true)) . '.' . end($temp);
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="ไม่อนุญาตให้อัพโหลดไฟล์นี้, ให้เลือกไฟล์ JPEG หรือ PNG เท่านั้น";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"images/".$file_name);
       $sql="INSERT INTO Books (NameBooks,Author,categoryid,publisher,image) VALUES ('".$namebook."', '".$author."', $category,'".$publisher."','".$file_name."')";
    }else{
       print_r($errors);
    }
}
else
$sql = "INSERT INTO Books (NameBooks,Author,categoryid,publisher) VALUES ('".$namebook."', '".$author."',$category,'".$publisher."')";
mysqli_query($con,$sql);
mysqli_commit($con);
//echo $sql;
header("Location: ./book.php");
exit();
?>