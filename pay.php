
<!DOCTYPE html>
<html>
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

 </head>
 <body>
  <br /><br />
  <div class="container" style="width:1000px;">
   <h2 align="center">Register your payment information here</h2>
   <br /><br />
   <form method="post" id="payment_form">
<div class="row">
 <div class="col-md-4">

  <div class="form-group">
    <input type="text" class="form-control" name="name" value="" placeholder="Student's name" required>

   </div>

 <div class="form-group">
          <input type="date" name="p_date"  placeholder="Payment date" class="form-control" value="" required>
        </div>
    
   </div>


      <div class="col-md-4">
        <div class="form-group">
      <input type="text" class="form-control" name="roll_no" value="" placeholder="Roll no" required>

        </div>



      <div class="form-group">
    <input type="text" class="form-control" name="receipt_no" value="" placeholder="receipt_no" required>
      </div>
       </div>

      <div class="col-md-4">
  <div class="form-group">
    <input type="number" class="form-control" name="p_year" value="" placeholder="year" min="2010" required>
  </div>


       
      </div>



<div class="form-group ">

    
    
   <select id="payment" name="month[]" multiple class="form-control" >

      <option value="January">January</option>
      <option value="February">February</option>
      <option value="March">March</option>
      <option value="April">April</option>
      <option value="May">May</option>
      <option value="June">June</option>
      <option value="July">July</option>
      <option value="August">August</option>
       <option value="September">September</option>
      <option value="October">October</option>
      <option value="November">November</option>
      <option value="December">December</option>
     </select>

    
    </div>
</div>


    <div class="form-group">
     <input type="submit" class="btn btn-info" name="submit" value="Submit" />
    </div>
   </form>
   <br />
  </div>
 </body>
</html>

<script>
  $(document).on('click', '#insert', function(){
   var name = $('#data1').text();
   $name=base64_encode($name);
   var roll_no = $('#data2').text();
   var receipt_no = $('#data3').text();
   var p_year = $('#data4').text();
    var p_date = $('#data5').text();
   
   if(name != '' && roll_no != '' && receipt_no != '' && p_year != '' && p_date != '')
   {
    $.ajax({
     url:"insertpay.php",
     method:"POST",
     data:{name:name,roll_no:roll_no, receipt_no:receipt_no, p_year:p_year, p_date:p_date},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Both Fields is required");
   }
  });
$(document).ready(function(){
 $('#payment').multiselect({
  nonSelectedText: 'Select month',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'320px'
 });
 
 $('#payment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"insertpay.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#payment option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#payment').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>

