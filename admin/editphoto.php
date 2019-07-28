
 <?php include 'inc/header.php';?>
  <?php include 'inc/sidebar.php';?>
  <?php include'../lib/Database.php';
        $db = new Database();
   ?>
   <?php 
    if(!isset($_GET['phtoId']) && $_GET['phtoId']==NULL){
        echo "<script>window.location='photographerlist.php';</script>";
    }else{
        $id = $_GET['phtoId'];
    }
   ?>
   <div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>

        <?php

            if($_SERVER['REQUEST_METHOD']=='POST'){

                $name= mysqli_real_escape_string($db->link,$_POST['name']);
                 
                $body = mysqli_real_escape_string($db->link, $_POST['body']);
                
                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploaded_image = "upload/".$unique_image;

                if($name=='' || $body==''){
                    echo "<span class='error'>Field name must not be empty</span>";
                    
                }else{
                  if(!empty($file_name)){
                    if ($file_size >1048567) {
                         echo "<span class='error'>Image Size should be less then 1MB!
                         </span>";
                        }
                         elseif (in_array($file_ext, $permited) === false) {
                         echo "<span class='error'>You can upload only:-"
                         .implode(', ', $permited)."</span>";
                        } 
                        else{
                     move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_photographer
                                SET name ='$name',
                                    body = '$body',
                                    image = '$uploaded_image'
                                      WHERE id = '$id'";
                    $updateRow = $db->update($query);
                    if ($updateRow) {
                       echo "<span class='success'>product Update successfully</span>";
                    }else{
                        echo "<span class='error'>Product is not Update!</span>";
                    }
                }


            }else{ 

                    $query = "UPDATE tbl_photographer
                                SET name ='$name',
                                      body = '$body'
                                   WHERE id = '$id'";
                    $updateRow = $db->update($query);
                    if ($updateRow) {
                       echo "<span class='success'>product Update successfully</span>";
                    }else{
                        echo "<span class='error'>Product is not Update!</span>";
                    }
                }
          }
        }

        ?>
          <?php
         $query = "SELECT * FROM tbl_photographer WHERE id='$id'";
           $editresult = $db->select($query);
          if($editresult){
            foreach($editresult as $editpost){

        ?>         
        <div class="block">      
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $editpost['name'];?>" class="medium" />
                    </td>
                </tr>
        
        
        
         <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                          <?php echo $editpost['body'];?>
                        </textarea>
                    </td>
                </tr>
        
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    <img src="<?php echo $editpost['image'];?>" height="40px" weight="60px"/><br/>
                    
                        <input type="file" name="image" />
                    </td>
                </tr>
        
        

        <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>

            </form>
            <?php } }?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>



