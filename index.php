
<?php include"inc/header.php";?>
<?php include"inc/slider.php";?>


 <?php
      $db = new Database();
      $query = "SELECT tbl_product.*,tbl_Category.name FROM tbl_product INNER JOIN tbl_category
              ON tbl_product.catId = tbl_category.catId
              ORDER BY tbl_product.productId DESC LIMIT 6";
      $post_result = $db->select($query);
      if($post_result){
        foreach($post_result as $post){
      


   ?>
   
   
   <div class="post-container">
   
   
     <div style="height:142px; width:246px; background-size:cover; margin-left:10px;text-align:center; background-image:url(admin/<?php echo $post['image'];?>);">

     </div>
      <h2 class="collection"><?php echo $post['productName'];?></h2>
      <p class="description"><?php echo $post['body'];?></p>
      <h2 style="font-size:20px;">$ <?php echo $post['price'];?></h2>
      <a href="Details.php? delId=<?php echo $post['productId'];?>"><button class="btn btn-primary"><?php echo $post['name'];?></button></a>
     
   </div>
    <?php } } ?>
 
  

   <?php include"inc/footer.php";?>