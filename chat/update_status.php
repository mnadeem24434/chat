<?php
include "connection.php";
session_start();
$nick = $_SESSION['nick'];

	$qry_insrt ="INSERT INTO active_users VALUES (null, '$nick',null)";
	$statment = $conn->Query($qry_insrt);


$qry_del ="DELETE FROM active_users WHERE last_check < NOW() - INTERVAL 0 second";
$statment = $conn->Query($qry_del);

if ($statment) {
	echo "time()";
}
else{
	echo mysqli_error($UPDATE);
}


?>