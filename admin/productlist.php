<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../lib/Database.php';
      $db = new Database();

 ?>
 <?php include '../helpers/format.php';
 	  $fm = new Format();
 	  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <?php
                if(isset($_GET['productId'])){
                
                $id = $_GET['productId'];
                	   
                	$query = "DELETE FROM tbl_product WHERE productId='$id'";
                	$deleteRow = $db->delete($query);
                	if($deleteRow){
                		echo "<span class='success'>Delete successfully</span>";
                	}else{
                		echo "<span class='error'>Delete Failed!</span>";
                	}
                	}
                	


                ?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				
				<tr>
					<th>SL</th>
					<th>product Name</th>
					<th>Description</th>
					<th>Category</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
		<?php 

					$query = "SELECT tbl_product.*,tbl_Category.name FROM tbl_product INNER JOIN tbl_category
							ON tbl_product.catId = tbl_category.catId
							ORDER BY tbl_product.productId DESC
					";
					$result = $db->select($query);
					if($result){
						$i=0;
						foreach($result as $value){
							$i++;
	
				?>
			<tbody>

				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $value['productName'];?></td>
					<td><?php echo  $fm->textShorten($value['body'],50);?></td>
					<td><?php echo $value['name'];?></td>
					<td>$<?php echo $value['price'];?></td>
					<td><img src="<?php echo $value['image'];?>" height="40px"; weight="60px"></td>
					<td class="center"><?php
						if($value['type']==0){
						 echo "featured";
						}else{
							echo "General";
						}
					?>
						
					</td>
					<td><a href="editproduct.php? productId=<?php echo $value['productId'];?>">Edit</a> || <a onclick="return confirm('Are sure want to Delete')"; href="?productId=<?php echo $value['productId'];?>">Delete</a></td>
				</tr>
				 
			</tbody>
			<?php } } ?>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
