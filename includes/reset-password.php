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

<main>
<div class="wrapper-main">
<section class="section-default">
<h2 style="text-align:center;"> You are on the password reset, if you forgot your password, please fill up your e-mail. </h2>
<h2 style="text-align:center;"> Reset your password </h2>
<br>
<br>
<p style="text-align:center;"> An e-mail will be send to you with instructions on how to reset your password. </p>
<form style="text-align:center;" action="/project1/includes/reset-request.inc.php" method="post">
<input type="text" name="email" placeholder="Enter your e-mail address...">
<button type="submit" name="reset-request-submit"> Receive new password by e-mail. </button>
</form>

<?php
if (isset($_GET["reset"])) {
	if ($_GET["reset"] == "success") {
		echo '<p class="signupsuccess"> Check your e-mail ! </p>';
	}
}
?>

<br>
<form style="text-align:center;" action="http://localhost/projects/project1/file.php" method="POST" >
<button type="submit" name="submit"> Go Back </button>
</form>
</section>
</div>
  </main>





 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>