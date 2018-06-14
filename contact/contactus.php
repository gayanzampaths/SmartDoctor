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
        
        $checkval =0;
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comm = $_POST['comments'];
            
            
            $mail = $name ."/n". $email . "/n" .$comm;
            
            //echo $mail;
            
            $mail = wordwrap($mail,70);
            
            mail("sampath142095@wyb.ac.lk","Smart Doctor Contactus",$mail);
            $checkval =1;
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
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../diagnosis/diagnosis.php">Diagnosis</a>
                        </li>
                        <li>
                            <a href=""></a>
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
        
        
        <!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
    <h2 class="text-center">CONTACT</h2>
  
  
  <?php
    if($checkval == 1){
        echo '<h5 class="alert alert-success">Your comment was send successfull! we will respond to you immediatly!<br>Thank You!</h5>';
    }
  ?>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Wayamba University, Kuliyapitiya, Sri Lanka</p>
      <p><span class="glyphicon glyphicon-phone"></span>+94 1234567</p>
      <p><span class="glyphicon glyphicon-envelope"></span> smartdoctor@mail.com</p>
    </div>
      <form action="" method="post">
          <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
      </form>
    
  </div>
</div>

<!-- Add Google Maps -->
<div id="googleMap" style="height:400px;width:100%;"></div>
<script>
function myMap() {
var myCenter = new google.maps.LatLng(7.464083, 80.020546);
var mapProp = {center:myCenter, zoom:18, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmiXdIlZacn4fonpynZtx1TG0eM9WHWwQ&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Bootstrap Theme Made By <a href="https://www.w3schools.com" title="Visit w3schools">www.w3schools.com</a></p>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
        
        <h1>This is Contact US page!</h1>
    </body>
</html>
