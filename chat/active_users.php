<?php
include "connection.php";
session_start();
$nick = $_SESSION['nick'];

$msgqry ="
	SELECT * FROM active_users ORDER BY last_check DESC
";

/*$msgqry ="
	SELECT * FROM msg ORDER BY time DESC LIMIT 10
";*/



$result = $conn->Query($msgqry);

if ($result) {
	echo "<h6>Active Users</h6><ul>";
	while ($row = mysqli_fetch_assoc($result)) {

		if ($row['nick'] == $nick) {
			$name = $row['nick']." ( me )";
		}
		else
		{
			$name = $row['nick'];
		}

		echo "<li>".$name."</li>";
	}
	echo "</ul>";
}
else{
	echo mysqli_error($conn);
}



?>