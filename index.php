<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mca";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    echo "error";
}

else
{
    $q='SELECT excellent from feedback';
    $query=mysqli_query($conn,$q);
    $row=mysqli_fetch_assoc($query);
    $e=$row['excellent'];
    // echo $e;

    $q='SELECT good from feedback';
    $query=mysqli_query($conn,$q);  
    $row=mysqli_fetch_assoc($query);
    $g=$row['good'];
    // echo $g;

    $q='SELECT bad from feedback';
    $query=mysqli_query($conn,$q);
    $row=mysqli_fetch_assoc($query);
    $b=$row['bad'];
    // echo $b;

    //header('refresh:4');


}
?>

<html style="background: radial-gradient(#387989, #6dd5ed);">
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" type="text/css" href="mystyle.css">
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['FEEDBACK', 'RATING'],
          ['Excellent',     <?php echo"$e"; ?>],
          ['Good',      <?php echo"$g"; ?>],
          ['Bad',    <?php echo"$b"; ?>]
        ]);

        var options = {
          title: 'FEEDBACK DATA',
          pieHole: 0.4, 
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

</head>

<body>
    <div class="mainbox">
        <div class="heading">FEEDBACK DATA</div>

        <div id="donutchart" class="donutchart" ></div>
       
    </div>

    

</body>
</html>