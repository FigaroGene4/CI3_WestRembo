<div class="col-sm-6 col-md-3 isotope-item peanut">
	<!-- Imagebox -->
    <div class="image-box">
        <div class="overlay-container">
            <img style="border-style: solid;border-width: 3px; border-color: black;" src="assets/images/products/<?php echo ($row['image']);?>" alt="">
            <a class="overlay" data-toggle="modal" onclick="getInfo('<?php echo $row['pnumber']; ?>','<?php echo $row['pprice'];?>','assets/images/products/<?php echo $row['image'];?>','<?php echo addslashes($row['description']);?>','<?php echo $row['pname']; ?>')">
            <i class="glyphicon glyphicon-shopping-cart"></i></a>
            <div class="<?php echo $ribbon;?> <?php echo $ribbonColor;?>"></div>
            <div class="ribbons-text" style = "left:0px"><?php echo $ribbonText;?></div>
        </div>
        <a style="letter-spacing: 3px;border-style: solid;border-width: 3px; border-color: black;border-top-style: none;" class="btn btn-default btn-block" data-toggle="modal" onclick="getInfo('<?php echo $row['pnumber']; ?>','<?php echo $row['pprice'];?>','assets/images/products/<?php echo $row['image'];?>','<?php echo addslashes($row['description']);?>', '<?php echo $row['pname']; ?>')"><?php echo $row['pname'];?></a>
    </div>
</div>
<script type="text/javascript">
    function getInfo(pnumber,pprice,img,desc,pname){
        $("#productModal").modal('show');
        $("#pn").val(pnumber);
        $("#pp").val(pprice);
        $("#pi").attr('src',img);
        $(".img__description").text(desc);
        $(".price").text("₱ "+pprice);
        $("#pna").val(pname);
        $("#prodTitle").text(pname);
    }
</script>