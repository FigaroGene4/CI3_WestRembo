<?php 
    $sql = "SELECT * from `recentorder`  LIMIT 3";
    $result = mysqli_query($conn, $sql);
    if(count(fetchAll($sql))>0)
    {
        $row = mysqli_fetch_assoc($result);
        foreach(fetchAll($sql) as $i)
        {   
?>
        <tr>
            <td><?php echo $i["orderid"];?></td>
            <td><?php echo $i["productname"];?></td>
            <td><?php echo $i["quantity"];?></td>
            <td><?php echo $i["price"];?></td>
        </tr>
<?php
        }
    }
?>