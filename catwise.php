<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "expenseTracker";
$table ="expenses";

$conn = mysqli_connect($server, $username, $password, $database);
if($conn){
    echo "";
}
else die("Error: ".mysqli_connect_error());

 $groceries = "SELECT SUM(cost) FROM `expenses` WHERE tag='Groceries';";
 $result0 = mysqli_query($conn, $groceries);

 $utility = "SELECT SUM(cost) FROM `expenses` WHERE tag='Utility';";
 $result1 = mysqli_query($conn, $utility);

 $entertainment = "SELECT SUM(cost) FROM `expenses` WHERE tag='Entertainment';";
 $result2 = mysqli_query($conn, $entertainment);

 $personal = "SELECT SUM(cost) FROM `expenses` WHERE tag='Personal';";
 $result3 = mysqli_query($conn, $personal);

 $travel = "SELECT SUM(cost) FROM `expenses` WHERE tag='Travel';";
 $result4 = mysqli_query($conn, $travel);

 $other = "SELECT SUM(cost) FROM `expenses` WHERE tag='Other';";
 $result5 = mysqli_query($conn, $other);
 while ($row = mysqli_fetch_array($result0)) {
    $result6 =  $row[0];
}
while ($row = mysqli_fetch_array($result1)) {
    $result7 =  $row[0];
}
while ($row = mysqli_fetch_array($result2)) {
    $result8 =  $row[0];
}
while ($row = mysqli_fetch_array($result3)) {
    $result9 =  $row[0];
}
while ($row = mysqli_fetch_array($result4)) {
    $result10 =  $row[0];
}
while ($row = mysqli_fetch_array($result5)) {
    $result11 =  $row[0];
}


 $dataPoints = array( 
     array("label"=>"Groceries", "y"=>$result6),
     array("label"=>"Utility", "y"=>$result7),
     array("label"=>"Entertainment", "y"=>$result8),
     array("label"=>"Personal", "y"=>$result9),
     array("label"=>"Travel", "y"=>$result10),
     array("label"=>"Other", "y"=>$result11),

 )
  
 ?>
 <!DOCTYPE HTML>
 <html>
 <head>
 <script>
 window.onload = function() {
  
  
 var chart = new CanvasJS.Chart("chartContainer", {
     theme: "light2",
     animationEnabled: true,
     title: {
         text: "Category wise view"
     },
     data: [{
         type: "pie",
         indexLabel: "{y}",
         yValueFormatString: "#,##0.00\"%\"",
         indexLabelPlacement: "inside",
         indexLabelFontColor: "#36454F",
         indexLabelFontSize: 18,
         indexLabelFontWeight: "bolder",
         showInLegend: true,
         legendText: "{label}",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
 </script>
 </head>
 <body>
 <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 </body>
 </html>     