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

<body>
<style>
    a {
    color: black;
    }

  a:hover {
    color: violet;
  }

    .dropdown-menu {
     padding: 15px;

   }
  
.content_td{
    text-align: left;

}

.custom-button {
  /* Add your custom styles here */
  background-color: #001D3D;
  color: #FFFFFF;
  font-size: 16px;
  border-color: #001D3D;
  /* Add more styles as needed */
}


.custom-button:hover {
  /* Add your custom styles here */
  background-color: #001D3D;
  
  /* Add more styles as needed */
}



</style>

 <body>
        

        <br><br><br><br>
    
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <br><br>
                <div class="row">
    <div class="col-md-6">
        <div class="column">
            <div class="head">
                <h1 class="page-header text-left custom-heading">Create Post</h1>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="create-post"  style="margin-top: 15px;">
        <a type="button" class="btn btn-primary custom-button" href="blogcreate.php">Create a post</a>

        </div>
    </div>
</div>

               
               
            </div>
            <?php
            if (isset($_SESSION['error'])) {
                echo "
                <div class='alert alert-danger text-center'>
                    <button class='close'>&times;</button>
                    " . $_SESSION['error'] . "
                </div>";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo "
                <div class='alert alert-success text-center'>
                    <button class='close'>&times;</button>
                    " . $_SESSION['success'] . "
                </div>";
                unset($_SESSION['success']);
            }
            ?>
            <div class="col-md-12">
            <div class="table-responsive">
                <div class="height10">
                    <table id="myTable" class="table text-left table-striped table-bordered">
                        <thead class="thead-dark">
                            <th style="background-color: #001D3D;">ID</th>
                            <th style="background-color: #001D3D;">TITLE</th>
                            <th style="background-color: #001D3D;">DATE</th>
                            <th style="background-color: #001D3D;">CONTENT</th>
                            <th style="background-color: #001D3D;">IMG</th>
                            <th style="background-color: #001D3D;">CATEGORY</th>
                            <th style="background-color: #001D3D;">ACTION</th>
                        </thead>
                        <tbody>
                            <?php
                            include_once('db_conn.php');
                            $sql = "SELECT * FROM table_blog";
                            $query = $conn->query($sql);
                            while ($row = $query->fetch_assoc()) {
                                $imagePath = 'blogimage/' . $row['img'];
                                
                                echo "
                                <tr>
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['title'] . "</td>
                                    <td>" . $row['date'] . "</td>
                                    <td class='content_td'>
                                        <p>" . $row['content'] . "</p>
                                    </td>
                                    <td class='img_td'>
                                         <img src='" . $imagePath . "' style='width: 100px;'>
                                     </td>
                                    <td>" . $row['category'] . "</td>
                                    <td>
                                        <a href='#delete_" . $row['id'] . "' class='buttonz btn btn-danger btn-sm' data-toggle='modal'>
                                            <span class='glyphicon glyphicon-trash'></span> Delete
                                        </a>
                                    </td>
                                </tr>";
                                include('deleteBlogModal.php');
                            }
                            ?>
                         </table>
                    </div>
                </div>
            </div>
        </div>
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