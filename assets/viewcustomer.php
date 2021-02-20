<?php
	session_start();  //Start the session
	$con=mysqli_connect("localhost","root","","project");//database connection establish
	if(!$con)
		{
			die("Connection failed");
		}
	//Set session variable
    $_SESSION['user']=$_POST['user'];
	$_SESSION['sender']=$_SESSION['user'];
	$user=$_SESSION['user'];

?>
<!DOCTYPE html>
<html>
<head>
<title>Transfer Amount</title>

<style>
<!--css-->
::-webkit-scrollbar
{
	display:none;
}
body 
{
	margin:0;
    border:0;
	overflow:hidden;
    background-image: url('back.jpg');
    background-size:100% 100%;
    background-attachment: fixed;
}

p 
{
	text-align:center;
	font-size: 30px;
	letter-spacing:1px;
	font-family: poppins;
	color:#fff;
}


.text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -70%);
  color: rgb(15, 1, 1);
  font-size:25px;
}
.button {
  background-color:palegreen;
  border: none;
  color: black;
 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {
  background-color:rgb(170, 150, 182); /* Green */
  border: none;
  color: black;
  font-size: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
 
}
</style>
</head>
<body>
<p>
<p><b><u><font size="20">Customer:</font></b></u></p>
			<?php
				if (isset($_SESSION['user']))   //check variable is declare or empty
					{
						//$user=$_SESSION['user'];
						$result=mysqli_query($con,"SELECT * FROM customer WHERE AccountNo='$user'");
						
						while($row=mysqli_fetch_array($result))         //fetch user data from database 
							{
								echo "<p><b class='font-weight-bold'>Account No</b> &nbsp;:".$row['AccountNo']."</p><br>";
								echo "<p name='sender'><b class='font-weight-bold'>Name&nbsp;&nbsp;</b>&nbsp;&nbsp;: ".$row['FirstName']."&nbsp".$row['LastName']."</p><br>";
								echo "<p><b class='font-weight-bold'>Email ID</b> : ".$row['Email']."</p><br>";
								echo "<p><b class='font-weight-bold'>Balance</b>&nbsp; :&nbsp;<b>&#8377;</b> ".$row['CurrentBalance']."</p>";
							}         
					}
			?>

</p>
<form action="index.php" method="post"/>
    <center><input class="button1" type="submit" value="Go To Home" /></center>
    </form>
</body>
</html>