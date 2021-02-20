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
.button {
  background-color:palegreen;
  border: none;
  color: black;
 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<body>
	
        <?php
        $errors=array();
        $connection=mysqli_connect("localhost","root","","project");
        if($connection->connect_error)
        die("Connection failed :".$connection->connect_error);
        
        $sender=mysqli_real_escape_string($connection,$_POST['senderacc']);
        $reciever=mysqli_real_escape_string($connection,$_POST['recieveracc']);
        $transfer_amt=mysqli_real_escape_string($connection,$_POST['transfer']);
        $remark=mysqli_real_escape_string($connection,$_POST['remark']);
        
        if(count($errors)==0){
            echo "<center><h1><b><u>TRANSFER DETAILS</u></b></h1></center>";
            echo "<center><h2><u>Before Transfer....</u></h2></center>";
            echo "<center><h3><i><u>Sender Details:</u></i></h3></center>";
            $sql=mysqli_query($connection,"select * from customer where AccountNo='$sender'");
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
        <th>Remark</th>
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
        echo "<td>" . $remark . "</td>";
        echo "</tr>";
        }
        echo "</table></center></br></br></br>";
        }
        
        echo "<center><h3><i><u>Reciever Details:</u></i></h3></center>";
        $sqlr=mysqli_query($connection,"select * from customer where AccountNo='$reciever'");
            if(mysqli_num_rows($sqlr)>0){
        echo "<center><table border='1'>
        <tr>
        <th>Account Number</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Current Balance</th>
        <th>Remark</th>
        </tr>";
        
        while($rows = mysqli_fetch_array($sqlr))
        {
        echo "<tr>";
        echo "<td>" . $rows['AccountNo'] . "</td>";
        echo "<td>" . $rows['FirstName'] . "</td>";
        echo "<td>" . $rows['LastName'] . "</td>";
        echo "<td>" . $rows['Email'] . "</td>";
        echo "<td>" . $rows['Address'] . "</td>";
        echo "<td>" . $rows['PhoneNo'] . "</td>";
        echo "<td>" . $rows['CurrentBalance'] . "</td>";
        echo "<td>" . $remark . "</td>";
        echo "</tr>";
        }
        echo "</table></center></br></br></br></br><hr/>";
        }
        
        echo "<center><h2><u>After Transfer....</u></h2></center>";
        
        $send_cur=mysqli_query($connection,"select CurrentBalance from customer where AccountNo='$sender'");
        $rec_cur=mysqli_query($connection,"select CurrentBalance from customer where AccountNo='$reciever'");
        $row_send = mysqli_fetch_array($send_cur);
        $row_rec=mysqli_fetch_array($rec_cur);
            if($row_send['CurrentBalance']>$transfer_amt){
                $diff=$row_send['CurrentBalance']-$transfer_amt;
                $add=$row_rec['CurrentBalance']+$transfer_amt;
                mysqli_query($connection,"update customer set CurrentBalance='$diff' where AccountNo='$sender'");
                mysqli_query($connection,"update customer set CurrentBalance='$add' where AccountNo='$reciever'");
            
                $date=date("Y-m-d h:i:s");
                
                $done=mysqli_query($connection,"insert into transfer(DateTime,remark,transferAmount,SenderAccNo,RecieverAccNo) values('$date','$remark','$transfer_amt','$sender','$reciever')");
            }
            else{
                echo "<center><h2><i> AMOUNT IS HIGHER THAN CURRENT BALANCE, HENCE CANNOT BE PROCESSED</i></h2></center>";
            }
            echo "<center><h3><i><u>Sender Details:</u></i></h3></center>";
            $sql=mysqli_query($connection,"select * from customer where AccountNo='$sender'");
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
        <th>Remark</th>
        </tr>";
        
        while($rows = mysqli_fetch_array($sql))
        {
        echo "<tr>";
        echo "<td>" . $rows['AccountNo'] . "</td>";
        echo "<td>" . $rows['FirstName'] ."</td>";
        echo "<td>" . $rows['LastName'] . "</td>";
        echo "<td>" . $rows['Email'] . "</td>";
        echo "<td>" . $rows['Address'] . "</td>";
        echo "<td>" . $rows['PhoneNo'] . "</td>";
        echo "<td>" . $rows['CurrentBalance'] . "</td>";
        echo "<td>" . $remark . "</td>";
        echo "</tr>";
        }
        echo "</table></center></br></br></br>";
        }
        
        echo "<center><h3><i><u>Reciever Details:</u></i></h3></center>";
        $sqlr=mysqli_query($connection,"select * from customer where AccountNo='$reciever'");
            if(mysqli_num_rows($sqlr)>0){
        echo "<center><table border='1'>
        <tr>
        <th>Account Number</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Current Balance</th>
        <th>Remark</th>
        </tr>";
        
        while($rows = mysqli_fetch_array($sqlr))
        {
        echo "<tr>";
        echo "<td>" . $rows['AccountNo'] . "</td>";
        echo "<td>" . $rows['FirstName'] . "</td>";
        echo "<td>" . $rows['LastName'] . "</td>";
        echo "<td>" . $rows['Email'] . "</td>";
        echo "<td>" . $rows['Address'] . "</td>";
        echo "<td>" . $rows['PhoneNo'] . "</td>";
        echo "<td>" . $rows['CurrentBalance'] . "</td>";
        echo "<td>" . $remark . "</td>";
        echo "</tr>";
        }
        echo "</table></center></br></br></br></br>";
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
            <center><input class="button" type="submit" value="Go to Home"/></center>
            </form>
</body>
</html>