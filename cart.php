
<?php include'inc/header.php';?>




		<div style="height:600px; margin-top:20px;">

			<?php 

				if(isset($_GET['DelPro'])){
					$id = $_GET['DelPro'];
 					$db = new Database();

 					$query ="DELETE FROM tbl_cart WHERE id = '$id'";
 					$delProduct = $db->delete($query);
 					if($delProduct){
 						 
 						header("location:cart.php");
 					}else{
 						echo "<span class='alert alert-danger'>Product is not Delete!</span>";
 					}
				}

			?>

			<?php 

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$db = new Database();
		$id = mysqli_real_escape_string($db->link,$_POST['id']);
		$quantity = mysqli_real_escape_string($db->link,$_POST['quantity']);

		if($quantity<=0){
			$query ="DELETE FROM tbl_cart WHERE id = '$id'";
 					$delProduct = $db->delete($query);
		}

		$query = "UPDATE tbl_cart
				SET quantity='$quantity'
				WHERE id = '$id'
		";
		$UpdateRow = $db->update($query);
		if($UpdateRow){
			  header("location:cart.php");
		}else{
			echo "<span class='alert alert-danger'>Cart is not Updated!</span>";
		}
	}


?>

                    <h2 style="text-align:center; margin-bottom:10px; margin-top:20px;">Your Cart</h2>
                   
						<table class="table table-striped" style="float:left;">
							<tr>
								<th width="5%">SL</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="30%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
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
								<td><img src="admin/<?php echo $value['image'];?>" style="height:40px; weight:60px;"alt=""/></td>
								<td>$<?php echo $value['price'];?></td>
								<td>
									 
									<form action="" method="post">
										<input type="hidden" name="id" value="<?php echo $value['id'];?>"/>
									<input type="number" name="quantity" value="<?php echo $value['quantity'];?>"/><button type="submit"   name="submit">Update</button>
										
									</form>
								 
								</td>
								<td>$<?php 
									$total =  $value['price'] * $value['quantity'];
								echo $total;?></td>
								<td><a onclick="return confirm('Are You Sure Want to Delete')";     
									href="?DelPro=<?php echo $value['id'];?>">X</a></td>
							</tr>
							<?php $sum = $sum + $total;
								Session::set("sum",$sum);
							?>
							<?php } } ?>
							
						</table>
						 <?php 
						 if($getData){

						 ?>

						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php echo $sum;?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php $vat = $sum * 0.1;
									$grandtotal = $sum + $vat;
									echo $grandtotal;?> </td>
							</tr>
					   </table>
					<?php } ?>
					 
					<div style="float:right; margin-top:108px; margin-left:30px;">
						<a href="payment.php"><img src="check.png"></a>
					</div>

					</div>



	 <?php include'inc/footer.php';?>