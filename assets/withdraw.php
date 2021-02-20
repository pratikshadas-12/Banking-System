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
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {
  background-color:rgb(170, 150, 182); /* Green */
  border: none;
  color: black;
  font-size: 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
 
}
</style>
</head>
<body>
	<p><font size=20><U>WITHDRAW YOUR MONEY !!</U></font>
    <br>
    <br>
   
    <I><u>Fill up these details :</u></I>
    <form action="dumy.php" method="post">
    <div class=text>
        <fieldset>
    <label>Enter your Name:</label><br>
    <input type="text"  placeholder="Your Name" name="Name" autofocus required><br><br>
    <label>Enter Your Account Number:</label><br>
    <input type="text"  placeholder="Your account number" name=" accountNo" required><br><br>
     <label>Enter the Amount to Withdraw:</label><br>
    <input type="text"  placeholder="Amount to Withdraw" name="amount" required><br><br>

    <center><input class="button" type="submit" value="Withdraw"/></center>
    </fieldset>
      </form>
    <br>
    <form action="index.php" method="post"/>
    <center><input class="button1" type="submit" value="Home" /></center>
    </form>
  </div>
</body>
</html>