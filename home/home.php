<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SMART DOCTOR</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/heroic-features.css" rel="stylesheet">
        
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
        // put your code here
            session_start();
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
        
        
        <div>
            <!--slide show-->
            <div class="container-fluidr">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="../images/slides/image.jpg"style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="../images/slides/image2.jpg" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="../images/slides/image1.jpg" style="width:100%;">
                    </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
            <!--slide show end-->
        </div>

        <!-- Page Content -->
        <div class="container">
            <!-- Jumbotron Header -->
            <header class="jumbotron hero-spacer" style="background-color: #428bca">
                <h1 style="text-align: center">Your Health is Our Best Priority!</h1>
            </header>

            <hr>

            <!-- Title -->
            <div class="row">
                <div class="col-lg-12">
                    <h3>Latest Features</h3>
                </div>
            </div>
            <!-- /.row -->
            
            <!-- Page Features -->
            <div class="row text-center">

                <div class="col-md-3 col-sm-6 hero-feature">
                    <div class="thumbnail">
                        <img src="../images/home/home1.jpg" alt="">
                        <div class="caption">
                            <h3>Priority!</h3>
                            <p>Your Health is our best priority!</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 hero-feature">
                    <div class="thumbnail">
                        <img src="../images/home/home2.jpg" alt="">
                        <div class="caption">
                            <h3>Accuracy</h3>
                            <p>We Using AI for Diagnostic!</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 hero-feature">
                    <div class="thumbnail">
                        <img src="../images/home/home3.jpg" alt="">
                        <div class="caption">
                            <h3>Instance Results</h3>
                            <p>24/7 open and Instance results!</p>                            
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 hero-feature">
                    <div class="thumbnail">
                        <img src="../images/home/home4.jpg" alt="">
                        <div class="caption">
                            <h3>Easy to Use!</h3>
                            <p>User Friendly Environment!</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->

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

        </div>
        <!-- /.container -->
        
        <!-- slider JS -->
        
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        
    </body>
</html>
