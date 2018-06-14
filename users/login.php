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
            include './redirect.php';
            session_start();
            
            $eval = 0;
            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                // username and password sent from form 
                
                //echo $_POST['name'];
                //echo $_POST['pwd'];
                
                //echo $dbc;

                $myusername = mysqli_real_escape_string($dbc,$_POST['name']);
                $mypassword = mysqli_real_escape_string($dbc,$_POST['pwd']); 

                $sql = "SELECT username FROM users WHERE username = '$myusername' and password = '$mypassword'";
                
                //echo $sql;
                $result = mysqli_query($dbc,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                //$active = $row['active'];

                $count = mysqli_num_rows($result);

                //If result matched $myusername and $mypassword, table row must be 1 row

                if($count == 1) {
                   //session_register("myusername");
                   $_SESSION['login_user'] = $myusername;
                   
                   
                   //echo 'Login Successfull!';
                   //echo $_SESSION['login_user'];
                   echo '<div class="panel panel-default"><div class="panel-body"><h3 class="alert alert-success">Welcome to Smart Doctor!</h3><br><a href="../home/home.php"><button class="btn btn-default">Go To Home</button></a></div></div>';
                   header("location:../home/home.php");
                   
                   //redi();
                   
                   //echo "successfull";
                   
                   //echo '<script type="text/javascript">document.getElementById("t").style.display="none";</script>';
                   //echo '<script>
            //document.getElementById("logins").style.display = "none";
        //</script>';
                   
                }else {
                   $error = "Your Username or Password is invalid";
                   $eval = 1;
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
                    <a class="navbar-brand" href="../home/home.php">SMART DOCTOR</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="pull-right">
                            <a href="../users/signup.php">Sign Up</a>
                        </li>
                    </ul>
                    
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        
        
        <div  class="container" id="logins">
            <header class="jumbotron hero-spacer">
                <h3 style="text-align: center">Please Login With Your credentials</h3>
                    
                    
                    <?php
                        if($eval==1){
                            echo '<h5 class="alert alert-warning">'.$error.'</h5>';
                        }
                    ?>
            
                    <form action="" method="post">
                        <label>username: </label>
                        <input type="text" name="name" required class="form-control"><br>
                        <label>password: </label>
                        <input type="text" name="pwd" required class="form-control"><br>
                        <input type="submit" class="btn btn-block btn-primary" value="Log In">
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