<?php

session_start();
//print_r($_COOKIE);
if (isset($_POST['submit'])){
	$usrname= $_POST['un'];
	$paasw= $_POST['pass'];
	if (isset($_COOKIE[$usrname]) )
	{
		if($_COOKIE[$usrname] == $paasw){
			
			//header('location:home.php');
			echo" login successfull";
		}
		
	
	}
}

?>

<html>
	<body>
		<form action=" " method="post">
			Username : <input type= "text" name="un"> <br>
			Password:  <input type="password" name="pass"> <br>
			<input type="submit" name="submit" value="login">
		</form>
	</body>
</html>
