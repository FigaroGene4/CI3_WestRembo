<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="deleteModalLabel">Delete</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <center>
          <input id ="txtPID" readonly type = "text" name = "txtPID" hidden>
          <h2>Are you sure you want to delete this record?</h2>
          </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-danger" type="submit"  name="btnDelete">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php
  if (isset($_POST['btnDelete'])){
    include ("connect_db/connect.php");
    $id= $_POST['txtPID'];
    $delete = "DELETE FROM product_info WHERE pnumber = '$id'";
    $result=mysqli_query($conn, $delete);
    if($result){
?>
      <script>
        Swal.fire({
          title: "Update",
          text: "Record Succesfully Deleted!",
          icon: "success"
        }).then((result)=>{
          if(result.isConfirmed){
            window.location = "adminInventory.php"
          }
        });
      </script>
<?php
    } else{
      echo "Records not updated ...";
    }
  }
?>

