<?php

if (isset($_POST["reset-password-submit"])) {

$selector = $_POST["selector"];                        //variables for the reseting the password
$validator = $_POST["validator"];
$password = $_POST["pwd"];
$passwordRepeat = $_POST["pwd-repeat"];

if (empty ($pasword) || empty ($passwordRepeat)) {   // to check password reset to not be empty or if is the same , it can't be
	header("Location: ../create-new-password.php?newpwd=empty");
	exit();
} else if ($password != $passwordRepeat) {
header("Location: ../create-new-password.php?newpwd=pwdnotsame");
	exit();
} 

$currentDate = date("U");   // to check the date , if the token is expired or not

require 'dbh.inc.php';

// when we run the selector, variable Date was created by me, we don't need to run as placeholder

$sql = "SELECT * FROM pwdReset WHERE pwdResetSelect=? AND pwdResetExpires >= ";

$stmt = mysqli_stmt_init($conn);        // initializing a new prepared statement from database file
if (!mysqli_stmt_prepare($stmt, $sql)) {

echo"There was an error!";    // first check for errors then for success, coze is better , after it can result that cannot find the errors
exit();
} else {
	mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate ); // changed fixed with current date
    mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);
	if (!$row = mysqli_fetch_assoc($result)) {
	  echo "You need to re-submit your reset request.";
	  exit();
	} else {
		$tokenBin = hex2bin($validator);
		$tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

		if ($tokenCheck === false) {
		 echo "You need to re-submit your reset request.";
		 exit();
		} elseif ($tokenCheck === true) {

		$tokenEmail = $row['pwdResetEmail'];
		$sql = "SELECT * FROM users WHERE emailUsers=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			exit();
		} else {

		mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
	if (!$row = mysqli_fetch_assoc($result)) {
	  echo "There was an error!";
	  exit();
	} else {
	    
	$sql = "UPDATE users SET pwdUsers=? WHERE emailUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			exit();
		} else {
		$newPwdHash = password_hash($password, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "s", $newPwdHash, $tokenEmail);
		mysqli_stmt_execute($stmt);

	$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "There was an error!";
		exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
			mysqli_stmt_execute($stmt);
			header("Location: ../signup.php?newpwd=passwordupdated");
		}

		}
	}
	}
	}
	}


} else {
	header("Location: ../index.php");
}

?>