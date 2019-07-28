 <?php include"inc/header.php";?>

<?php 
	$login = Session::get('customerLogin');
	if($login==false){
		header("location:login.php");
	}

?>

<?php
	if(isset($_GET['orderId']) && ($_GET['orderId'])=='order'){
 		$id = Session::get('customerId');

						$db = new Database();
						$sid = session_id();
						$query = "SELECT * FROM tbl_cart WHERE sid='$sid'";
						$result =$db->select($query);
						if($result){
							foreach ($result  as $value ) {
								 $productId = $value['productId'];
								 $productName = $value['productName'];
								 $quantity = $value['quantity'];
								 $price = $value['price'];
								 $image = $value['image'];
								 $query = "INSERT INTO tbl_order(cmdId,productId,productName,price,quantity,image)
								 VALUES('$id','$productId','$productName','$price','$quantity','$image')";
                                $addOrder = $db->insert($query);
							}
						}


                  $db =new Database();
                  $sid = session_id();
                 $query ="DELETE FROM tbl_cart WHERE id = '$id'";
                  $getData = $db->select($query);
                  if($getData){
                  	header('location:success.php');
                  }
                   
 }


?>
<div style="max-width:550px; margin-top:40px; margin-bottom:20px; margin:0 auto;">
	
	<?php
		$db = new Database();
		$id = Session::get('customerId');
		$query = "SELECT * FROM tbl_registration WHERE customerId ='$id'";
		$result = $db->select($query);
		if($result){
			foreach($result as $value){

	?>
<table class="table table-striped" style="text-align:justify; border:2px solid #E0E1E1;">
		<tr>
			<td colspan="3"><h2 style="text-align:center;">Customer Profile</h2></td>
		</tr>
	<tr>
		<td width="20%">Name</td>
		<td width="5%">:</td>
		<td><?php echo $value['name'];?></td>

	</tr>
	<tr>
		<td>City</td>
		<td>:</td>
		<td><?php echo $value['city'];?></td>

	</tr>
	<tr>
		<td>Zip-Code</td>
		<td>:</td>
		<td><?php echo $value['zipCode'];?></td>

	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $value['email'];?></td>

	</tr>
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php echo $value['address'];?></td>

	</tr>
	<tr>
		<td>Country</td>
		<td>:</td>
		<td><?php echo $value['country'];?></td>

	</tr>
	<tr>
		<td>Number</td>
		<td>:</td>
		<td><?php echo $value['number'];?></td>

	</tr>
	<tr>
		<td>Password</td>
		<td>:</td>
		<td><?php echo $value['password'];?></td>

	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><a href="editprofile.php" style="text-decoration:none;">Update Details</a></td>

	</tr>

</table>
</div>
<?php } } ?>

<table class="table table-striped" style="margin-top:20px;">
							<tr>
								<th width="5%">Np</th>
								<th width="20%">Product Name</th>
								 
								<th width="15%">Price</th>
								<th width="5%">Quantity</th>
								<th width="10%">Total Price</th>
								
								

								 
							</tr>
							 <?php

						$db = new Database();
						$sid = session_id();
						$query = "SELECT * FROM tbl_cart WHERE sid='$sid'";
						$result =$db->select($query);
						if ($result) {
								$i =0;
								$sum=0;
							 foreach($result as $value){
							 	$i++;
						


					?>
							<tr>
								<td><?php echo $i ; ?></td>
								<td><?php echo $value['productName'];?></td>
								 
								<td>$<?php echo $value['price'];?></td>
								<td><?php echo $value['quantity'];?></td>
								<td>$<?php 
									$total =  $value['price'] * $value['quantity'];
								echo $total;?></td>
								 
							</tr>
						<?php } } ?>
						 </table>

						 <div style="margin-left:421px; margin-bottom:20px;"><a href="?orderId= order"><button class="btn btn-primary">Order Now</button></a></div>









<?php include"inc/footer.php";?>