<?php
  /*if(isset($_POST['btnAddToCart'])){
    include("include/connect.php");
    $sql = "SELECT * FROM product_info";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) > 0){
      $_SESSION['Stock'] = $row['pstock'];
      if ($_POST['txtQuantity'] > $_SESSION['Stock']){
        echo '<script> 
                swal.fire({
                    title: "Action can not be done",
                    text: "Quantity can not be higher than Stock",
                    icon: "Error"
                  });
              </script>';
      }
    }
  }*/
?>
<!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="project-<?php echo ($row['pnumber']);?>-label" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <center>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 style="text-transform: uppercase;text-align: left;  letter-spacing: 10px;" class="modal-title" style="text-align: left;" id = "prodTitle"></h4>
                </div>
                <div class="modal-body"> 
                <form id = "cartForm" method = "post" action = "includes/homeProducts/addToCart.php">
                    <div class="row">
                        <div class="img__wrap">
                            <img style="width: 500px; height:100%" id="pi" src=""alt="">
                            <p class="img__description"></p>
                        </div>
                        <div class = "row">                
                          <p class = "price"> </p>
                          <p> Quantity: </p>
                          <div class="sp-quantity">
                            <div class="sp-input">
                              <input style = "font-size: 24px; width:80px;text-align:center;" type="number" class="qty-input" name = "txtQuantity" value="0" step = "1">
                            </div>
                            <input type = "hidden" id="pn" name = "hidden_id">
                            <input type="hidden" id="pna" name="pna">
                            <input type = "hidden" id="pp" name = "hidden_price">
                        </div> 
                        <div class = "row">
                          <br>
                          <button type = "submit" id = "test" class = "glyphicon glyphicon-shopping-cart" name = "btnAddToCart" style = "background-color: #4CAF50;font-size: 24px; width:80px; height:50px; "></button>
                        </div>              
                    </div>
                </form>
                </div>
            </div>
        </center>
        </div>
    </div>

<!-- Modal end -->
<?php
if(isset($_SESSION['success']) && $_SESSION['success'] !=""){
  echo $_SESSION['success'];
  unset($_SESSION['success']);
}
?>

<style>
.pname{
  font-size:35px;
}
.sp-quantity div { display: inline; }
input{
  width:30%;
}
.price {
  color: grey;
  font-size: 35px;
}
/* relevant styles */
.img__wrap {
  position: relative;
  height: 180px;
  width: 257px;
}

.img__description {
  font-size:13px;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(255,0,0,0.3);
  color: #fff;
  visibility: hidden;
  opacity: 0;

  /* transition effect. not necessary */
  transition: opacity .2s, visibility .2s;
}

.img__wrap:hover .img__description {
  visibility: visible;
  opacity: 1;
}
</style>