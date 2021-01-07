<?php

include('dbh.inc.php');

$qp_datasystem_results = mysqli_query($conn, "SELECT * FROM datasystem ORDER BY id ASC");

// $row = 0;                            this is an selection of the Nicknames registered in the database
// while($qf_datasystem_results = mysqli_fetch_array($qp_datasystem_results)){
// 	$row++;
//	echo "Row Number <b>" . $row . ": " . $qf_datasystem_results["user_nickname"] . "<br />";
// }

switch($_GET["action"]){
	default:
		if(!isset($_COOKIE["connected"])){ // check if the customer is NOT logged in
			echo "Please, login:
			<br><br><form action=\"?action=send_login\" method=\"post\">
				<br><b>Email</b>
				<br><input type=\"text\" name=\"email\">
				<br><br><b>Password</b>
				<br><input type=\"password\" name=\"password\">
				<br><br><input type=\"submit\" value=\"Login\">
				</form>";
		}else{ // OTHERWISE IF THE CUSTOMER IS LOGGED IN
			$userid = $_COOKIE["connected"];
			$qf_user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM datasystem WHERE id='$userid'"));
			echo "<br><br>You're logged in as <b>" . $qf_user["user_first"] . " (Not " . $qf_user["user_first"] . "?, please <a href=\"?action=logout\">Log out</a>)";
		    echo '<form action="http://localhost/projects/project1/includes/account.inc.php" method="POST" >';
            echo '<button type="submit" name="submit"> Go to Account Page </button>';
            echo '</form>';
			}
	break;
	case 'send_login':
		$email = $_POST["email"];
		$password = md5($_POST["password"]);
		$check_customer = mysqli_query($conn, "SELECT * FROM datasystem WHERE user_email='$email' AND user_pwd='$password'");
		$check_customer_n = mysqli_num_rows($check_customer);
		if($check_customer_n < 1){
			echo "<br><br>Ops, your account does not exist.";
		}else{
			$qf_check_customer = mysqli_fetch_array($check_customer);
			$cookie_name = "connected";
			$cookie_value = $qf_check_customer["id"];
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			echo "<br><br>CONNECTED SUCCESSFULLY AS " . $qf_check_customer["user_first"] . "";
?>
<script type="text/javascript">
	function redirect_login(){
		location.href = 'while.php';
	}
	window.setTimeout('redirect_login()', 10000);
</script>
<?php
		}
	break;
	case 'logout':
		unset($_COOKIE["connected"]);
		setcookie("connected", null, -1, "/");
		echo "<br><br>NOW YOU ARE NOT LOGGED IN ANYMORE, WE ARE SO SAD TO SAY YOU GOODBYE.";
	break;
}
echo '<br>';

  echo '<form action="http://localhost/projects/project1/file.php" method="POST" >';
echo '<button type="submit" name="submit"> Go Back </button>';
echo '</form>';



?>