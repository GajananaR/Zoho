<html>
<head>
<title>Sign In</title>
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
        <h2 class="text-center">Sign In</h2>       
        <div class="form-group">
            <input type="text" name="uname" class="form-control" placeholder="Username" required="required">
        </div></br>
		
        <div class="form-group">
            <input type="password" name="pswd" class="form-control" placeholder="Password" required="required">
        </div></br>
        <div class="form-group">
             <input type="submit" name="submit1" class="btn btn-primary btn-block">
        </div>       
    </form>
</div>
<?php
	if(isset($_POST['submit1']))		
	{

		$servername = "localhost:3307";
		$username = "root";
		$password = "";
		$dbname = "zoho";
		$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}
			$uname=$_POST['uname'];
			$pass=$_POST['pswd'];
			$q="select * from signin where email='$uname' and pswd='$pass'";
			$res=mysqli_query($conn,$q);
			$count=mysqli_num_rows($res);
			if($count==0)
			{
			?>
				<script>
				alert("invalid username or password");
				window.location="signin.php";
				</script>	
			<?php
			}
			else
			{
			?>
			<script>
			window.location="contactform.php";
			</script>	
			<?php
			}
			mysqli_close($conn);
	}	
?>
</body>
</html>