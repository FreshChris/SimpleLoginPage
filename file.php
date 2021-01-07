<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title> PHP Web Page </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="includes/css1.css" media="screen"/>

</head>
<body>
<style>
 background-color:#00ffff;
 
</style>
<h2 style="text-align:center;"> Welcome to our page, if you're new here then please sign up bellow here, if not please click Login Now. </h2>
<div class="container" style="width: 200px; padding: 50px 0px;">
<h2> Please login </h2>
  

<form action="includes/signup.inc.php" method="POST" >   
 
<div class="form-group">
<label for="first"> First Name: </label>
 <input type="text" name="first" placeholder="YourFirstName">
</div>
<div class="form-group">
<label for="last"> Last Name: </label>
 <input type="text" name="last" placeholder="YourLastName">
 </div>
 <div class="form-group">
<label for="email"> Email: </label>
 <input type="text" name="email" placeholder="E-mail">
</div>
<div class="form-group">
<label for="nickname"> Nickname: </label>
 <input type="text" name="nickname" placeholder="Choose Your Nickname">
 </div>
 <div class="form-group">
<label for="pass"> Password: </label>
 <input type="password" name="pass" placeholder="Your Password">
 </div>
 <br>
 <br>

 <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block"> Register Now </button>
 
</form> 
<br>
<form action="includes/while.php" method="POST" >
<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block"> Login Now </button>
</form>
<br> 
 

<?php 
  if (isset($_get["newpwd"])) {   // password recovery system
        if ($_GET["newpwd"] == "passwordupdated") {
            echo '<p class="signupsuccess"> Your password has been reset!</p>';
        }
  }

  ?>
<a href="http://localhost/projects/project1/includes/reset-password.php"> Forgot your password ? </a>

</div>


   <?php
   
   // we insert the statement instead of select, we basicaly run the code 
    // insert data into our data directly from website using php  code
    
    // "SELECT * FROM datasystem;";   // using MySQLi to interact with the database , sql statement do something 
   // mysqli_query($conn, $sql);  // now is working like a running without telling if this is results
   // I deleted * $result = *  query , using the connection
   /* $resultCheck = mysqli_num_rows($result);  // check if we got any results

    if ($resultCheck > 0) {    // when is working will gonna do a statement 
       while ($row = mysqli_fetch_assoc($result)) {
           echo $row['email'] . "<br>";
      }
      }  */      // we will change with buttons.

?>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>