<?php
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$username='';
	$book='';
	$sched='';
	$sername='';
	$status='';
	$clicke='';
	$id='';
if (isset($_POST['submit'])) {
	$id=$_POST['id'];

	if ($clicke == '') {		
		$clicke = $_POST['user_id'];
		$sql = mysqli_query($con, "SELECT * FROM customer WHERE user_id=$clicke;");
		$rows = mysqli_fetch_assoc($sql);

		$username=$rows['f_name'].' '.$rows['l_name'];
		$book=$_POST['book'];
		$sched=$_POST['sched'];
		$sername=$_POST['service'];
		$status=$_POST['status'];

		mysqli_query($con, "UPDATE bookings SET notify_status=1 WHERE booking_id=$id;") or mysqli_error($con);
	}else{
		mysqli_error($con);
	}

}

		//mysqli_query($con, "UPDATE bookings SET notify_status=0 WHERE booking_id=$id;") or mysqli_error($con);
?>