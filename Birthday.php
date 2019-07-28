<?php include 'inc/header.php'; ?>


 <?php
      $db = new Database();
      $query = "SELECT * FROM tbl_types WHERE status='0'  LIMIT 6";
      $post_result = $db->select($query);
      if($post_result){
        foreach($post_result as $post){
      


   ?>
   
   
   <div class="post-container">
   
   
     <div style="height:142px; width:246px; background-size:cover; margin-left:10px;text-align:center; background-image:url(admin/<?php echo $post['image'];?>);">

     </div>
       
      <p class="description"><?php echo $post['body'];?></p>
      <h2 style="font-size:20px;">$ <?php echo $post['price'];?></h2>
      <a href="Details.php? delId=<?php echo $post['id'];?>"><button class="btn btn-primary" class="btn btn-primary">Details</button></a>
     
   </div>
    <?php } } ?>
 

















<?php include 'inc/footer.php'; ?>