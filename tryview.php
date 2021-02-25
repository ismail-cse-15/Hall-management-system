    <!DOCTYPE html>
    <html>
    <head>
     <title>Table of payment</title>
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:1270px;
   padding:20px;
   background-color:#fff;
   border:1px solid #ccc;
   border-radius:5px;
   margin-top:25px;
   box-sizing:border-box;
  }
  </style>
    </head>
    <body>
     <div class="container box">
   <h2 align="center">Payment Details of Students</h2>
   
   <br />
  <form class="form-inline">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search">
</form>
   <div class="table-responsive">
   
    <br />
    <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>name</th>
       <th>roll</th>
       <th>receipt number</th>
       <th>payment date</th>
       <th>month</th>
       <th>payment year</th>
        <th></th>
      </tr>
     </thead>
     <?php
    $conn = mysqli_connect("localhost", "root", "", "hms1");
      // Check connection
      if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
      } 
      $sql = "SELECT * FROM payment";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>" . $row["name"]. "</td>
          <td>" . $row["roll_no"] . "</td>
          <td>" . $row["receipt_no"]. "</td>
          <td>" . $row["p_date"]. "</td>
          <td>" . $row["month"] . "</td>
          <td>" . $row["p_year"]. "</td>
        </tr>";
    }
    echo "</table>";
    } else { echo "0 results"; }
    $conn->close();
    ?>
    </table>
    </body>
    </html>