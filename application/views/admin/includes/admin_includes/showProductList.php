<?php 
    include_once ("connect.php");
    if ($conn ->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn ->connect_error;
         exit();
    } else {
        $sql = "SELECT * FROM product_info";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                if($row['pstock'] <= 0)
                {
                    $ribbon = "ribbons";
                    $ribbonColor = "bg-danger";
                    $ribbonText = "Sold Out";
                }
                elseif($row['pstock'] >= 100)
                {
                    $ribbon = "ribbons";
                    $ribbonColor = "";
                    $ribbonText = "High Stocks";
                }
                else
                {
                    $ribbon = "ribbons";
                    $ribbonColor = "bg-brand";
                    $ribbonText = "Available";
                }
?>
                 <!--  <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">  -->    
                <div class="col-xl-3 col-md-8 isotope-item">
                    <div class="row">
                        <div class="product-thumbnail">
                            <div class="product-img-head">
                                <div class="product-img">
                                    <img src="assets/images/products/<?php echo ($row['image']);?>" alt="" class="img-fluid">
                                </div>
                                <div class=" <?php echo $ribbon;?> <?php echo $ribbonColor;?>"></div>
                                <div class="ribbons-text"><?php echo $ribbonText;?></div>
                            </div>
                            <div class="product-content">
                                <div class="product-content-head">
                                    <h3 class="product-title" style="font-size: 25px; text-transform: uppercase;"><?php echo $row['pname'];?></h3>
                                    <div class="product-price" style="font-size: 20px;"><?php echo "₱ ". $row['pprice'] . ".00";?></div>
                                    <div>Stocks: <?php echo $row['pstock'];?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php       }
        }
    }
?>
