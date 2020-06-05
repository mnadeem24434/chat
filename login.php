<?php
session_start();
if (isset($_POST['user'])) {
	$_SESSION['nick'] = $_POST['user'];
	header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat Login</title>
	<script src="jquery/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header">
						<h1>Chat Login</h1>
					</div>
					<div class="card-body">
						<div class="form-control">
							<form action="" method="post">
							<label>You are going to chat with the strangers, create your nick name. Everytime you login you have to choose a nick name</label>
								<input name="user" class="form-control" placeholder="Type your nickname here" required></input>
								<button name="submit" type="submit" class="form-control btn btn-primary">Send</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>