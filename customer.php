<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
  <style type="">
    
.about-section {
  padding: 20px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.center {
  margin-left: auto;
  margin-right: auto;
}
table {
  width: 100%;
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
  background-color: #4CAF50;
  color: white;
}

  </style>
</head>
<body>
<div class="about-section">
<h1>CUSTOMER DETAILS</h1>
</div>
<table border="2" class="center" id="customers">
  <tr style="text-align: center; background-color: white; color:#474e5d ;">
    <td><h2>NAME</h2></td>
    <td><h2>EMAIL</h2></td>
    <td><h2>TRANSFER</h2></td>
  </tr>

<?php 

include "dbConn.php"; // Using database connection file here

$records = mysqli_query($db,"select * from customers"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr style="text-align: center;">
    <td><?php echo $data['first_name']; ?></td>
    <td><?php echo $data['email']; ?></td>   
    <td><a href="transfer.php?id=<?php echo $data['account_number']; ?>">TRANSFER</a></td>
  </tr>
<?php
}
?>
</table>

</body>
</html>
