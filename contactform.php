<html>
<head>
<title>Contact Manager</title>
<style>
{box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=email], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=email]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>

</head>
<body>

	<form action="" method="post" enctype="multipart/form-data">
			  <div class="container">
				<h1 align="center">Contact Form and Contact List Page</h1>
				<hr>
				<div class="row col-md-6 offset-md-3">
				<label for="email"><b>Name</b></label>
				<input type="text" placeholder="Enter Name" name="name" id="email" required>

				<label for="psw"><b>Phone Number</b></label>
				<input type="password" placeholder="Enter Phone Number" name="phno" id="psw" required>

				<label for="psw"><b>E mail</b></label>
				<input type="email" placeholder="Enter Email" name="email" id="psw" required>
				<hr>
				<input type="submit" name="submit1" class="registerbtn">
				</div>
			  </div>


		</form>
		
<?php

		$servername = "localhost:3307";
		$username = "root";
		$password = "";
		$dbname = "zoho";
		
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}
		$q="select *from contacts";
		$re=mysqli_query($conn,$q);
		if(mysqli_num_rows($re)>0)
		{
			echo "<table id=\"customers\">";
			echo "<tr>";
			echo "<th>";
			echo "Name";
			echo "</th>";
			echo "<th>";
			echo "Phone Number";
			echo "</th>";
			echo "<th>";
			echo "E-mail";
			echo "</th>";
			echo "</tr>";
			while($row=mysqli_fetch_array($re))
			{
				echo "<tr>";
				echo "<td>";
				echo $row['name'];
				echo "</td>";
				echo "<td>";
				echo $row['phoneno'];
				echo "</td>";
				echo "<td>";
				echo $row['email'];
				echo "</td>";
				echo "</tr>";
			}

			echo "</table>";
			
		}

if(isset($_POST['submit1']))	
	{	

		$name=$_POST['name'];
		$phoneno=$_POST['phno'];
		$email=$_POST['email'];
		
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

			$sql = "INSERT INTO  contacts(name, phoneno, email)
			VALUES ('$name', '$phoneno', '$email')";

			if ($conn->query($sql) === TRUE) {
						?>
				<script>
				alert("contact saved successfull Updated in list..!");
				window.location="contactform.php";
				</script>	
			<?php
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		$conn->close();
	}
?>

</div>
</body>
</html>