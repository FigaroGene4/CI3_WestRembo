<div class="col-sm-6 col-md-3 isotope-item other">
	<!-- Imagebox -->
    <div class="image-box">
        <div class="overlay-container">
            <img style="border-style: solid;border-width: 3px; border-color: black;" src="assets/images/products/<?php echo ($row['image']);?>" alt="">
            <a class="overlay" data-toggle="modal" data-target="#project-<?php echo ($row['pnumber']);?>">
            <i class="glyphicon glyphicon-shopping-cart"></i></a>
            <div class="<?php echo $ribbon;?> <?php echo $ribbonColor;?>"></div>
            <div class="ribbons-text" style = "left:0px"><?php echo $ribbonText;?></div>
        </div>
        <a style="letter-spacing: 3px;border-style: solid;border-width: 3px; border-color: black;border-top-style: none;" class="btn btn-default btn-block" data-toggle="modal" data-target="#project-<?php echo ($row['pnumber']);?>"><?php echo ($row['pname']);?></a>
    </div>
    <?php include ("productModal.php");?>
</div>