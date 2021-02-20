<!DOCTYPE html>
<html>
<head>
<title>Customers</title>

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
table,th,td{
                    color:black;
                    font-size: 28px;
                }
p 
{
	text-align:center;
	font-size: 35px;
	letter-spacing:1px;
	font-family: poppins;
	color:#fff;
}
button
{
	width:200px;
	height:45px;
	font-size:25px;
	font-weight:bold;
	background:radial-gradient(skyblue,palegreen);
}


</style>
</head>
<body>
    <p><b><u><font size="20">Customers</font></b></u></p>
	<?php
	session_start();
	$errors=array();
	$connection=mysqli_connect("localhost","root","","project");
	if($connection->connect_error)
	die("Connection failed :".$connection->connect_error);
	
	if(count($errors)==0){
	$result = mysqli_query($connection,"SELECT * FROM customer");
	if(mysqli_num_rows($result)>0){
	echo "<table border='1'>
	<tr>
	<th>Account Number</th>
	<th>Firstname</th>
	<th>Lastname</th>
	<th>Email</th>
	<th>Address</th>
	<th>Phone Number</th>
	<th>Current Balance</th>
	<th>Operation</th>
	</tr>";
	
	while($rows = mysqli_fetch_array($result))
	{
		
	echo "<tr>";
	echo "<form method ='post' action = 'viewcustomer.php'>";
	echo "<td>" . $rows['AccountNo'] . "</td>";
	echo "<td>" . $rows['FirstName'] . "</td>";
	echo "<td>" . $rows['LastName'] . "</td>";
	echo "<td>" . $rows['Email'] . "</td>";
	echo "<td>" . $rows['Address'] . "</td>";
	echo "<td>" . $rows['PhoneNo'] . "</td>";
	echo "<td>" . $rows['CurrentBalance'] . "</td>";
	echo "<td><a href='viewcustomer.php'><button  class='button' name='user' type='submit'  value= '{$rows['AccountNo']} ' >View Customer</button></a></td>";
	echo "</form>";
	echo "</tr>";
	
	}
	echo "</table>";
	}
	else{
		array_push($errors,"No data found");
	}
	}
	mysqli_close($connection);
	?>
	
	
	<?php  if (count($errors) > 0) : ?>
	  <div class="error">
		  <?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		  <?php endforeach ?>
	  </div>
	<?php  endif ?>
	<center>
    <div class="button">
		<form action="index.php" method="post"/>
            <button class="button">Home</button></a>
		  </center>
        </p>
    </div>
</body>
</html>