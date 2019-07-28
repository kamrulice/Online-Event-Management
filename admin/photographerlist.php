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
                if(isset($_GET['id'])){
                
                $id = $_GET['id'];
                	   
                	$query = "DELETE FROM tbl_photographer WHERE id='$id'";
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
					<th>photographer Name</th>
					<th>Description</th>
					 
					<th>Image</th>
					 
					<th>Action</th>
				</tr>
			</thead>
		<?php 

					$query = "SELECT * FROM tbl_photographer";
							 
					$result = $db->select($query);
					if($result){
						$i=0;
						foreach($result as $value){
							$i++;
	
				?>
			<tbody>

				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $value['name'];?></td>
					<td><?php echo  $fm->textShorten($value['body'],50);?></td>
					 
				 
					<td><img src="<?php echo $value['image'];?>" height="40px"; weight="60px"></td>
				 
					<td><a href="editphoto.php? phtoId=<?php echo $value['id'];?>">Edit</a> || <a onclick="return confirm('Are sure want to Delete')"; href="?phtoId=<?php echo $value['id'];?>">Delete</a></td>
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
