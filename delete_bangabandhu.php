<?php
$connect = mysqli_connect("localhost", "root", "", "hallinfo");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM bangabandhu_hall  WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>
