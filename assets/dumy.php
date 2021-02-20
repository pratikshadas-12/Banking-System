<!DOCTYPE html>
<html>
<head>
<title>Withdraw Amount</title>

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
	font-size: 25px;
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
}
.button1 {
  background-color:rgb(170, 150, 182); /* Green */
  border: none;
  color: black;
  
  text-align: center;
  text-decoration: none;
  display: inline-block;
 
}
</style>
</head>
<body>
<?php
session_start();
$errors=array();
$connection=mysqli_connect("localhost","root","","project");
if($connection->connect_error)
die("Connection failed :".$connection->connect_error);

$accno=mysqli_real_escape_string($connection,$_POST['accountNo']);
$amount=mysqli_real_escape_string($connection,$_POST['amount']);
if(count($errors)==0){
	echo "<center><h1><u>RECORD BEFORE WITHDRAWAL</u></h1></center>";
	$before=mysqli_query($connection,"select * from customer where AccountNo='$accno'");
	if(mysqli_num_rows($before)>0){
echo "<center><table border='1'>
<tr>
<th>Account Number</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Address</th>
<th>Phone Number</th>
<th>Current Balance</th>
</tr>";

while($rows = mysqli_fetch_array($before))
{
echo "<tr>";
echo "<td>" . $rows['AccountNo'] . "</td>";
echo "<td>" . $rows['FirstName'] . "</td>";
echo "<td>" . $rows['LastName'] . "</td>";
echo "<td>" . $rows['Email'] . "</td>";
echo "<td>" . $rows['Address'] . "</td>";
echo "<td>" . $rows['PhoneNo'] . "</td>";
echo "<td>" . $rows['CurrentBalance'] . "</td>";
echo "</tr>";
}
echo "</table></center></br></br></br></br>";
}


	$result = mysqli_query($connection,"select CurrentBalance from customer where AccountNo='$accno'");
	$row = mysqli_fetch_array($result);
	if($row['CurrentBalance']>$amount){
	$left_amt=$row['CurrentBalance']-$amount;
	mysqli_query($connection,"update customer set CurrentBalance='$left_amt' where AccountNo='$accno'");

	$date=date("Y-m-d h:i:s");
                
                $done=mysqli_query($connection,"insert into withdraw(AccountNo,DateTime,CurrentAmount,WithdrawAmount) values('$accno','$date','$left_amt','$amount')");
	}
	else{
		echo "<center><h2><i>REQUESTED AMOUNT IS HIGHER THAN CURRENT BALANCE, HENCE CANNOT BE PROCESSED</i></h2></center>";
	}

	echo "<center><h1><u>RECORD AFTER WITHDRAWAL</u></h1></center>";
	$sql=mysqli_query($connection,"select * from customer where AccountNo='$accno'");
	if(mysqli_num_rows($sql)>0){
echo "<center><table border='1'>
<tr>
<th>Account Number</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Address</th>
<th>Phone Number</th>
<th>Current Balance</th>
</tr>";

while($rows = mysqli_fetch_array($sql))
{
echo "<tr>";
echo "<td>" . $rows['AccountNo'] . "</td>";
echo "<td>" . $rows['FirstName'] . "</td>";
echo "<td>" . $rows['LastName'] . "</td>";
echo "<td>" . $rows['Email'] . "</td>";
echo "<td>" . $rows['Address'] . "</td>";
echo "<td>" . $rows['PhoneNo'] . "</td>";
echo "<td>" . $rows['CurrentBalance'] . "</td>";
echo "</tr>";
}
echo "</table></center>";
}
}
else{
	array_push($errors,"No data found");
}

?>

<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
<form action="index.php" method="post">
<center><input class="button1" type="submit" value="Go to Home"/></center>
</form>
</body>
</html>