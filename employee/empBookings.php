<?php
require($_SERVER['DOCUMENT_ROOT']."/Web_HairSalon/conn/connection.php");
$user_id = $_SESSION['user_id'];
$empl=mysqli_query($con, "SELECT * from employee WHERE employee.user_id = $user_id;");
$empl = mysqli_fetch_assoc($empl);
$emid = $empl['employee_id'];

 ?>
<!DOCTYPE html>
<html class = "h-100"lang="en" dir="ltr">
<head>
<meta charset="utf-8">

<title>J.HairSalon</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<style type="text/css">
*{
	font-family: var(--bs-font-sans-serif);
}
</style>
<body class = "d-flex flex-row h-100">

<div class="col-2 border border-danger h-100 flex-column d-flex"style="height:50px;background: #ffe6e6 !important;">

<a href="employee.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Home</small></p></a>
<a href="empProfile.php" class=" btn btn-outline-light rounded-0 pt-0" style=""><p class="m-0"  style="color:black; font-size:100%;"><small>Profile</small></p></a>
<a href="empBookings.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Bookings</small></p></a>
<a href="payroll.php" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>View Payroll</small></p></a>
<a href="" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>About</small></p></a>
<a href="\Web_HairSalon\conn\logout.php" onclick="return confirm('Are you sure you want to log out?');" class=" btn btn-outline-light pt-0" style=""><p class="m-0" style="color:black; font-size:100%; text-align:center;"><small>Logout</small></p></a>

</div>

<div class="container-fluid" style="background:#0F222D;">
<div class="col-lg-12 mt-2" style="width:100%;height:17vh;">
	<div class="h-100 rounded d-flex justify-content-center" style="background:  #ffe6e6;">
	<img src="\Web_HairSalon\image\logo.png" alt="" class="h-100" style="border-radius: 50%;">
	</div>
</div>

<div class="col-lg-12 mt-2">
	<div class="col-lg-6 card-body bg-white">
<?php 
$sql = mysqli_query($con, "SELECT * from bookings WHERE employee_id = $emid ORDER BY date_sched ASC;");

?>		
<h3>Booked Customer</h3>
<?php 
	while($rows=mysqli_fetch_assoc($sql)){
    $date = date_create($rows['date_sched']);
?>
      		<ul id="dataTable">
        		<li>
        			<dl>
        				<dt><?php echo $rows['customer_id'];?></dt>
        				<dd><?php echo $rows['service_id'];?></dd>
                <dd><?php echo date_format($date, "m/d/Y");?></dd>
                <dd><?php echo $rows['date_sched'];?></dd>
        			</dl>
        			<button>Accept</button>
        		</li>        		
     		</ul>      
<?php }?>
      	<h3>Completed</h3>
      		<ul id="completed-tasks">
        		<li>
        			<input type="checkbox" checked>
        			<label>See the Doctor</label>
        			<button class="delete">Delete</button>
        		</li>
      </ul>
	</div>
</div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



</body>
</html>
