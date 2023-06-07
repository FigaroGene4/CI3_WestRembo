<?php 
    
  include 'connect_db/session.php';
  include 'shits.php';
  
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year']))
  {
    $year = $_GET['year'];
  }
?>
          <div class="card">
            <div class="card-header with-border">
              <h3 class="card-title" style="letter-spacing: 5px;">Annual/Monthly Sales Report
              <div class="card-tools pull-right">
                <form class="form-inline">
                  
                    <label>Select Year: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2015; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  
                </form>
              </div>
            </div>
          </h3>
            <div class="card-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>
              </div>
            </div>
          </div>
   
     
<?php 

  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year']))
  {
    $year = $_GET['year'];
  }

  $conn = $pdo->open();

?>
<!-- Chart Data -->
<?php

  $months = array();
  $sales = array();
  for( $m = 1; $m <= 12; $m++ ) 
  {
    try
    {
      $stmt = $conn->prepare("SELECT * FROM orderform WHERE MONTH(orderDateTime)=:month AND YEAR(orderDateTime)=:year");
      $stmt->execute(['month'=>$m, 'year'=>$year]);
      $total = 0;

      foreach($stmt as $srow)
      {
        $total += $srow['totalPrice'];    
      }
      array_push($sales, round($total, 2));
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $sales = json_encode($sales);

?>
<!-- End Chart Data -->

<?php $pdo->close(); ?>

<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {

        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $sales; ?>
      }
    ]
  }
  //barChartData.datasets[1].fillColor   = '#00a65a'
  //barChartData.datasets[1].strokeColor = '#00a65a'
  //barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'adminindex.php?year='+$(this).val();
  });
});
</script>