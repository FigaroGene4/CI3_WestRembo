<?php
//upload.php
$connect = new PDO('mysql:host=localhost;dbname=kendriks_db', 'root', '');
if(count($_FILES["fileToUpload"]["name"]) > 0)
{
 //$output = '';
 sleep(3);
 for($count=0; $count<count($_FILES["fileToUpload"]["name"]); $count++)
 {
  $file_name = $_FILES["fileToUpload"]["name"][$count];
  $tmp_name = $_FILES["fileToUpload"]['tmp_name'][$count];
  $file_array = explode(".", $file_name);
  $file_extension = end($file_array);
  if(file_already_uploaded($file_name, $connect))
  {
   $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
  }
  $location = 'images/products/' . $file_name;
  if(move_uploaded_file($tmp_name, $location))
  {
   $add = "INSERT INTO product_info (pname,pprice,pstock,description,category, image) VALUES ('$productName','$productPrice','$productStock','$productDescription','$productCategory','$productImage')";
   $statement = $connect->prepare($add);
   $statement->execute();
  }
 }
}

function file_already_uploaded($file_name, $connect)
{
 
 $query = "SELECT * FROM product_info WHERE image = '".$file_name."'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $number_of_rows = $statement->rowCount();
 if($number_of_rows > 0)
 {
  return true;
 }
 else
 {
  return false;
 }
}

?>









    <script>
    $(document).ready(function(){
     $('#fileToUpload').change(function(){
      var error_images = '';
      var form_data = new FormData();
      var files = $('#fileToUpload')[0].files;
      if(files.length > 1)
      {
       error_images += 'You can not select more than 1 file';
      }
      else
      {
       for(var i=0; i<files.length; i++)
       {
        var name = document.getElementById("fileToUpload").files[i].name;
        var ext = name.split('.').pop().toLowerCase();
        if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
        {
         error_images += '<p>Invalid '+i+' File</p>';
        }
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("fileToUpload").files[i]);
        var f = document.getElementById("fileToUpload").files[i];
        var fsize = f.size||f.fileSize;
        if(fsize > 2000000)
        {
         error_images += '<p>' + i + ' File Size is too big</p>';
        }
        else
        {
         form_data.append("file[]", document.getElementById('fileToUpload').files[i]);
        }
       }
      }
      if(error_images == '')
      {
       $.ajax({
        url:"uploadImage.php",
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:function(){
         $('#error_fileToUpload').html('<br /><label class="text-primary">Uploading...</label>');
        },   
        success:function(data)
        {
         $('#error_fileToUpload').html('<br /><label class="text-success">Uploaded</label>');
         load_image_data();
        }
       });
      }
      else
      {
       $('#fileToUpload').val('');
       $('#error_fileToUpload').html("<span class='text-danger'>"+error_images+"</span>");
       return false;
      }
     });  
    </script>

<?php
  
?>