<!DOCTYPE html>
<html lang="en">
<head>
<title>Spark Foundation</title>
<meta charset = "UTF-8">
<meta name = "viewport" content = "width=device-width , initial-scale=1">
<style>

body {
  font-family: Arial;
  margin: 0;
}

.hero-image {
  background-image: url("bank.jpg");
  background-color: #cccccc;
  height: 1000px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
.fixed-footer{
        bottom: 0;
        height: 50px;
        background: rgb(6, 8, 0);
        color: rgb(248, 248, 248);
        
    }
.hero-text {
  position: absolute;
  top: 20%;
  left: 38%;
  transform: translate(-50%, -70%);
  color: rgb(15, 1, 1);
}
/* Header/Logo Title */
.header1 {
  padding: 1px;
  text-align: center;
  background: #dad6d3;
  color: #403855;
  font-size: 20px;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.topnav a:hover {
  background-color: #ddd;
  color: black;
}


div.content{
  font-family :comic  sans ms;
  font-size : 20px;
  
}

/* Page Content */

</style>
</head>
<body>
    
<div class="header1">
  <h1>Spark Foundation Internship Project</h1>
  <marquee align="center" height="90" width="600" bgcolor="#9dd7ef" behavior="scroll" direction="right"
  scrollamount="6" scrolldelay="15"><font face="comic sans ms" size="7">Basic Banking System</font>
  </marquee>
</div>
<div class="topnav">
  <a href="#">Home</a>
  <a href="history.php">VIEW TRANSACTION HISTORY</a>
  <a href="Withdrawhistory.php">VIEW WITHDRAWAL HISTORY</a>
  <a href="customer.php" style="float:right">VIEW CUSTOMERS</a>
  <a href='withdraw.php' style="float:right">WITHDRAW AMOUNT</a>
  <a href='transfer.php' style="float:right">TRANSFER AMOUNT</a>
</div>

<div class="hero-image">
  <div class="hero-text">
  <div class="content">
  <p><font size="20%">WELCOME  TO  SPARK  BANK !!</font><br><br>
    <font size="5%" >PRESENTED  BY<br> ---PRATIKSHA  DAS</font></p>

  <br>
</div>
</div>
</div>
 
 <div class="fixed-footer">
   Copyright &copy; spark internship project</div>        
</div>

</body>
</html>