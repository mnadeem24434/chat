<?php
include "connection.php";
session_start();
$msg = $_POST['msgsent'];
$nick = $_SESSION['nick'];

$qry ="
	INSERT INTO msg VALUES (null, '$msg',null, '$nick')
";

$statment = $conn->Query($qry);

if ($statment) {
	echo "inserted";
}
else{
	echo mysqli_error($conn);
}


?>