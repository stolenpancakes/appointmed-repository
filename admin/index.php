<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "Admin Login";
        include 'include/head.php';

    ?>
  <body class="ecf0f1-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-4">
                 <h1 class="text-center">Admin &amp; Doctor Login</h1>
                <div class="usr-login">
                    <div class="input-group">
                    <form method="post" action ="login.php">
                         <input type="text" class="form-control login-field" name="username" placeholder="Username" required>
                            <i class="fa fa-user field-icon"></i>
                        </div>

                        <div class="input-group">
                            <input type="password" class="form-control login-field" name="password" placeholder="Password" required>
                            <i class="fa fa-lock field-icon"></i>
                        </div>
                        <input type="submit" name="login" class="btn btn-default login-btn" value="LogIn">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'include/scripts.php';
    ?>
  </body>
</html>