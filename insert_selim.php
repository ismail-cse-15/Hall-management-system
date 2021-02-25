<?php
$connect = mysqli_connect("localhost", "root", "", "hallinfo");
if(isset($_POST["room_no"], $_POST["capacity"],$_POST["student_alloted"], $_POST["vacant"]))
{
 $room_no = mysqli_real_escape_string($connect, $_POST["room_no"]);
 $capacity = mysqli_real_escape_string($connect, $_POST["capacity"]);
 $student_alloted = mysqli_real_escape_string($connect, $_POST["student_alloted"]);
 $vacant = mysqli_real_escape_string($connect, $_POST["vacant"]);

 $query = "INSERT INTO selim_hall (room_no,capacity,student_alloted,vacant) VALUES('$room_no', '$capacity','$student_alloted','$vacant')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>