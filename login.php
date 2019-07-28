<?php include"inc/header.php";?>
	
 



<div style="max-width:600px; margin:0 auto; margin-top:109px; margin-bottom:20px; height:600px;">
	<?php
		if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		$db = new Database();
		$email =mysqli_real_escape_string($db->link,$_POST['email']);
		$password =mysqli_real_escape_string($db->link,$_POST['password']);
		$query = "SELECT * FROM  tbl_registration WHERE  email='$email' AND password='$password'";

		$result = $db->select($query);
 			if($result == true){
 				$value = mysqli_fetch_array($result);
 				$row = mysqli_num_rows($result);
 				if($row > 0){
 				Session::set("customerLogin",true);
 				Session::set("customerId",$value['customerId']);
 				Session::set("name",$value['name']);
 					header('location:order.php');
 				
 				
 			}else{
 				echo "<span class='alter alter-danger'>Email and password is not match!</span>";
 			}
 		}
 	}



	?>
	<form action="" method="post">

		<div class="form-group">
			<label>E-mail</label>
			<input type="text" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
		</div>
		<button type="submit" name="submit" class="btn btn-success">Sign</button>
	</form>
</div>










<?php include"inc/footer.php";?>


 
     