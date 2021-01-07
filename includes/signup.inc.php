<?php
  include_once 'dbh.inc.php';  // database acces from dbh.inc.php 

  $first = $_POST['first'];
  $last = $_POST['last'];
  $email = $_POST['email'];
  $nickname = $_POST['nickname'];
  $pass = $_POST['pass'];
  // secure password
  $pass_encrypt = md5($pass);

  //$sql = "INSERT INTO datasystem (user_first, user_last, user_email, user_nickname, user_pwd) VALUES ('$first', '$last', '$email', '$nickname', '$pass')";
  
  echo '<a href="http://localhost/projects/project1/includes/while.php">';
    echo '<input type="submit"/> Confirm your registration';
  echo '</a>';
  
    // mysqli_query($conn, $sql);  
	
	$exe_query = mysqli_query($conn, "INSERT INTO datasystem SET id='', 
	user_first='$first', 
	user_last='$last', 
	user_email='$email', 
	user_nickname='$nickname', 
	user_pwd='$pass_encrypt'");

    /* create a button to go to the front page */

   //header("Location: ../index.php?signup=success");


   
?>