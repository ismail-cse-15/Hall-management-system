<?php 
//insert.php

$connect = mysqli_connect("localhost", "root", "", "hms1");
if(isset($_POST["name"], $_POST["roll_no"],$_POST["receipt_no"], $_POST["p_year"],$_POST["month"],$_POST["p_date"]))
{
 $month = '';
 foreach($_POST["month"] as $row)
 {
  $month .= $row . ', ';
 }
 $month = substr($month, 0, -2);
 $query = "INSERT INTO like_table(payment) VALUES('".$month."')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }

 $name = mysqli_real_escape_string($connect, $_POST["name"]);
  $roll_no = mysqli_real_escape_string($connect, $_POST["roll_no"]);
 $receipt_no = mysqli_real_escape_string($connect, $_POST["receipt_no"]);
 $p_year = mysqli_real_escape_string($connect, $_POST["p_year"]);

 $p_date = mysqli_real_escape_string($connect, $_POST["p_date"]);

 $query = "INSERT INTO payment (name,roll_no,receipt_no,p_year,month,p_date) VALUES('$name','$roll_no','$receipt_no','$p_year','$month','$p_date')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>