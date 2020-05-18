<?php
include "connection.php";

$alldata ="
	SELECT * FROM msg
";

$all = $conn->Query($alldata);

$strt_point = mysqli_num_rows($all) - 100;

$msgqry ="
	SELECT * FROM msg  WHERE id > $strt_point ORDER BY time DESC
";

/*$msgqry ="
	SELECT * FROM msg ORDER BY time DESC LIMIT 10
";*/



$result = $conn->Query($msgqry);

if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<p><b>".$row['nick']."</b> : ".$row['msg']." - <i><u>".$row['time']."</u></i></p>";
	}
}
else{
	echo mysqli_error($conn);
}



?>