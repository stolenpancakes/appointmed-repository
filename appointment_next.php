<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Appointments";
    include 'include/head.php';
    include 'connectdatabase.php';
    include 'include/scripts.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".appo").click(function() {
                $("#appo_id").val($(this).data('id'));
                $("#doc_id").val($(this).data('doctor-id'));
                $("#clin_id").val($(this).data('clinic-id'));
                $("#days").val($(this).data('days'));
            });
        });
    </script>
    <body>
        <div class="container">
            <?php
            session_start();
            if (isset($_SESSION['loggedIn']) && isset($_SESSION['account_type']) && isset($_SESSION['username'])) {
                $loggedIn = $_SESSION['loggedIn'];
                $account_type = $_SESSION['account_type'];
                $username = $_SESSION['username'];
                $date_today = date('Y-m-d');

                if ($loggedIn == false)
                    header("location: index.php");
                else if ($account_type != 'Patient')
                    header("location: index.php");
            }else {
                header("location: index.php");
                die();
            }

            $month = date("m");
            $next = $month+1;
            $start = date("Y-".$next."-1");
            $next_month = date("Y-".$next."-t");

            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'");
            $row = mysqli_fetch_array($result);
            $patient_id = $row['patient_id'];
            $patient_n = $row['patient_name'];
            $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient_id' AND (appointment_status = 'Inqueue') AND (appoint_date >= '$start' AND appoint_date <= '$next_month') ORDER BY 5");

            $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE patient_id LIKE '$patient_id' AND (indicator = 'doctor' OR indicator = 'admin')");
            $count_row = mysqli_fetch_array($count_result);
            $count_announcement = mysqli_query($con, "SELECT * FROM announcement WHERE start_publish <= '$date_today' AND end_publish >= '$date_today' AND (send_to = 'all' OR send_to = 'patient')");
            $notif_count = $count_row['count'];
            $announcement_count = mysqli_num_rows($count_announcement);
            $notif_count2 = $notif_count + $announcement_count;
            $date_today = date('Y-m-d');
            ?>
            <!-- navigation -->
            <?php
            include 'include/pt-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="dropdown active tooltip-right" data-tooltip="Appointments">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-calendar fa-lg"></i>Appointments<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="appointment.php">Today</a></li>
                        <li><a href="appointment_tom.php">Tomorrow</a></li>
                        <li><a href="appointment_week.php">This Week</a></li>
                        <li><a href="appointment_month.php">This Month</a></li>
                        <li><a href="appointment_next.php">Next Month</a></li>
                    </ul>
                </li>
                <li class="tooltip-right" data-tooltip="Notifications">
                    <a href="notifications.php">
                        <i class="fa fa-bell fa-lg">
                            <?php
                            if ($notif_count2 == 0)
                                echo '<span class="badge hide">' . $notif_count2 . '</span>';
                            else
                                echo '<span class="badge">' . $notif_count2 . '</span>';
                            ?>
                        </i>Notifications
                    </a>
                </li>
                <li class="dropdown tooltip-right" data-tooltip="History">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"></i>History<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="appointments_done.php">Appointments Done</a></li>
                        <li><a href="cancelled_appointments.php">Cancelled Appointments</a></li>
                    </ul>
                </li>
                <?php
                include 'include/pt-nav-end.php';
                ?>     
                <!-- /navigation -->           
                <div class="container-fluid" id="appointments-user">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center row-header-fff">&mdash; Next Month &mdash;</h1>
                        </div>
                        <?php
                        include 'include/appointment-panel.php';
                        ?>
                    </div>
                </div>
                <?php
                include 'include/edit-modal.php';
                include 'include/scrolltop.php';
                include 'include/edit-profile-modal.php';
                ?>  
                <script type="text/javascript" src="js/search.js"></script>
        </div> <!-- /container -->
    </body>
</html>