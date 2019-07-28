<?php include"inc/header.php";?>
 

 <div class="container">


 	<div class="row" style="width:100%; margin-left:0px;">
 		<?php 
 				if(isset($_GET['delId'])){
 					$id = $_GET['delId'];
 					$db = new Database();
 					$query = "SELECT tbl_product.*,tbl_Category.name FROM tbl_product INNER JOIN tbl_category
			           ON tbl_product.catId = tbl_category.catId WHERE productId = '$id'";
 					$Details = $db->select($query);
 				}

 				if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){

 					$db = new Database();
 					$fm = new Format();
 					 $quantity= $fm->validation($_POST['quantity']);
 					 $quantity = mysqli_real_escape_string($db->link,$_POST['quantity']);
 					 // $productId = mysqli_real_escape_string($db->link,$_POST['id']);
 					  $sid = session_id();

 					 $query = "SELECT * FROM tbl_product WHERE productId='$id'";
 					  $result = $db->select($query);
            if($result){
                foreach($result as $value){
 					  $productName = $value['productName'];
 					  $image = $value['image'];
 					  $price = $value['price'];

            $chk = "SELECT * FROM tbl_cart WHERE productId='$id' AND sid='$sid'";
            $chkProduct = $db->select($chk);
            if($chkProduct){
                echo "<span class='alert alert-danger'>Product Already Added!</span>";
            }
              else{
 					   $query = "INSERT INTO tbl_cart(sid,productId,productName,price,quantity,image)VALUES('$sid','$id','$productName','$price','$quantity','$image')";
                    $addCart = $db->insert($query);
                    if ($addCart) {
                        header('location:cart.php');
                    }else{
                        echo "<span class='error'>cart is not inserted!</span>";
                    }
                }
              }


              }
            }
 		 ?>
 		
 		 
 			<?php 
 				if($Details){
 					foreach($Details as $preview){
 				
 			?>
 			 <div style="height:300px; width:246px; background-size:cover; margin-left:30px;text-align:center; float: left; background-image:url(admin/<?php echo $preview['image'];?>);"></div>
 		
 		<div style="float:right;">
 			<h2 style="font-size:20px;
           text-align: center;margin-top:51px;margin-left: 30px; font-family:italic;">Company Name: <span style="color:red; font-size:25;"><?php echo $preview['productName'];?></span></h2>
           <h2 style="font-size: 25px;
           text-align: center;margin-left:96px; font-size:20px; font-family:italic;">Category: <span style="color:red; font-size:25;"><?php echo $preview['name'];?></span></h2>

 			<h2 style="margin-left: 134px; text-align:center; font-size:20px; font-family:italic;">price:<span style="color:red; font-size:25px">$<?php echo $preview['price'];?></span></h2>

 			<form action="" method="post" style="max-width: 150px; margin-top: 122px;margin-left:150px;">

 				<div class="form-group">
 					<input type="number" name="quantity" class="form-control">
 				</div>
 					<div class="form-group">
 					<input type="submit" class="btn btn-primary" name="submit" value="Buy Now"/>
 				</div>
 			</form>

 		</div>
 		<div style="height:300px; margin-top:30px;">
 			<h2 style="text-align:center;  height:50px; margin-bottom:10px; background-color:#026890; color:white; font-size:20px; padding:10px;">Details About</h2>
 			<p style="text-align:center;"><?php echo $preview['body'];?></p>
 		</div>
 		

 	</div>
 <?php } } ?>
 </div>





<?php include"inc/footer.php";?>