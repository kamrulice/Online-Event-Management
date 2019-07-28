<?php include"inc/header.php";?>

					

                    <h2 style="text-align:center; margin-bottom:10px; margin-top:20px;">Your Order Details</h2>
						<table class="table table-striped">
							<tr>
								<th width="5%">SL</th>
								<th width="20%">Product Name</th>
								<th width="15%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<tr>
								<td><?php echo $i ; ?></td>
								<td></td>
								<td><img src="images/new-pic3.jpg" alt=""/></td>
								<td>Tk. 20000</td>
								<td>Tk. 2</td>
								<td>
									 
									<form action="" method="post">
									<input type="number" name="" value="1"/><button type="submit"   name="submit">Update</button>
										
									</form>
								 
								</td>
								<td>Tk. 40000</td>
								<td><a href="">X</a></td>
							</tr>
							
							<tr>
								<td>Product Title</td>
								<td><img src="images/new-pic3.jpg" alt=""/></td>
								<td>Tk. 20000</td>
								<td>
									<form action="" method="post">
										<input type="number" name="" value="1"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>Tk. 40000</td>
								<td><a href="">X</a></td>
							</tr>
							
							<tr>
								<td>Product Title</td>
								<td><img src="images/new-pic3.jpg" alt=""/></td>
								<td>Tk. 20000</td>
								<td>
									<form action="" method="post">
										<input type="number" name="" value="1"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>Tk. 40000</td>
								<td><a href="">X</a></td>
							</tr>
							<tr>
								<td>Product Title</td>
								<td><img src="images/new-pic3.jpg" alt=""/></td>
								<td>Tk. 20000</td>
								<td>
									<form action="" method="post">
										<input type="number" name="" value="1"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>Tk. 40000</td>
								<td><a href="">X</a></td>
							</tr>
							
							<tr>
								<td>Product Title</td>
								<td><img src="images/new-pic3.jpg" alt=""/></td>
								<td>Tk. 20000</td>
								<td>
									<form action="" method="post">
										<input type="number" name="" value="1"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>Tk. 40000</td>
								<td><a href="">X</a></td>
							</tr>
							
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>TK. 210000</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>TK. 31500</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>TK. 241500 </td>
							</tr>
					   </table>

<?php include"inc/footer.php" ;?>