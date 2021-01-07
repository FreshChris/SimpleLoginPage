<?php

if (isset($_POST["reset-request-submit"])) {

$selector = bin2hex(random_bytes(8));   // tokens created to check if is the correct user who wants to change pass
$token = random_bytes(32);

$url = "http://localhost/projects/project1/create-new-password.php?selector=" . $selector . "&validator=" . 
bin2hex($token);

$expires = date("U") + 1800;

require 'dbh.inc.php';

$userEmail = $_POST["email"];

$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";  // secured system for reseting the password, prepared statement 
$stmt = mysqli_stmt_init($conn);        // initializing a new prepared statement from database file
if (!mysqli_stmt_prepare($stmt, $sql)) {

echo"There was an error!";    // first check for errors then for success, coze is better , after it can result that cannot find the errors
exit();
} else {
	mysqli_stmt_bind_param($stmt, "s", $userEmail ); // datatype "s" string to link to postdata
    mysqli_stmt_execute($stmt);
	}

	$sql ="INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);        
if (!mysqli_stmt_prepare($stmt, $sql)) {
echo"There was an error!";  
exit();
} else {
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);

	$to = $userEmail;

	$subject = 'Reset your password for Your Akuto Account';

	$message = '<p> We received a password reset request. The link to reset your passowrd is below, if you did not
	make this request, you can ignore this email. </p>';
	$message .= '<p> Here is your password reset link: </br>';
	$message .= '<a href="' . $url . '">' . $url . '</a></p>';

	$headers = "From: akuto <akuto@gmail.com\r\n";
	$headers = "Reply-To: akuto@gmail.com\r\n";
	$headers = "Content-type: text/html\r\n";

	mail($to, $subject, $message, $headers);

	header("Location: ../reset-password.php?reset=succes");


} else {
	header("Location: ../index.php");
}