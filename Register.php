<?php include"inc/header.php";?>




	
<div style="max-width:600px; margin:0 auto; margin-top:20px; margin-bottom:20px;">
	<?php
	
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		
		$db = new Database();

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

			$mailquery = "SELECT * FROM tbl_registration WHERE email='$email' LIMIT 1";
			$mailchk = $db->select($mailquery);
			if($mailchk != false){
				echo "<span class='alert alert-danger'>E-mail already exist!</span>";
			}

		else{

		$query = "INSERT INTO tbl_registration(name,city,zipCode,email,address,country,number,password)VALUES('$name','$city','$zipCode','$email','$address','$country','$number','$password')";
		$result = $db->insert($query);
		if($result){
			echo"<span class='alert alert-success'>Customer Data inserted Successfully</span>";
		}
		else{
			echo"<span class='alert alert-danger'>Customer Data is not inserted !</span>";
		}
	}
	}
?>
	<form action="" method="post">
		<div class="form-group">
			<label for="name" class="col-sm-2 col-form-label text-success">Name</label>
			<input type="text" name="name" id="name" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="city" class="col-sm-2 col-form-label text-success">City</label>
			<input type="text" name="city" id="city" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="zipCode" class="col-sm-2 col-form-label text-success">Zip-Code</label>
			<input type="text" name="zipCode" id="zipCode" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-2 col-form-label text-success">E-mail</label>
			<input type="text" name="email"  class="form-control"/>
		</div>

		<div class="form-group">
			<label for="address" class="col-sm-2 col-form-label text-success">Address</label>
			<input type="text" name="address" id="address" class="form-control"/>
		</div>
		<div class="form-group">
						<select id="country" name="country" onchange="change_country(this.value)" class="form-control">
							<option value="null">Select a Country</option>         
							<option value="AF">Afghanistan</option>
							<option value="AL">Albania</option>
							<option value="DZ">Algeria</option>
							<option value="AR">Argentina</option>
							<option value="AM">Armenia</option>
							<option value="AW">Aruba</option>
							<option value="AU">Australia</option>
							<option value="AT">Austria</option>
							<option value="AZ">Azerbaijan</option>
							<option value="BS">Bahamas</option>
							<option value="BH">Bahrain</option>
							<option value="BD">Bangladesh</option>

		         </select>
				 </div>		  
				 <div class="form-group">
			<label for="number" class="col-sm-2 col-form-label text-success">Phone</label>
			<input type="text" name="number" id="number" class="form-control"/>
		</div>      
		<div class="form-group">
			<label for="password" class="col-sm-2 col-form-label text-success">Password</label>
			<input type="password" name="password" id="password" class="form-control"/>
		</div>
		<input type="submit" name="submit" value="Submit" class="btn btn-success"/>
	</form>
</div>

<?php include"inc/footer.php";?>