<?php 
	$connect = new mysqli('localhost','btl','27012000','btl') or die($connect->error($connect));
	session_start();

	$row;
	 $householderName1=""; $householderID1=""; $houseNumber1=""; $street1=""; $ward1=""; $city1=""; $since1="";
	$update = false;
	$id=0;


	if(isset($_POST['add'])){
		// $id= $_POST['id'];
		$householderName=$_POST['householderName'];
		
		$householderID=$_POST['householderID'];
		
		$houseNumber=$_POST['houseNumber'];
		
		$street=$_POST['houseStreet'];
		$ward=$_POST['houseWard'];
		$city=$_POST['houseCity'];
		$since=$_POST['since'];

		date_default_timezone_set("Asia/Ho_Chi_Minh");  //CÀI ĐẠT VỊ TRÍ GIỜ CHO VIỆT NAM
		$last=date("Y-m-d h:i:s");

		$connect->query("INSERT INTO household (householder_name,householder_id, house_no, house_street, house_ward, house_city,since,last_update) VALUES ('$householderName','$householderID','$houseNumber','$street','$ward','$city','$since','$last')") or die($connect->error);

		$_SESSION['message']="Add succesfullly!";
		$_SESSION['msg_type']="success";

		header("location: index.php");

	}
	

	if(isset($_GET['edit'])){
		$id=$_GET['edit'];
		$result= $connect->query("SELECT * FROM household WHERE id=$id") or die($connect->error());
		$update=true;

		$row = $result->fetch_assoc();     
		 $householderName1= $row['householder_name'];
		 $householderID1=$row['householder_id'];
		 $houseNumber1=$row['house_no'];
		 $street1=$row['house_street'];
		$ward1=$row['house_ward'];
		$city1=$row['house_city'];
		$since1=$row['since'];


	}

	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$householderName1= $_POST['householderName'];
		 $householderID1=$_POST['householderID'];
		 $houseNumber1=$_POST['houseNumber'];
		 $street1=$_POST['houseStreet'];
		$ward1=$_POST['houseWard'];
		$city1=$_POST['houseCity'];
		//$since1=$_POST['since'];
		date_default_timezone_set("Asia/Ho_Chi_Minh");  //CÀI ĐẠT VỊ TRÍ GIỜ CHO VIỆT NAM
		$last=date("Y-m-d h:i:s");


		$connect->query("UPDATE household SET householder_name='$householderName1', householder_id='$householderID1', house_no='$houseNumber1',house_street='$street1', house_ward='$ward1',house_city='$city1', last_update='$last' WHERE id='$id' ") or die($connect->error);

		$_SESSION['message']="Update succesfullly!";
		$_SESSION['msg_type']="success";

		header("location: index.php");
	}

	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		$connect->query("DELETE FROM household WHERE id=$id") or die($connect->error);

		$_SESSION['message']="Deleted!";
		$_SESSION['msg_type']="danger";

		header("location: index.php");
	}

	
 ?>