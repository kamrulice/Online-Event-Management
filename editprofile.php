<?php include"inc/header.php";?>

<?php 
	$login = Session::get('customerLogin');
	if($login==false){
		header("location:login.php");
	}

?>
<div style="max-width:550px; margin-top:40px; margin-bottom:20px; margin:0 auto;">
	
	<?php
		$db = new Database();
		$id = Session::get('customerId');
		$query = "SELECT * FROM tbl_registration WHERE customerId ='$id'";
		$result = $db->select($query);
		
?>
<?php 

	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		
		$db = new Database();
		$id = Session::get('customerId');

		$name = mysqli_real_escape_string($db->link,$_POST['name']);
		$city = mysqli_real_escape_string($db->link,$_POST['city']);
		$zipCode = mysqli_real_escape_string($db->link,$_POST['zipCode']);
		$email = mysqli_real_escape_string($db->link,$_POST['email']);
		$address = mysqli_real_escape_string($db->link,$_POST['address']);
		$country = mysqli_real_escape_string($db->link,$_POST['country']);
		$number = mysqli_real_escape_string($db->link,$_POST['number']);
		$password =mysqli_real_escape_string($db->link, $_POST['password']);

		if($name=='' || $city=='' || $zipCode=='' || $email=='' || $address=='' || $country=='' || $number=='' || $password==''){
			echo "<span class='alert alert-danger'>Field Must not be empty!</span>";
		}
		else{
			  $query = "UPDATE tbl_registration
                                SET name ='$name',
                                    city = '$city',
                                    zipCode = '$zipCode',
                                    email= '$email',
                                    address = '$address',
                                    country = '$country',
                                    number = '$number',
                                    password ='$password'
                                    WHERE customerId = '$id'";
                    $updateRow = $db->update($query);
                    if ($updateRow) {
                       echo "<span class='alert alert-success'>profile Update successfully</span>";
                    }else{
                        echo "<span class='alert alert-danger'>profile is not Update!</span>";
                    }
		}

	}
		?>
	<form action="" method='post'>
		<?php if($result){
			foreach($result as $value) {
				 ?>
<table class="table table-striped" style="text-align:justify; border:2px solid #E0E1E1;">
		<tr>
			<td colspan="2"><h2 style="text-align:center;">Update Profile</h2></td>
		</tr>
	<tr>
		<td width="20%">Name</td>
		
		<td><input type="text" name="name"  class="form-control" value="<?php echo $value['name'];?>"/></td>

	</tr>
	<tr>
		<td>City</td>
		 
		<td><input type="text" name="city"  class="form-control" value="<?php echo $value['city'];?>"/></td>

	</tr>
	<tr>
		<td>Zip-Code</td>
		
		<td><input type="text" name="zipCode"  class="form-control" value="<?php echo $value['zipCode'];?>"/></td>

	</tr>
	<tr>
		<td>Email</td>
		 
		<td><input type="text" name="email"  class="form-control" value="<?php echo $value['email'];?>"/></td>

	</tr>
	<tr>
		<td>Address</td>
		 
		<td><input type="text" name="address"  class="form-control"  value="<?php echo $value['address'];?>"/></td>

	</tr>
	<tr>
		<td>Country</td>
	 
		<td><input type="text" name="country"  class="form-control" value="<?php echo $value['country'];?>"/></td>

	</tr>
	<tr>
		<td>Number</td>
		 
		<td><input type="text" name="number"  class="form-control" value="<?php echo $value['number'];?>" class="form-control"/></td>

	</tr>
	<tr>
		<td>Password</td>
		 
		<td><input type="password" name="password"  class="form-control" value="<?php echo $value['password'];?>" class="form-control"/></td>

	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Save" class="btn btn-success"></td>
		 

	</tr>

</table>
<?php } } ?>
</form>
</div>









<?php include"inc/footer.php";?>