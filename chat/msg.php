<?php
include "connection.php";

session_start();
$nick = $_SESSION['nick'];

$alldata ="
	SELECT * FROM msg
";

$all = $conn->Query($alldata);

$strt_point = mysqli_num_rows($all) - 50;

$msgqry ="
	SELECT * FROM msg  WHERE id > $strt_point ORDER BY time DESC
";

/*$msgqry ="
	SELECT * FROM msg ORDER BY time DESC LIMIT 10
";*/



$result = $conn->Query($msgqry);

if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['nick'] == $nick) {
			$class = "alert alert-danger";
		}
		else
		{
			$class = "alert alert-primary";
		}
		echo "<div class='$class'>(".$row['id'].") <b>".$row['nick']."</b> : ".$row['msg']."</div>";
	}
}
else{
	echo mysqli_error($conn);
}



?>