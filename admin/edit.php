 
 <?php include 'inc/header.php';?>
  <?php include 'inc/sidebar.php';?>
  <?php include'../lib/Database.php';
        $db = new Database();
   ?>
   <?php 
    if(!isset($_GET['catId']) && $_GET['catId']==NULL){
        echo "<script>window.location='catlist.php';</script>";
    }else{
        $id = $_GET['catId'];
    }

    $query = "SELECT name FROM tbl_category WHERE catId='$id'";
    $result = $db->select($query);


   ?>

         <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
                <?php
                    
                    if($_SERVER['REQUEST_METHOD'] =='POST'){
                        $name = mysqli_real_escape_string($db->link,($_POST['name']));
                        if(empty($name)){
                            echo "<span class='error'>Field Must not be empty</span>";
                        }
                        else{
                            $query = "UPDATE  tbl_category 
                            SET
                            name='$name'
                           WHERE  catId = '$id'";
                           $updateRow =$db->update($query);
                            if($updateRow){
                                echo "<span class='success'>Category Update successfully !!</span>";
                            }
                            else{
                                echo "<span class='error'>Category not updated !!</span>";
                            }
                        }

                    }
                       ?>
                <?php 
                if($result){
                    foreach($result as $value){
                
                ?>
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="name"  value="<?php echo $value['name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } } ?>
                </div>
            </div>
        </div>
       
          <?php include 'inc/footer.php';?> 