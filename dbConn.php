<?php

$db = mysqli_connect("localhost","root","","basic_bank");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>