<html>
<head><title>Transfer</title>
<style>
body{
	background-image: url("other_bg.jfif");
    background-repeat: no-repeat;
    background-size:100%;
    background-color: #ecede6;
}
table,th,td{
                    color:black;
                    font-size: 20px;
                }
				table{width : 90%;}
h1{
                    color: darkblue;
					font-size:30px;
                    padding-left: 100px;
					text-align:center;
					padding-top:30px;
                }
                .button {
  background-color:#474e5d; /* Green */
  border: none;
  color: white;
  padding: 9px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:30%;
  font-weight:bold;
  top:380px;
				}
				h1{
  padding: 20px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}
					
</style>
</head>
<body>
<?php
$errors=array();
$con=mysqli_connect("localhost","root","","basic_bank");
if($con->connect_error)
die("Connection failed :".$con->connect_error);

$sender=mysqli_real_escape_string($con,$_POST['sendacc']);
$reciever=mysqli_real_escape_string($con,$_POST['recacc']);
$transfer_amt=mysqli_real_escape_string($con,$_POST['transfer']);


if(count($errors)==0){
	echo "<center><h1><u>TRANSFER DETAILS</u></h1></center>";
	echo "<center><h2><u>Before Transfer</u></h2></center>";
	echo "<center><h3><i><u>Sender Details</u></i></h3></center>";
	$sql=mysqli_query($con,"select * from customers where account_number='$sender'");
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

while($r = mysqli_fetch_array($sql))
{
echo "<tr>";
echo "<td>" . $r['account_number'] . "</td>";
echo "<td>" . $r['first_name'] . "</td>";
echo "<td>" . $r['last_name'] . "</td>";
echo "<td>" . $r['email'] . "</td>";
echo "<td>" . $r['address'] . "</td>";
echo "<td>" . $r['phone_number'] . "</td>";
echo "<td>" . $r['current_balance'] . "</td>";
echo "</tr>";
}
echo "</table></center></br></br></br>";
}

echo "<center><h3><i><u>Reciever Details</u></i></h3></center>";
$sqlr=mysqli_query($con,"select * from customers where account_number='$reciever'");
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
</tr>";

while($r = mysqli_fetch_array($sqlr))
{
echo "<tr>";
echo "<td>" . $r['account_number'] . "</td>";
echo "<td>" . $r['first_name'] . "</td>";
echo "<td>" . $r['last_name'] . "</td>";
echo "<td>" . $r['email'] . "</td>";
echo "<td>" . $r['address'] . "</td>";
echo "<td>" . $r['phone_number'] . "</td>";
echo "<td>" . $r['current_balance'] . "</td>";
echo "</tr>";
}
echo "</table></center></br></br></br></br><hr/>";
}

echo "<center><h2><u>After Transfer</u></h2></center>";

$send_cur=mysqli_query($con,"select current_balance from customers where account_number='$sender'");
$rec_cur=mysqli_query($con,"select current_balance from customers where account_number='$reciever'");
$row_send = mysqli_fetch_array($send_cur);
$row_rec=mysqli_fetch_array($rec_cur);
	if($row_send['current_balance']>$transfer_amt){
		$diff=$row_send['current_balance']-$transfer_amt;
		$add=$row_rec['current_balance']+$transfer_amt;
		mysqli_query($con,"update customers set current_balance='$diff' where account_number='$sender'");
		mysqli_query($con,"update customers set current_balance='$add' where account_number='$reciever'");
	
		$sql1=mysqli_query($con,"insert into transaction(ammount,from_customer,to_customer) VALUES('$transfer_amt','$sender','$reciever')");
 		$id= $con ->insert_id;
	}
	echo "<center><h3><i><u>Sender Details</u></i></h3></center>";
	$sql=mysqli_query($con,"select * from customers where account_number='$sender'");
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

while($r = mysqli_fetch_array($sql))
{
echo "<tr>";
echo "<td>" . $r['account_number'] . "</td>";
echo "<td>" . $r['first_name'] . "</td>";
echo "<td>" . $r['last_name'] . "</td>";
echo "<td>" . $r['email'] . "</td>";
echo "<td>" . $r['address'] . "</td>";
echo "<td>" . $r['phone_number'] . "</td>";
echo "<td>" . $r['current_balance'] . "</td>";
echo "</tr>";
}
echo "</table></center></br></br></br>";
}

echo "<center><h3><i><u>Reciever Details</u></i></h3></center>";
$sqlr=mysqli_query($con,"select * from customers where account_number='$reciever'");
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
</tr>";

while($r = mysqli_fetch_array($sqlr))
{
echo "<tr>";
echo "<td>" . $r['account_number'] . "</td>";
echo "<td>" . $r['first_name'] . "</td>";
echo "<td>" . $r['last_name'] . "</td>";
echo "<td>" . $r['email'] . "</td>";
echo "<td>" . $r['address'] . "</td>";
echo "<td>" . $r['phone_number'] . "</td>";
echo "<td>" . $r['current_balance'] . "</td>";
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
<form action="home.php" method="post">
<center><input class="button" type="submit" value="Home"/></center>
</form>
</body>
</html>