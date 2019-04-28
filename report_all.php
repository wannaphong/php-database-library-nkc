<?php
require_once("config.php");
require_once("db.php");
$sql="SELECT * FROM borrow_view;";

$borrow_all=mysqli_query($con,$sql);
$num_borrow=mysqli_num_rows($borrow_all);
$list_book="SELECT * FROM Books;";//"SELECT DISTINCT Book_name FROM Books;";
$list_book_data=mysqli_query($con,$list_book);
$num_book=mysqli_num_rows($list_book_data);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>รายงานการยืมหนังสือทั้งหมด : <?php echo $name_web;?></title>
    <?php include("header_web.php"); ?>
    <?php include("js.php"); ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['หนังสือ','จำนวนครั้ง'],
            <?php
            $sql="SELECT Book_name,COUNT(Book_name) as num FROM borrow_view WHERE Book_name IN (SELECT Namebooks as Book_name FROM Books) GROUP BY Book_name;";
            $q=mysqli_query($con,$sql);
            $text="";
            while($result=mysqli_fetch_array($q,MYSQLI_ASSOC))
    {
        $text=$text."['".$result["Book_name"]."',".$result["num"]."],";
    }
    
    echo rtrim($text,',');
            ?>
        ]);

        var options = {
          title: 'จำนวนการยืมหนังสือทั้งหมด'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <?php include('nav.php');?>
    <div class="row">
    <div class="container">
    <div>
    <h3>รายงานการยืมหนังสือ</h3>
    จำนวนการยืมทั้งหมด : <?php echo $num_borrow; ?><br>
    จำนวนหนังสือทั้งหมด : <?php echo $num_book; ?><br>
    <table>
    <thead>
          <tr>
              <th>ชื่อ</th>
              <th>จำนวนครั้ง</th>
          </tr>
        </thead>
        <tbody>
    <?php
    $sql="SELECT Student_name,COUNT(Student_name) as num FROM borrow_view WHERE Student_name IN (SELECT Student_name FROM borrow_view) GROUP BY Student_name ORDER BY num DESC;";
    $student_borrow_week=mysqli_query($con,$sql);
    while($result=mysqli_fetch_array($student_borrow_week,MYSQLI_ASSOC))
    {
        ?>
        <tr>
        <td><?php echo $result["Student_name"]; ?></td>
        <td><?php echo $result["num"]; ?></td>
        </tr>
    
    <?php    
    }
    
    ?>
    </tbody>
      </table>
      <div id="piechart" style="width: auto; height: 500px;"></div>
    </div>
    </div>
        </div>
        <?php include("footer.php"); ?>
</body>
</html>