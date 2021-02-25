<?php
$connect = mysqli_connect("localhost", "root", "", "hallinfo");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM lh  WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>
