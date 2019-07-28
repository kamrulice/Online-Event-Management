<?php
	include'../lib/Session.php';
	Session::checklogin();

?>


<?php include'../lib/Database.php'; ?>
<?php include '../helpers/format.php';?>
<?php include '../classes/adminLogin.php';?>



<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
	if($_SERVER['REQUEST_METHOD']== 'POST'){
	 	 
	 	  $fm = new Format();
			 $db = new Database();

	 
		 $adminUser =$fm->validation($_POST['adminUser']);
 		$adminPass = $fm->validation(md5($_POST['adminPass']));

 		$adminUser = mysqli_real_escape_string($db->link,$adminUser);
 		$adminPass = mysqli_real_escape_string($db->link,$adminPass);
 	 

 			$query = "SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass'";
 			$result = $db->select($query);
 			if($result == true){
 				$value = mysqli_fetch_array($result);
 				$row = mysqli_num_rows($result);
 				if($row > 0){
 				Session::set("adminlogin",true);
 				Session::set("adminUser",$value['adminUser']);
 				Session::set("adminPass",$value['adminPass']);
 				Session::set("adminId",$value['adminId']);
 				Session::set("adminName",$value['adminName']);
 				Session::set("adminEmail",$value['adminEmail']);

 				header("location:admin.php");
 			} 
 			else{
 					 echo"UserName or Password  not match !";
 		        	 
 			}
 		}
 		}

?>
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username"   name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password"   name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Login" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Online Event Management</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>