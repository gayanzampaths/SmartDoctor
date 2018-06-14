<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/heroic-features.css" rel="stylesheet">
        <title></title>
    </head>
    <body>
        <?php
            // put your code here
            include '../config/connectionConfig.php';
            
            session_start();
            $eval = 0;
            
            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $username = $_POST['uname'];
                $password = $_POST['pwd'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                
                $sqlcheck = "SELECT * FROM users where username = '".$username."'";
                
                $result = mysqli_query($dbc, $sqlcheck);
                
                if(mysqli_num_rows($result) > 0){
                    $eex = "That Username already exists."; 
                    $eval = 1;
                } else {
                    $sql = "INSERT INTO users (username,password,name,email) VALUES ('$username','$password','$name','$email')";

                    if ($dbc->query($sql) === TRUE) {
                        $_SESSION['login_user']=$username;
                        echo '<div class="panel panel-default"><div class="panel-body"><h3 class="alert alert-success">Thank You for Sign Up!</h3><br><a href="../home/home.php"><button class="btn btn-default">Go To Home</button></a></div></div>';
                        header("location:../home/home.php");
                        /*echo '<div class="panel panel-default">
            <div class="panel-body"><h4 class="alert alert-success">Successfully Sign Up!</h4><br>
                <a href="../home/home.php"><button class="btn btn-default">Go To Home</button></a></div>
        </div>
        <script>
            document.getElementById("signup").style.display="none";
        </script>';*/
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . $dbc->error;
                    }
                }

                
                

                $dbc->close();
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
                    <a class="navbar-brand" href="../home/home.php">SMART DOCTOR</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="pull-right">
                            <a href="../users/login.php">Log In</a>
                        </li>
                    </ul>
                    
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        
        
       <!-- '<div class="panel panel-default"><div class="panel-body"><h3 class="alert alert-success">Thank You for Sign Up!</h3></div></div>'-->
        
        <div class="form-group container" id="signup">
            
            <!-- Jumbotron Header -->
            <header class="jumbotron hero-spacer">
                
                        
                
                <h3 style="text-align: center">Please Sign Up with required Details!</h3>
                
                
                <?php
                            if($eval==1){
                                echo '<h5 class="alert alert-warning">'.$eex.'</h5>';
                            }
                        ?>
                
                <form action="" method="post">
                    <label>Name: </label><input type="text" name="name" required class="form-control"><br>
                    <label>username: </label><input type="text" name="uname" required class="form-control"><br>
                    <label>Password: </label><input type="password" name="pwd" required class="form-control"><br>
                    <label>Email: </label><input type="email" name="email" required class="form-control"><br>
                    <input type="submit" class="btn btn-block btn-primary" value="Sign Up">
                </form>
            </header>
            
            
            
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