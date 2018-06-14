<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/heroic-features.css" rel="stylesheet">
        
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>SMART DOCTOR - Help</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.php">SMART DOCTOR</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php
                        
                            if(isset($_SESSION['login_user'])){
                                echo 
                        '<li>
                            <a href="../diagnosis/diagnosis.php">Diagnosis</a>
                        </li>';
                            }
                        ?>
                        <li>
                            <a href="../about/aboutus.php">About Us</a>
                        </li>
                        <li>
                            <a href="../contact/contactus.php">Contact Us</a>
                        </li>
                        <li>
                            <a href="../help/help.php">Help</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <?php 
                        if(!isset($_SESSION['login_user'])){
                            echo '<li class="pull-right">
                            <a href="../users/login.php">Login</a>
                        </li>
                        <li class="pull-right">
                            <a href="../users/signup.php">Sign Up</a>
                        </li>';
                        }else{
                            echo '<li class="pull-right">
                            <a href="../profile/profile.php">Profile</a>
                        </li>
                        <li class="pull-right">
                            <a href="../users/signout.php">Sign Out</a>
                        </li>';
                        }
                    ?>    
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        
        
        <div class="panel panel-default container">
            <div class="panel-body" style="text-align: center">
                <h2 style="text-align: center">We can help you to get a better service from us!</h2>
                
                <hr>
                
                <h4>Before you using our service you should log in to the our system.</h4>
                <img src="../images/help/login_signup.PNG" alt=""/>
                
                <hr>
                
                <h4>After Login you can access you profile from here.</h4>
                <img src="../images/help/afterlogin.PNG" alt=""/>
                
                <hr>
                
                <h4>After login into the our system you can see unlock our services.</h4>
                <img src="../images/help/Capture.PNG" alt=""/>
                
                <hr>
                
                <h4>Click here to start begin the diagnostic</h4>
                <img src="../images/help/start diag.PNG" alt=""/>
                
                <hr>
                
                <h4>First of all select you gender and your birth year. Then select in which body location you have to diagnostic. also in here you can search and fill your symptoms.</h4>
                <img src="../images/help/select symptoms.PNG" alt=""/>
                
                <hr>
                <h4>In here you should select sub body location according to your symptoms!</h4>
                <img src="../images/help/sub body location.PNG" alt=""/>
                
                <hr>
                <h4>After select sub body locations you can select you symptoms</h4>
                <img src="../images/help/symp.PNG" alt=""/>
                
                <hr>
                <h4>In here you can see we added you symptoms. read our agreements and check i agree. then click analyze disease patterns to analyze you symptoms.</h4>
                <img src="../images/help/list out.PNG" alt=""/>
                
                <hr>
                <h4>In here we asking question and help you to get better diagnostic service!</h4>
                <img src="../images/help/predict.PNG" alt=""/>
                
                <hr>
                <h4>In here we showing predict disease patterns according to your symptoms</h4>
                <img src="../images/help/disease.PNG" alt=""/>
                
                <hr>
                <h4>Contact us anytime.</h4>
                <img src="../images/help/mail.PNG" alt=""/>
                
                <hr>
                <h4>Thank you for using our service.</h4>
            </div>
        </div>
        
        
        <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="pull-left">
                                <p>SMART DOCTOR 2017</p>
                            </div>
                            <div class="pull-right">
                                <p>Design And Developed Under CMIS 3122 RAD Project</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>


    </body>
</html>
