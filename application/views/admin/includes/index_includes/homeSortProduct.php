<?php
	include_once ("connect.php");
	if ($conn ->connect_errno) {
  		echo "Failed to connect to MySQL: " . $conn ->connect_error;
 		 exit();
	} else {
		$sql = "SELECT * FROM product_info";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck > 0){
			while($row = mysqli_fetch_assoc($result)){

                    
                    if($row['pstock'] <= 0)
                    {
                        $ribbon = "ribbons";
                        $ribbonColor = "bg-danger";
                        $ribbonText = "Sold-out";
                    }
                    elseif($row['pstock'] >= 100)
                    {
                        $ribbon = "ribbons";
                        $ribbonColor = "";
                        $ribbonText = "In-stock";
                    }
                    else
                    {
                        $ribbon = "ribbons";
                        $ribbonColor = "bg-brand";
                        $ribbonText = "Available";
                    }
                    if ($row['category'] == 'peanut'){
    	               include ("indexHomeProduct/peanutModal.php");
                    }
                    else if ($row['category'] == 'candy') {
                        include ("indexHomeProduct/candyModal.php");
                    }
                    else if ($row['category'] == 'other'){
                        include ("indexHomeProduct/otherModal.php");
                    }
                  
            }
        }
    }
?>