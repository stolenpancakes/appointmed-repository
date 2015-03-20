<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "appoint.med | Home";
        include 'include/head.php';
        include 'connectdatabase.php';
  
    ?>
    <?php
        session_start();
        if(isset($_SESSION['loggedIn']) && isset($_SESSION['account_type'])){
            $loggedIn = $_SESSION['loggedIn']; 
            $account_type = $_SESSION['account_type'];
            if($loggedIn == true && $account_type == 'Patient')
                header("location: appointment.php");
            else 
                header("index.php");
        }
    ?>

  <body class="e4e8e9-bg">
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand hidden-lg hidden-md" href="#">benguet labs</a>
                    <a class="navbar-brand logo-text hidden-sm hidden-xs" href="#">appoint.med</a>
                    <div class="navbar-logo hidden-sm hidden-xs">
                    </div>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="companyprofile.php">About</a></li>
                        <li class="dropdown">
        
                        </li>
                        <li><a href="doctors.php">Doctors</a></li>
                        <li><a href="signup.php">Signup</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                        <button type="button" class="btn btn-default login-modal-btn btn-noborder" data-toggle="modal" data-target=".bs-example-modal-sm">Login</button>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container-fluid" id="index-frw">
            <div class="row">
                <div class="col-xs-12 col-md-7 visible-md visible-lg">
                    <p class="login-text"><span>appoint.med</span> ... an online scheduling system that allows you to create appointments to a doctor anywhere, anytime.</p>
                </div>
                <div class="col-xs-12 col-md-4 visible-xs visible-sm ">
                    <div class="usr-login">
                        <form method="post" action="login.php">
                            <div class="input-group">
                                <input type="text" class="form-control login-field" name="username" placeholder="Username" required>
                                <i class="fa fa-user field-icon"></i>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control login-field" name="password" placeholder="Password" required>
                                <i class="fa fa-lock field-icon"></i>
                            </div>
                            <input class="btn btn-default login-btn btn-noborder" type="submit" value="Login" name="login"/>
                        </form>
                    <a class="login-link" href="signup.php">Don't have an account?</a>
                    </div>
                </div>
                <?php 
                    include 'include/user-login.php'
                 ?>
            </div>
        </div>
        <div class="container-fluid" id="clinics">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h1 class="text-center row-header">Benguet Laboratories</h1>
                </div>
                <div class="col-xs-12 col-md-8">
                    <div class="g-map">
                        <iframe width="600" height="450" frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/place?q=Benguet%20Laboratories%20-%20SM%20City%20Baguio%2C&key=AIzaSyCbweT-jLxTUhNFbJE8FJdFuiL8x2hiNww"></iframe>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="map-location">
                        <p>
                            <i class="fa fa-location-arrow fa-2x"></i>
                            044 &amp; 045, Lower Ground Level SM City, Luneta Hill, Baguio City, Benguet, Philippines
                        </p>
                        <p>
                            <i class="fa fa-map-marker fa-lg"></i>
                            <a href="bgh.html">
                                Baguio General Hospital Driveway, Baguio City,Benguet, Philippines
                            </a>
                        </p>
                        <p>
                            <i class="fa fa-map-marker fa-lg"></i>
                            <a href="#">
                                Saint Louis University, Gen. Luna Road, Baguio City, Benguet, Philippines
                            </a>
                        </p>
                    </div>
                    <p class="text-right more-btn">
                        <a href="#" class="btn btn-default btn-noborder">show more</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="about">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h1 class="text-center row-header">About</h1>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="about-icons text-center">
                        <img src="img/startup.png" alt="">
                        <p><span>ipsum dolor sit amet</span> consectetur adipisicing elit</p>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="about-icons text-center">
                        <img src="img/lab.png" alt="">
                        <p><span>Hospitals &amp; Laboratories</span> consectetur adipisicing elit</p>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="about-icons text-center">
                        <img src="img/responsive.png" alt="">
                        <p><span>Responsive</span> display varies on different devices</p>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="about-icons text-center">
                        <img src="img/website.png" alt="">
                        <p><span>Online</span> make appointments anywhere</p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-7 company-profile">
                    <h2>Company Profile</h2>
                    <p>BenguetCorp Laboratories Inc. Is a wholly owned subsidiary of publicly listed company Benguet Corporation. Benguet Corporation has more than a 100 year old history and tradition in the mining industry and is considered the industry leader. It has since branched into non-mining concerns, foremost of which is its foray into the healthcare industry.</p>
                    <p>BenguetCorp Laboratories Inc. Operates a chain of outpatient medical and health facilities under the trade name Med Central. Med Central has three operating healthcare clinics: SM Baguio, Centermall Baguio and SM San Fernando, Pampanga.</p>
                    <p class="text-right more-btn">
                        <a href="companyprofile.php" class="btn btn-default btn-noborder">read more</a>
                    </p>
                </div>
                <div class="col-xs-12 col-md-5 ">
                    <img src="img/lab.jpg" class="img-responsive" alt="Responsive image">
                </div>
            </div>
        </div>


        <?php
          //  include 'include/footer.php';
            include 'include/scrolltop.php';
            include 'include/scripts.php';
        ?>

        <script type="text/javascript" src="js/listslide.js"></script>
        <script type="text/javascript" src="js/scrolltop.js"></script>
    </div> <!-- /container -->
  </body>
</html>