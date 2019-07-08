<!DOCTYPE html>

<?php
	include 'db.php';
  //session_start();
  //echo 'welcome, '.$_SESSION['user_name'];
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
  .container-fluid{
    margin-left: 10px;
    margin-right: 20px;
  }
  input[type=text] {
  width: 130px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}


input[type=text]:focus {
  width: 100%;
}
 
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content1 {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content1, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content1 {
    width: 100%;
  }
}
</style>

	<title>Welcome</title>
</head>
<body>

<div class="container-fluid ">
	<center><h1><u>Movement of letters</u></h1></center>
<a href="logout.php" class="btn btn-success float-right"><i class="material-icons glyphicon glyphicon-log-out"> </i><span>Log Out</span></a>	<div class="row">
		
		<div class="col-md-10 col-md-offset-1">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Item</button>
			<button type="button" class="btn btn-warning float-right">Print</button>
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
                            <input type="file" name="image" class="form-control" required>
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
      <center>
			<table class="table table-striped table-primary table-hover">
  <thead>
    <tr class="listheader">
        <th>Date</th>
        <th>Letter_No</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Recieved_date</th>
        <th><?php echo $_SESSION['Name']; ?></th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actions_Taken&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>View</th>
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
            <?php $file = "css/uploads/".$row['subject'].".jpeg";?>
            <td><img id="myImg" src= "<?php echo $file ?>" alt="<?php echo $row['subject'] ?>" style="width:100%;max-width:50px"></td>
      </tr>
	<?php endwhile ?>
			
  </tbody>
</table>
</center>
		</div>

	</div>
</div>	


<!-- Add Comment script starts here-->
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
 
<!-- The image Modal -->
<div id="imageModal" class="modal1">
  <span class="close">&times;</span>
  <img class="modal-content1" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById("imageModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

</body>
</html>