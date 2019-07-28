<?php include'inc/header.php';?>


<?php
				 if(isset($_GET['search'])){
				 	 
				 
				 	$search = $_GET['search'];
				 }

			?>


			<?php

				$query = "SELECT * FROM tbl_product WHERE productName LIKE '%$search%' or body LIKE '%$search%' ";
				$result = $db->select($query);

				if($result){
					foreach ($result as $post) {
					
			?>
			 <div class="post-container">
   
   
     <div style="height:142px; width:246px; background-size:cover; margin-left:10px;text-align:center; background-image:url(admin/<?php echo $post['image'];?>);">

     </div>
      <h2 class="collection"><?php echo $post['productName'];?></h2>
      <p class="description"><?php echo $post['body'];?></p>
      <h2 style="font-size:20px;">$ <?php echo $post['price'];?></h2>
      <a href="Details.php? delId=<?php echo $post['productId'];?>"><button class="btn btn primary">Details</button></a>
      	 
     
   </div>
    <?php } } ?>
 
  
















<?php include'inc/footer.php';?>
