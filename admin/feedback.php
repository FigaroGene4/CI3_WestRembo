<?php
session_start();


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
                <h1 class="page-header text-left custom-heading">Feedbacks</h1>
            </div>
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
            <form method="POST" action="editBlog.php?id=<?php echo $row['id']; ?>">

                <div class="col-md-12">
                <div class="table-responsive">
                    <div class="height10">
                        <table id="myTable" class="table text-left table-striped table-bordered">
                            <thead class="thead-dark">
                            <th style="background-color: #001D3D;">ID</th>
                                <th style="background-color: #001D3D;">DATE</th>
                                <th style="background-color: #001D3D;">FEEDBACK</th>
                                <th style="background-color: #001D3D;">Sentiment</th>
                                <th style="background-color: #001D3D;">EMOTAG</th>
                                <th style="background-color: #001D3D;">ACTION</th>
                            </thead>
                            <tbody>
                            <?php
                                    include_once('db_conn.php');
                                    $sql = "SELECT * FROM table_sentimentanalysis where flag=0";
                                    $query = $conn->query($sql);

                                    while ($row = $query->fetch_assoc()) {
                                        echo "
                                        <tr>
                                           <td>" . $row['id'] . "</td>
                                        <td>" . $row['date'] . "</td>
                                        <td>" . $row['word'] . "</td>
                                        <td>" . $row['sentiment'] . "</td>
                                        <td>" . getSentimentImage($row['sentiment']) . "</td>


                                            <td>
                                
                                                </a>
                                                <a href='#arch_" . $row['id'] . "' class='buttonz btn btn-success btn-sm' data-toggle='modal'>
                                                    <span class='glyphicon glyphicon-trash'></span> Archive
                                                </a>
                                            </td>
                                           
                                        </tr>";
                                        include('archfeedbackmodal.php');
                                    }
                                    ?>

                                        <?php
                                        function getSentimentImage($sentiment)
                                        {
                                            switch ($sentiment) {
                                                case 'positive':
                                                    return '<img src="stsf/5.png" style="top: 35px; left: 80px; margin-right: 10px; margin-bottom: 10px; width: 50px; height: 50px;">';
                                                case 'neutral':
                                                    return '<img src="stsf/4.png" style="top: 35px; left: 80px; margin-right: 10px; margin-bottom: 10px; width: 50px; height: 50px;">';
                                                case 'negative':
                                                    return '<img src="stsf/3.png" style="top: 35px; left: 80px; margin-right: 10px; margin-bottom: 10px; width: 50px; height: 50px;">';
                                                default:
                                                    return '<img src="stsf/2.png" style="top: 35px; left: 80px; margin-right: 10px; margin-bottom: 10px; width: 50px; height: 50px;">';
                                            }
                                        }

                                        // Usage example:
                        
                                        ?>

                            </table>
                        </div>
                    </div>
                </div>
         </div>
        </div>
    </div>
</div>


    </body>

    </html>

