

<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include("db_conn.php");

?>

<?php include 'includes2/header-admin.php';?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Home</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="icon" type="image/x-icon" href="logo.png">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">



    </head>
    <style>

    
    </style>
    <body>


        <div class="main">
            <div class="container ">

            <div id="sample">
  <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
  <script type="text/javascript">
 
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>
           <?php 

           $id = $_GET['id'];
           include_once('db_conn.php');
           $sql = "SELECT * FROM table_blog WHERE id = '$id'";
           $query = $conn->query($sql);
           while ($row = $query->fetch_assoc()) {

            $title = $row['title'];
            $content = $row['content'];
            $img = $row['img'];
            $category = $row['category'];

           }
           ?>
                    
                <br><br><br><br><br>
                <h1>Edit Annoucement</h1><br>

                <form action="#" method="post" enctype="multipart/form-data">


                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Blog title here" value="<?=  $title;?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select category</label>
                            <select class="form-control" name="category" id="exampleFormControlSelect1" value="<?= $category;?>">
                                <option>Announcement</option>
                                <option>General Information</option>
                                <option>Health</option>
                                <option>Emergency</option>
                                <option>Nails</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" value=""><?php echo $content;?></textarea>
                        </div>

                        <div class="field-image">

                            <label for="exampleFormControlFile1">Upload header image</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" accept="image/x-png,image/gif,image/jpeg,image/jpg">



                        </div><br><br>

                        <button type="submit" name="submit" class="btn btn-primary">Update Blog</button>
                    </form>




                </form>
<?php
include("db_conn.php");
if (isset($_POST['submit'])){

   

    if (isset($_FILES['image'])){
        $title =mysqli_real_escape_string($conn, $_POST['title']);
        $content  =mysqli_real_escape_string($conn, $_POST['content']);
        $date = date("Y-m-d");
        $category =  mysqli_real_escape_string($conn, $_POST['category']);

        $img_name = $_FILES['image']['name'];
        $img_type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg"];

        $types = ["image/jpeg", "image/jpg", "image/png"];

        $time = time();
        $new_img_name = $time . $img_name;
        move_uploaded_file($tmp_name, "../admin/blogimage/" . $new_img_name);


       
            $sql = "UPDATE table_blog SET title = '$title',category = '$category', content = '$content', img = '$new_img_name', status = 'active' WHERE id = '$id'";
            $conn->query($sql);
        

    
            

    
        
            
        

        

    
    



        $_SESSION['success'] = 'Blog Upated Successfully ' ;
    }
}



?>

<br>
                <h1> <?php if (isset($_SESSION['success'])) {
            echo
            "
            <div class='alert alert-success text-center'>
               
                " . $_SESSION['success'] . "
                
            </div>
            ";
            unset($_SESSION['success']);
        } ?> </h1>
            </div>
        </div>






    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>




