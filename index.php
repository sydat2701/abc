<!DOCTYPE html>
<html>
<head>
	<title>Demo BTL</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<!-- jQuery and JS bundle w/ Popper.js -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</head>
<body>
	#thử tí cho hay
	<?php require_once 'process.php'; ?>

	<?php if(isset($_SESSION['message'])): ?>
		<div class="alert alert-<?php echo $_SESSION['msg_type'];?>" >
			<?php 
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			 ?>
		</div>
	<?php endif ?>

	<div class="row justify-content-center">
		<form action="process.php" method="POST">
			<!-- <div class="form-group">
				<label>ID</label>
				<input class="form-control" type="text" name="id" >
			</div> -->
			<input type="hidden" name="id" value="<?php echo $id ;?>">


			<div class="form-group">
				<label>Householder name</label>
				<input class="form-control" type="text" name="householderName" value="<?php echo $householderName1 ?>" >
			</div>

			<div class="form-group">
				<label>Householder ID</label>
				<input class="form-control" type="text" name="householderID" value="<?php echo $householderID1 ?>" >
			</div>

			<div class="form-group">
				<label>House Number</label>
				<input class="form-control" type="text" name="houseNumber" value="<?php echo $houseNumber1 ?>" >
			</div>

			<div class="form-group">
				<label>Street</label>
				<input class="form-control" type="text" name="houseStreet" value="<?php echo $street1 ?>">
			</div>

			<div class="form-group">
				<label>Ward</label>
				<input class="form-control" type="text" name="houseWard" value="<?php echo $ward1 ?>">
			</div>

			<div class="form-group">
				<label>City</label>
				<input class="form-control" type="text" name="houseCity" value="<?php echo $city1 ?>" >
			</div>


			<div class="form-group">
				<label>Since</label>
				<input class="since" type="datetime-local" name="since">
			</div>

			<!-- <div class="form-group">
				<label>Last update</label>
				<textarea class="form-control"></textarea>
			</div> -->
			<?php if($update): ?>
				<div class="form-group">
					<button class="btn btn-primary" type="submit" name="update">Update</button>
				</div>
			<?php else: ?>
				<div class="form-group">
					<button class="btn btn-primary" type="submit" name="add">Add</button>
				</div>
			<?php endif ?>


		</form>
	</div>

	<?php 
		$connect= new mysqli('localhost','btl','27012000','btl') or die($connect->error($connect));
		$result= $connect->query("SELECT * FROM household");
	 ?>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Householder name</th>
				<th>Householder ID</th>
				<th>House Number</th>
				<th>Street</th>
				<th>Ward</th>
				<th>City</th>
				<th>Since</th>
				<th>Last</th>
				<th>Action</th>
			</tr>
		</thead>

		<?php while ($row=$result->fetch_assoc()):
		  ?>
		  <tr>
		  	<td><?php echo $row['id'];?></td>
		  	<td><?php echo $row['householder_name'];?></td>
		  	<td><?php echo $row['householder_id'];?></td>
		  	<td><?php echo $row['house_no'];?></td>
		  	<td><?php echo $row['house_street'];?></td>
		  	<td><?php echo $row['house_ward'];?></td>
		  	<td><?php echo $row['house_city'];?></td>
		  	<td><?php echo $row['since']; ?></td>
		  	<td><?php echo $row['last_update'] ;?></td>
		  	<td>
		  		<a href="index.php?edit=<?php echo $row['id'] ;?>" class="btn btn-info">Edit</a>
		  		<a href="process.php?delete=<?php echo $row['id'] ;?>" class="btn btn-danger">Delete</a>
		  	</td>
		  </tr>
		 <?php endwhile ?>
	</table>

</body>
</html>
