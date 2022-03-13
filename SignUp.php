
<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" href="bootstrap.min.css">
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
.form-group{margin-bottom:1rem}
.form-group{
	display:-ms-flexbox;
	display:flex;
	-ms-flex:0 0 auto;flex:0 0 auto;
	-ms-flex-flow:row wrap;
	flex-flow:row wrap;
	-ms-flex-align:center;
	align-items:center;margin-bottom:0}
</style>
</head>
<body>
<div class="login-form">
    <form action="" method="post" enctype="multipart/form-data">
        <h2 class="text-center">Sign Up</h2>       
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="E-mail" required="required">
        </div></br>
		
        <div class="form-group">
            <input type="password" name="password"class="form-control" placeholder="Password" required="required">
        </div></br>
		
		<div class="form-group">
            <input type="text" name="secrete" class="form-control" placeholder="Secrete" required="required">
        </div></br>
        <div class="form-group">
            <input type="submit" name="submit1" class="btn btn-primary btn-block">
        </div>       
    </form>
    <p class="text-center"><a href="SignIn">Create an Account</a></p>
</div>
<?php

if(isset($_POST['submit1']))	
	{	

		$email=$_POST['email'];
		$password=$_POST['password'];
		$secrete=$_POST['secrete'];
		
			$servername = "localhost:3307";
			$username = "root";
			$password = "";
			$dbname = "zoho";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql = "INSERT INTO  signin(email, pswd, secrete)
			VALUES ('$email', '$password', '$secrete')";

			if ($conn->query($sql) === TRUE) {
			  echo "New record created successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}

		$conn->close();
	}
?>
</body>
</html>