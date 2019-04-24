<?php
if(!empty($_POST['studentid'])) {
    require("db.php");
    $studentid=mysqli_real_escape_string($con,$_POST['studentid']);
    $sql="select * from Students WHERE  StudentId=".$studentid;
    $result=mysqli_query($con,$sql);
    $rowcount=mysqli_fetch_array($result);
    if($rowcount){
        $cookie_name = "studentid";
        $cookie_value = $studentid;
        setcookie($cookie_name, $cookie_value, time() + (3600), "/"); // 3600 วินาที = 1ชั่วโมง 
        
        header("Location: borrow.php");
        exit();
    }
    else{
        header("Location: student_id.php");
        exit();
    }
}
else{
    header("Location: student_id.php");
    exit();
}
?>