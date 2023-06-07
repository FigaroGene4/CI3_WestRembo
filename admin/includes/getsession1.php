<?php 
    $query = "SELECT * from `product_info`";
    if(count(fetchAll($query))>0)
    {
        foreach(fetchAll($query) as $i)
        {
            $po = "SELECT pnumber,pprice,category,pname,description,pstock from `product_info`";
            if($i['category']== '' || $i['category']== 'candy' ||$i['category']== 'other')
            {   
                $var = "p".ucfirst($i['pnumber']);
                $p1 = $_GET['p1'];
            }
        }
    }
?>