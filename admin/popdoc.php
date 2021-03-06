<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Admin | Add Doctor";
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
    ?>
<body class="e4e8e9-bg">
        <?php 
            include 'include/admin-nav.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <?php
                include 'include/sidebar-navigation.php';
                ?>
            </div>
        </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Add Doctor</h1>
                <div class="add-form">
                    <form method="post" action="adddoc.php">
                        <div class="input-group">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name" required="">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" required=""><br/>
                            <input type="text" class="form-control" name="specialization" placeholder="Specialization" required="">
                            <label>Doctor Status:</label>
                            <select name="status" class="form-control">
                                <option value="In">In</option>;
                                <option value="Out">Out</option>;
                                <option value="Sick Leave">Break</option>;
                            </select>
                            <input type="email" class="form-control" name="email" placeholder="Email" required="">   
                            <input type="text" class="form-control" name="username" placeholder="Username" required="" id="username">

                            <input type="submit" class="btn btn-default orange-btn" value="Submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        <?php
        include 'include/scripts.php';
        ?>
</body>
</html>