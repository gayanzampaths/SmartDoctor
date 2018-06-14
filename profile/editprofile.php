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
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
            session_start();
            
            include '../config/connectionConfig.php';
            

            
            $username = $_SESSION['login_user'];
            
            $test = 0;
            
            $sql = "SELECT * FROM users where username = '".$username."'";
            
           
            
            $result = mysqli_query($dbc, $sql);
            
            if ($result->num_rows > 0) {
            
                while($row = $result->fetch_assoc()) {
                    $xname = $row['name'];
                    $xemail = $row['email'];
                }
            }
            
            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $updatename = $_POST['name'];
                $updatemail = $_POST["email"];
                
                $sql = "UPDATE users SET name = '".$updatename."', email = '".$updatemail."' where username = '".$username."'";
                
                //$sqlcheck = "SELECT * FROM users where username = '".$updateduname."'";
                
                //$results = mysqli_query($dbc, $sqlcheck);
                
                //if(mysqli_num_rows($results) > 0){
                  //  $suc = "That Username already exists."; 
                   // $test = 3;
                //}else{
                
                
                if ($dbc->query($sql) === TRUE) {
                    $suc = "Record updated successfully";
                    $test = 1;
                } else {
                    $suc = "Error updating record: " . $conn->error;
                    $test = 2;
                }
            }

            
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
                        <li>
                            <a href="../diagnosis/diagnosis.php">Diagnosis</a>
                        </li>
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
        
        
        <div class="container">
            <h1>
                <?php
                if($test==1){
                    echo $suc;
                }
                if($test==2){
                    echo $suc;
                }
                if($test==3){
                    echo $suc;
                }
            ?>
            </h1>
            
            
            <form action="" method="post">
            <label>Name: </label><input type="text" name="name" required class="form-control" value=<?php  echo '"'.$xname.'"' ?>><br>
            <label>Email: </label><input type="text" name="email" required class="form-control" value=<?php  echo '"'.$xemail.'"' ?>><br>
                    <br>
                    <input type="submit" class="btn btn-block btn-primary" value="Update">
                </form>
        

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
