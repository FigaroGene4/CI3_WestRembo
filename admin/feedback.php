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
   
                <h1 class="page-header text-left custom-heading">Feedbacks</h1>

                <div class="col">
                <div class="table-responsive">
                    <div class="height10">
                        <table id="myTable" class="table text-left table-striped table-bordered">
                            <thead class="thead-dark">
                            
                                <th style="background-color: #001D3D;">Transaction Number</th>
                                <th style="background-color: #001D3D;">Category</th>
                                <th style="background-color: #001D3D;">Review</th>
                                <th style="background-color: #001D3D;">Rating</th>
                               <!-- <th style="background-color: #001D3D;">Sentiment</th> -->
                                
                            </thead>
                            <tbody>
                            <?php
                                    include_once('db_conn.php');
                                    $sql = "SELECT * FROM table_documentrequest WHERE sentiment = 'negative' OR sentiment = 'positive'";
                                    $query = $conn->query($sql);

                                    while ($row = $query->fetch_assoc()) {
                                        $rating = $row['rate'];
                                        
                                        echo "
                                        <tr>
                                           
                                        <td>" . $row['transactionNumber'] . "</td>
                                        <td>" . $row['category'] . "</td>
                                        <td>" . $row['review'] . "</td>
                                        <td>" . getSentimentImage($row['rate']) . "</td>
                                       

                                            
                                           
                                        </tr>";
                                        include('archfeedbackmodal.php');
                                    }
                                    ?>

                                        <?php
                                        function getSentimentImage($rating)
                                        {
                                            switch ($rating) {
                                                case 5:
                                                    return '<img src="stsf/5.png" style="top: 35px; left: 80px; margin-right: 10px; margin-bottom: 10px; width: 50px; height: 50px;">';
                                                    break;
                                                case 4:
                                                    return '<img src="stsf/4.png" style="top: 35px; left: 80px; margin-right: 10px; margin-bottom: 10px; width: 50px; height: 50px;">';
                                                    break;
                                                case 3:
                                                    return '<img src="stsf/3.png" style="top: 35px; left: 80px; margin-right: 10px; margin-bottom: 10px; width: 50px; height: 50px;">';
                                                case 2:
                                                    return '<img src="stsf/2.png" style="top: 35px; left: 80px; margin-right: 10px; margin-bottom: 10px; width: 50px; height: 50px;">';
                                                    break;
                                                case 1:
                                                    return '<img src="stsf/1.png" style="top: 35px; left: 80px; margin-right: 10px; margin-bottom: 10px; width: 50px; height: 50px;">';
                                                    break;    
                                                    
                                            
                                            }
                                        }
                                        ?>
       
</div>

               



               
           
                


    </body>

    </html>

    <script src="jquery/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="datatable/jquery.dataTables.min.js"></script>
        <script src="datatable/dataTable.bootstrap.min.js"></script>
        <!-- generate datatable on our table -->
        <script>
          $(document).ready(function() {
           
            //hide alert
           $(document).on('click', '.close', function() {
              $('.alert').hide();
            })
          });
        </script>