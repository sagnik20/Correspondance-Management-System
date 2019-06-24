<!DOCTYPE html>

<?php
	include 'db.php';
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<title>Welcome</title>
</head>
<body>

<div class="container">
	<center><h1>Letter List</h1></center>
	<div class="row">
		
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
                   <form method="post" action="add.php">
                   		<div class="form-group">
                        	<label>Date</label>
                            <input type="date" name="date" required class="form-control">
                            <label>Letter Number</label>
                            <input type="number" name="letterno" required class="form-control">
                            <label>Subject</label>
                            <input type="text" name="subject" required class="form-control">
                            <label>Recieving Date</label>
                            <input type="date" name="rdate" class="form-control">
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
        <th>Letter No/Reference No</th>
        <th>Subject</th>
        <th>Recieving Date</th>
        <th>Sr.Edpm</th>
        <th>ASM</th>
        <th>AFA</th>
        <th>Stuff</th>
        <th>Actions Taken</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($row = $rows->fetch_assoc()): ?>
    <tr>
    		<td><?php echo $row['date'] ?></td>
            <td><?php echo $row['letterno'] ?></td>
            <td><?php echo $row['subject'] ?></td>
            <td><?php echo $row['recievedate'] ?></td>
            <td><input type="checkbox" name="sredpm" <?php if ($row['sredpm'] == 1)	echo 'default=\'checked\''?>></td>
            <td><input type="checkbox" name="asm" ></td>
            <td><input type="checkbox" name="afa" ></td>
            <td><input type="checkbox" name="stuff" ></td>
            <td><input type="text" name="action"></td>
    </tr>
	<?php endwhile ?>
			
  </tbody>
</table>
		</div>

	</div>
</div>	

</body>
</html>