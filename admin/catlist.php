<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../lib/Database.php';
        $db = new Database();
   ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
                if(isset($_GET['delid'])){
                
                $id = $_GET['delid'];
                	   
                	$query = "DELETE FROM tbl_category WHERE catId='$id'";
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
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php

					$i=0;
					$query = "SELECT * FROM tbl_category ORDER BY catId DESC";
					$result = $db->select($query);
					if($result){
						foreach($result as $value){
							$i++;
							?>

					
					<tbody>
						<tr class="even gradeC">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['name'];?> </td>
							<td><a href="edit.php? catId=<?php echo $value['catId'];?>">Edit</a> || <a onclick="return confirm('Are sure want to Delete')"; href="?delid=<?php echo $value['catId'];?>">Delete</a></td>
						</tr>
					</tbody>
					<?php }}?>

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

