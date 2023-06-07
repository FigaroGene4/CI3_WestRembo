<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="adminIndex.php">Kendrik's Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item dropdown notification">
                    <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                    <li>
                        <div class="notification-title"> Notification</div>
                        <div class="notification-list">
                        <?php
                            include('connect.php');
                            $userid = $_SESSION['email'];
                            $sql = "SELECT * FROM orderform ORDER BY orderDateTime DESC";
                            $query = $conn->query($sql);
                            while ($row = $query->fetch_assoc()){
                        ?>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action active">
                                    <div class="notification-info">
                                        <div class=""><span class="notification-list-user-name"><?php echo $row['fullname'];?></span>has placed an order.
                                            <div class="notification-date"><?php echo $row['orderDateTime'];?></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </li>
                    <li>
                        <div class="list-footer"> <a data-toggle = "modal" data-target ="">View all notifications</a></div>
                    </li>
                </ul>
                <li class="nav-item  nav-user"> 
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/logout.png" alt="" class="user-avatar-md rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <a class="dropdown-item" href="index.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>