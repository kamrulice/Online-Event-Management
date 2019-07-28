<?php include"inc/header.php";?>




<div style="max-width:600px; margin:0 auto; height:600px; margin-top:70px;">
	<?php 
		if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){

			$db = new Database();

			$firstname = mysqli_real_escape_string($db->link,$_POST['firstname']);
			$lastname = mysqli_real_escape_string($db->link,$_POST['lastname']);
			$email= mysqli_real_escape_string($db->link,$_POST['email']);
			$message = mysqli_real_escape_string($db->link,$_POST['message']);

			if($firstname=='' || $lastname=='' || $email=='' || $message==''){
				echo "<span class='alert alert-danger'>Field must not be empty!</span>";

			}
			 
			$query ="INSERT INTO tbl_contact(firstname,lastname,email,message)VALUES('$firstname','
			$lastname ','$email','$message')";

			$insertRow = $db->insert($query);
			if($insertRow){
				echo "<span class='alert alert-success'>Message sent successfully!</span>";
			}
		}
		

	?>
	<form action="contact.php" method="post">
		<div class="form-group">
			<label for="firstname">Your First Name</label>
			<input type="text" name="firstname" id="firstname" class="form-control"/s>
		</div>
		<div class="form-group">
			<label for="lastname">Your Last Name</label>
			<input type="text" name="lastname" id="lastname" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="password">Your Email Address</label>
			<input type="email" name="email" id="email" class="form-control"/>
		</div>
		 
		<div class="form-group">
			<label> Your Message</label>
			<textarea class="form-control" name="message" rows="5" id="Message"></textarea>
		</div>
		<input type="submit" name="submit" value="Sent" class="btn btn-primary"/>
	</form>
</div>








<?php include"inc/footer.php";?>