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
        
        <!--diagnostic controller needed libraries-->
        <link rel="stylesheet" type="text/css" href="symptom_selector/selector.css?v=1">
        <link rel="stylesheet" type="text/css" href="symptom_selector/fontawesome/assets/css/font-awesome.min.css" />
        <script src="libs/jquery-1.12.2.min.js"></script>
        <script src="libs/json2.js"></script><!-- json for ie7 -->
        <script src="libs/jquery.imagemapster.min.js?v=1.1"></script>
        <script src="libs/typeahead.bundle.js"></script>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <script src="symptom_selector/selector.js?v=3.3"></script>
        
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        session_start(); // this causes some issues with certain servers, try this if it's working with this line or not.

	if ( !isset( $_SESSION['userToken']) || !isset( $_SESSION['tokenExpireTime']) || time() >= $_SESSION['tokenExpireTime'] )
	{
		require 'token_generator.php';
		$tokenGenerator = new TokenGenerator("gayanzampaths@gmail.com","Gr73BxCf5t2NEm69K","https://sandbox-authservice.priaid.ch/login");
		$token = $tokenGenerator->loadToken();
		$_SESSION['userToken'] = $token->{'Token'};
		$_SESSION['tokenExpireTime'] = time() + $token->{'ValidThrough'};
	}

	$token = $_SESSION['userToken'];
        
        //echo  "token : ".$token;
        
        ?>
        
        <!-- diagnostic controller js -->
        <script type="text/javascript">

            var userToken = <?php echo "'".$token."'" ?>;
		
            $(document).ready(function () {
                $("#symptomSelector").symptomSelector(
                {
                    mode: "diagnosis",
                    webservice: "https://sandbox-healthservice.priaid.ch",
                    language: "en-gb",
                    specUrl: "sample_specialisation_page",
                    accessToken: userToken
                });
            });
        </script>
        
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
                    <a class="navbar-brand" href="../home/home.php">SMART DOCTOR</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../diagnosis/diagnosis.php">Diagnosis</a>
                        </li>
                        <li>
                            <a href="../about/aboutus.php">About</a>
                        </li>
                        <li>
                            <a href="../contact/contactus.php">Contact</a>
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
        
        
        <!--diagnosis start section -->
        <div diag="welcome" style="display: block" id="start" class="container">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1>Lest's Start Diagnostic</h1>
                </div>
                <div class="panel-body">
                    <dev class="pull-right">
                        <img src="../images/diag/DoctorFade.gif" alt=""/>
                    </dev>
                    <dev>
                        <h3>We don't store your any information about diagnosis. That's mean you can annomously use our system.
                            <br><br><br>Click <kbd>Start Diagnostic</kbd> button for start diagnostic!</h3>
                        <br>
                        <a><button class="btn btn-primary" onclick="start()">Start Diagnostic</button></a>
                    </dev>
                    
                </div>
            </div>
        </div>
        
        <div id="diag" style="display: none" class="container">
            <h1>This is diagnostic section!</h1>
            <div>
                
                <table class="container-table">
                    <tr>
                        <td valign="middle" colspan="2" class="td-header box-white bordered-box width50"><h4 class="header" id="selectSymptomsTitle"><span class="badge pull-left badge-primary visible-lg margin5R">1</span></h4></td>
                        <td valign="middle" class="td-header bordered-box box-white width25"><h4 class="header" id="selectedSymptomsTitle"><span class="badge pull-left badge-primary visible-lg margin5R">2</span></h4></td>
                        <td valign="middle" class="td-header bordered-box box-white width25"><h4 class="header" id="possibleDiseasesTitle"><span class="badge pull-left badge-primary visible-lg margin5R">3</span></h4></td>
                    </tr>
                    <tr>
                        <td valign="top" class="selector_container bordered-box box-white width25"><div id="symptomSelector"></div></td>
                        <td valign="top" class="selector_container bordered-box box-white width25"><div id="symptomList"></div></td>
                        <td valign="top" class="selector_container bordered-box box-white width25"><div id="selectedSymptomList"></div></td>
                        <td valign="top" class="selector_container bordered-box box-white width25"><div id="diagnosisList"></div></td>
                    </tr>
                </table>
                
            </div>
            
            <br>
            <br>
            
            <a><button class="btn btn-block btn-default" onclick="printDiag()">Diagnostic Complete!</button></a>
        </div>
        
        <div id="res" style="display: none">
            
            <div id="dia" class="container">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4> Thank You For Using Our Diagnostic System!</h4>
                    </div>
                    <div class="panel-body">
                        
                        <div class="pull-left">
                            <h4>In here we provide some conclusions with good accuracy!
                            <br>
                        but we strongly recommend you visit to a DOCTOR!</h4>
                        </div>
                        <div class="pull-right">
                            <img src="../images/diag/warning-512.gif" alt="" style="width: 50px; height: auto"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <script>
            function start(){
                document.getElementById("start").style.display="none";
                document.getElementById("diag").style.display="block"
            }
            
            function printDiag(){
                document.getElementById("res").style.display="block";
                document.getElementById("diag").style.display="none";
            }
        </script>
        
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
        
        
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
