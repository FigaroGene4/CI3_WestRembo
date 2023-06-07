<?php 
    $query = "SELECT * from `product_info`";
    if(count(fetchAll($query))>0)
        {
            foreach(fetchAll($query) as $i)
            {   
?>
            <tr class = "border-5">
                <td><?php echo $i["pnumber"];?></td>
                <td>
                    <div class="m-r-10"><img src="assets/images/products/<?php echo ($i['image']);?>" alt="user" class="rounded" width="100"></div>
                </td>
                <td><?php echo $i["pname"];?></td>
                <td><?php echo $i["pprice"];?></td>
                <td><?php echo $i["pstock"];?></td>
                <td><?php echo $i["category"];?></td>
                <td><?php echo $i["description"];?></td>
                <td><button type = "button" class = "btn btn btn-warning btn-sm" onclick="editProduct('<?php echo $i['pnumber'];?>','<?php echo $i['pname'];?>','<?php echo $i['pprice'];?>','<?php echo $i['pstock'];?>','<?php echo $i['category'];?>','<?php echo addslashes($i['description']);?>')">Edit</button>   
                <?php 
                    include("editModal.php");?>
                    <button type= "button" class = "btn btn-danger btn-sm" onclick="deleteProduct('<?php echo $i['pnumber'];?>')">Delete</button></td>
                <?php 
                    include(".php");
                ?> 
            </tr>                                    
        <?php
            }
        }
        ?>