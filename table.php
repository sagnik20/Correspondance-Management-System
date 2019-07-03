<!DOCTYPE html>

<?php
	include 'db.php';
  //session_start();
  echo 'welcome, '.$_SESSION['user_name'];
	$rows = 0;
	if ($con) {
		$query = 'SELECT * FROM `records`';
		$rows = mysqli_query($con, $query);
	}
?>

<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style type="text/css">
  input[type=text] {
  width: 130px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}


input[type=text]:focus {
  width: 100%;
}
</style>

	<title>Welcome</title>
</head>
<body>

<div class="container-fluid ">
	<center><h1>Movement of letters</h1></center>
<a href="logout.php" class="btn btn-success float-right"><i class="material-icons glyphicon glyphicon-log-out"> </i><span>Log Out</span></a>	<div class="row">
		
		<div class="col-md-10 col-md-offset-1">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Item</button>
			<button type="button" class="btn btn-default float-right">Print</button>
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Letter Info</h4>
                  </div>
                  <div class="modal-body">
                   <form method="post" action="add.php" enctype="multipart/form-data">
                   		<div class="form-group">
                        	<label>Date</label>
                            <input type="date" name="date" required class="form-control">
                            <label>Letter Number</label>
                            <input type="text" name="letterno" required class="form-control">
                            <label>Subject</label>
                            <input type="text" name="subject" required class="form-control">
                            <label>Recieving Date</label>
                            <input type="date" name="rdate" class="form-control">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <input type="submit" name="send" value="send" class="btn btn-success">
                   </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
            
              </div>
            </div>
			<hr><br>
			<table class="table">
  <thead>
    <tr class="listheader">
        <th>Date</th>
        <th>Letter_No</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Recieved_date</th>
        <th><?php echo $_SESSION['Name']; ?></th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actions_Taken&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($row = $rows->fetch_assoc()): ?>
    <tr>
    		    <td><?php echo date("d/m/Y", strtotime($row['date'])); ?></td>
            <td><?php echo $row['letterno'] ?></td>
            <td><?php echo $row['subject'] ?></td>
            <td><?php echo date("d/m/Y", strtotime($row['recievedate'])); ?></td>
            <td><input type="checkbox" name="sredpm" ></td>
            <td>
                  <form method="POST" id="comment_form">
                    <div class="form-group">
                      <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment"></textarea>
                    </div>
                  </form>
                  <input type="hidden" name="comment_id" id="comment_id" value="0" />
                  <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
            </td>
      </tr>
	<?php endwhile ?>
			
  </tbody>
</table>
		</div>

	</div>
</div>	

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   success:function(data)
      {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>


</body>
</html>