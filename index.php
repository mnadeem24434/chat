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
			setInterval(function(){ $("#active_users").load("active_users.php"); }, 10);
			setInterval(function(){
    				$.post("update_status.php",{
    				});
			}, 10000);
			
			$("input").bind('keypress', function (e){
				if(e.keyCode==13){
					var msg = $("input").val();
					if ($("input").val().length <= 0) {

					}
					else
					{
						$.post("send.php",{
    				msgsent: msg
    				})
					}
    				

    				$("input").val('');
				}
			});
		});
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 align-center">
				<div id="chat" class="" style="height: 500px; overflow-y: scroll;">
				</div>

				<div class="form-control">
					<input name="msg" class="form-control msg" placeholder="Type your message here" type="text"></input>
					You are Logged in as: <?php echo $_SESSION['nick']; ?> <a href="logout.php" >Logout</a>
				</div>
			</div>
			<div class="col-lg-4" id="active_users"></div>
		</div>
	</div>
</body>
</html>