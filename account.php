<?php
//return to login if not logged in

//include_once('user.php');


include_once 'header.php';


if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:index.php');
}
 
$userDetailsRow = $crud->fetch_data_with_id('users', 'user_id', $_SESSION['user']);
 
?>

<div class="container" style="display:flex;justify-content:center;align-items:center;flex-direction:column;margin:4rem;min-height:40vh">
	<h1 class="page-header text-center">Welcome, <?php echo ucfirst($userDetailsRow['name']); ?> </h1>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			
			<h4>User Info: </h4>
			<!-- <p>Member since: <?php echo $userDetailsRow['reg_date']; ?></p> -->
			<p>Username: <?php echo $userDetailsRow['username']; ?></p>
			<p>Password: <?php echo $userDetailsRow['password']; ?></p>
			<a href="index.php?logout=1" class="btn btn-danger" style="text-decoration:none;background:#aa2b1d;padding:.5rem 1rem .5rem 1rem;
			color:white;position:relative;top:2rem;"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
		</div>
	</div>
</div>


<?php include 'footer.php'; ?>