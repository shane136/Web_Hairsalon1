<?php
	require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
	$clicke='';
	$username='';
	$book='';
	$sched='';
if (isset($_POST['submit'])) {
	
	if ($clicke != '') {		
	}else{
		$clicke = $_POST['user_id'];
		$sql = mysqli_query($con, "SELECT * FROM customer WHERE user_id=$clicke;");
		$rows = mysqli_fetch_assoc($sql);

		$username=$rows['f_name'];
	}

}
?>