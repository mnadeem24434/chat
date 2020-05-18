<?php
session_start();

if (!isset($_SESSION['nick'])) {
	header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat Applictaion</title>
	<script src="jquery/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script>
		$(document).ready( function (){
			setInterval(function(){ $("#chat").load("msg.php"); }, 10);
			
				$("button").click(function (){
					var msg = $("input").val();
					$.post("send.php",{
						msgsent: msg
					})
				});
		});
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 align-center">
				You are Logged in as: <?php echo $_SESSION['nick']; ?> <a href="logout.php" >Logout</a>
				<div class="form-control">
					<input name="msg" class="form-control msg" placeholder="Type your message here" required></input>
					<button name="submit" type="submit" class="form-control btn btn-primary sndmsg">Send</button>
				</div>
				<div id="chat" class="jumbotron" style="height: 600px; overflow-y: scroll;">
				</div>
			</div>
		</div>
	</div>
</body>
</html>