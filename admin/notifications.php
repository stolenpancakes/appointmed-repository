<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Admin | Dashboard";
    include 'include/head.php';
    include '../connectdatabase.php';
    ?>
    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: index.php");
    else if ($account_type != 'Admin')
        header("location: index.php");
    $sql = mysqli_query($con, "SELECT * FROM account WHERE account_status = 'Active' AND username <> 'Admin' ");
    $n_result = mysqli_query($con, "SELECT * FROM notification ORDER BY 6 DESC");
    ?>
    <body class="e4e8e9-bg">
        <?php
        include 'include/admin-nav-start.php';
        ?>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#">Profile</a></li>
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="help.php">Help</a></li>
            <li class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-power-off"></i> logout</a></li>
        </ul>
        <?php
        include 'include/admin-nav-end.php';
        ?>

        <div class="container-fluid">
            <div class="row">
                <?php
                include 'include/sidebar-navigation.php';
                ?>
            </div>
        </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Your Notifications</h1>

                <?php
                while ($n_row = mysqli_fetch_array($n_result)) {
                    if ($n_row['indicator'] == 'admin') {
                        $n_id = $n_row['legend_id'];

                        $n_legend = mysqli_query($con, "SELECT * FROM notification_legend WHERE legend_id LIKE '$n_id'");
                        $n_color = mysqli_fetch_array($n_legend);

                        if ($n_color['color'] == 'red') {
                            echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                                <div class="panel panel-notif panel-danger">
                                    <div class="panel-heading">' . $n_row['notification_date'] . '
                                        <a href="#" title="cancel"><i class="fa fa-remove delete-btn x-btn"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        ' . $n_row['notification'] . '
                                    </div>
                                </div>
                            </div>';
                        } else if ($n_color['color'] == 'orange') {
                            echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                                <div class="panel panel-notif panel-warning">
                                    <div class="panel-heading">' . $n_row['notification_date'] . '
                                        <a href="#" title="cancel"><i class="fa fa-remove delete-btn x-btn"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        ' . $n_row['notification'] . '
                                    </div>
                                </div>
                            </div>';
                        } else if ($n_color['color'] == 'green') {
                            echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                                <div class="panel panel-notif panel-success">
                                    <div class="panel-heading">' . $n_row['notification_date'] . '
                                        <a href="#" title="cancel"><i class="fa fa-remove delete-btn x-btn"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        ' . $n_row['notification'] . '
                                    </div>
                                </div>
                            </div>';
                        } else if ($n_color['color'] == 'blue') {
                            echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                                <div class="panel panel-notif panel-info">
                                    <div class="panel-heading">' . $n_row['notification_date'] . '
                                        <a href="#" title="cancel"><i class="fa fa-remove delete-btn xbtn"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        ' . $n_row['notification'] . '
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                }
                ?>
            </div>
                    <?php
        include 'include/scripts.php';
        ?>
        <script type="text/javascript" src="js/listslide.js"></script>
</body>
</html>