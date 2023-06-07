<?php 
    include_once ("connect.php");
?>
<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header" style="letter-spacing: 5px;">Users</h5>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-light">
                            <tr class="border-0">
                                <th style="letter-spacing: 5px;" class="border-0"> <b>Name</b></th>
                                <th style="letter-spacing: 5px;" class="border-0"> <b>Email</b></th>
                                <th style="letter-spacing: 5px;" class="border-0"> <b>Password</b></th>
                            </tr>
                        
                    
                    <?php 
                    $query = "SELECT * from info";
                    if(count(fetchAll($query))>0)
                    {
                    foreach(fetchAll($query) as $i)
                    {   
                    ?>
                    <tr>
                    <td><?php echo $i["name"];?></td>
                    <td><?php echo $i["email"];?></td>
                    <td><?php echo "********";?></td>
                    </tr>
                    <?php
                    }}
                    ?>
                    
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>