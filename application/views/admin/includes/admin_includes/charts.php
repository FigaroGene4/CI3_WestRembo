<?php 

    //------------------------------------------------------------------------
    //Product Sales Chart
    $query = "SELECT productname, SUM(price) AS t_sum from `recentorder` GROUP BY productname";
    $res1 = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($res1)) 
    {
        $psale[] = array("label" => $row['productname'], "y" => $row['t_sum']);
    }
    //End
    //------------------------------------------------------------------------
    //Category Chart
    $query = "SELECT category, SUM(price) AS t_sum from `recentorder` GROUP BY category";
    $res1 = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($res1)) 
    {
        $cat[] = array("label" => $row['category'], "y" => $row['t_sum']);
    }
    //End
    //------------------------------------------------------------------------ 
    //Sales by City
    $query = "SELECT city, SUM(totalprice) AS to_sum from `orderform` GROUP BY city";
    $res1 = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($res1)) 
    {
        $city[] = array("label" => $row['city'], "y" => $row['to_sum']);
    }
    //End
    //------------------------------------------------------------------------
?>

<script>
window.onload = function() {
    //------------------------------------------------------------------------
    //Product Sales Chart
    var chartSALES = new CanvasJS.Chart("chartSALES", {
    animationEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title: {
        text: ""
    },
    axisY: {
        title: "",
        prefix:"$"
    },
    axisX: {
        interval: 1,
        labelAngle:-70
    },
    data: [{
        type: "column",
        dataPoints: <?php echo json_encode($psale, JSON_NUMERIC_CHECK); ?>
    }]
});
chartSALES.render();
chartSALES = {};
    //End
    //------------------------------------------------------------------------
    //Category Chart
    var chartCAT = new CanvasJS.Chart("chartCAT", {
    theme: "light2",
    animationEnabled: true,
    title: {
        text: ""
    },
    legend:{
        fontSize:14
    },
    data: [{
        type: "doughnut",
        innerRadius:"70%",
        showInLegend: true,
        legendSize:"50%",
        indexLabel:"{null}",
        legendText: "{label}",
        dataPoints: <?php echo json_encode($cat, JSON_NUMERIC_CHECK); ?>
    }]
});
chartCAT.render();
chartCAT = {};
	//End
    //------------------------------------------------------------------------
    //Product Sales Chart
    var chartCITY = new CanvasJS.Chart("chartCITY", {
    animationEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title: {
        text: ""
    },
    axisY: {
        title: "",
        prefix:"$"
    },
    axisX: {
        interval: 1,
        labelAngle:-70
    },
    data: [{
        type: "column",
        dataPoints: <?php echo json_encode($city, JSON_NUMERIC_CHECK); ?>
    }]
});
chartCITY.render();
chartCITY = {};
    //End
    //------------------------------------------------------------------------
}
</script>