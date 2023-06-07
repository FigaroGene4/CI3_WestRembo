<!-- Modal -->
    <div class="modal fade" id="project-<?php echo ($row['pnumber']);?>" tabindex="-1" role="dialog" aria-labelledby="project-<?php echo ($row['pnumber']);?>-label" aria-hidden="true">
        <div class="modal-dialog modal-md">
        <center>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 style="text-transform: uppercase;text-align: left;  letter-spacing: 10px;" class="modal-title" id="project-<?php echo ($row['pnumber']);?>-label" style="text-align: left;"><?php echo ($row['pname']);?></h4>
                </div>
                <div class="modal-body">    
                    <div class="row">   
                        <img style="width: 300px;" src="assets/images/products/<?php echo ($row['image']);?>" alt="">
                        <br><p class = "price">  ₱<?php echo $row['pprice'];?> </p>
                        <div style="width: 320px">
                            <h3>Product Description</h3>
                            <p style="text-align: justify; display: flex;"><?php echo ($row['description']);?> </p>
                        </div>      
                    </div>
                </div>
            </div>
        </center>
        </div>
    </div>
<!-- Modal end -->

<style>
.price {
  color: grey;
  font-size: 22px;
}
</style>