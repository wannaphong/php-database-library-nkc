<?php
require_once("config.php");
require_once("db.php");
$sql="SELECT * FROM borrow_view;";
$borrow_week=mysqli_query($con,"SELECT * FROM borrow_view WHERE YEARWEEK(Date_of_borrow,0)=YEARWEEK(NOW(),0);");
$num_borrow_week=mysqli_num_rows($borrow_week);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>รายงานการยืมหนังสือสัปดาห์ : <?php echo $name_web;?></title>
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
            $sql="SELECT Book_name,COUNT(Book_name) as num FROM borrow_view WHERE YEARWEEK(Date_of_borrow,0)=YEARWEEK(NOW(),0) and Book_name IN (SELECT Namebooks as Book_name FROM Books) GROUP BY Book_name;";
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
          title: 'จำนวนการยืมหนังสือรายสัปดาห์'
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
    จำนวนการยืมในสัปดาห์นี้ : <?php echo $num_borrow_week; ?><br>
    รายชื่อบุคคลที่ยืมหนังสือ :<br>
    <table>
    <thead>
          <tr>
              <th>ชื่อ</th>
              <th>จำนวนครั้ง</th>
          </tr>
        </thead>
        <tbody>
    <?php
    $sql="SELECT Student_name,COUNT(Student_name) as num FROM borrow_view WHERE YEARWEEK(Date_of_borrow,0)=YEARWEEK(NOW(),0) and Student_name IN (SELECT Student_name FROM borrow_view) GROUP BY Student_name ORDER BY num DESC;";
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