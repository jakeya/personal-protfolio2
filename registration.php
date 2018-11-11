<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<a href = 'login.php'> Login </a> <br>


<?php
$nameErr = $emailErr = $genderErr = "";
$usrname= $Fulnam= $Ema= $Phn= $passw= $gender="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = " Full Name is required";
  } else {
    $Fulnam = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$Fulnam)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $Ema = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($Ema, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
    if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
  $Phn = $_POST['phone'];
  $passw = $_POST['pass'];
  $usrname = $_POST['un'];
  
  setcookie($usrname,$passw,time()+3600);
  //print_r($_COOKIE);

  
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
	   
		   
		   
		   <h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  UserName: <input type="text" name="un" value="<?php echo $usrname;?>">
  <br><br>
  Name: <input type="text" name="name" value="<?php echo $Fulnam;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $Ema;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Phone: <input type="text" name="phone" value="<?php echo $Phn;?>">
  <br><br>
  Password: <input type="text" name="pass">
  <br><br>
  Confirm Password: <input type="text" name="pass">
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $usrname;
echo "<br>";
echo $Fulnam;
echo "<br>";
echo $Ema;
echo "<br>";
echo $Phn;
echo "<br>";
echo $passw;
echo "<br>";
echo $gender;

	
	


?>


	  
	   
</body>
	   
</html>	   
	   
	      