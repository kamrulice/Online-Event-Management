 <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
 <?php include'../lib/Database.php';
      $db = new Database();
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Types</h2>

        <?php

            if($_SERVER['REQUEST_METHOD']=='POST'){
                
                $body =  mysqli_real_escape_string($db->link,$_POST['body']);
                $price = mysqli_real_escape_string($db->link,$_POST['price']);
                $type =  mysqli_real_escape_string($db->link,$_POST['type']);
              
                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploaded_image = "upload/".$unique_image;

                if($body =='' || $price ==''|| $type ==''){
                    echo "<span class='error'>Field name must not be empty</span>";
                    
                }
                 elseif ($file_size >1048567) {
                         echo "<span class='error'>Image Size should be less then 1MB!
                         </span>";
                        }
                         elseif (in_array($file_ext, $permited) == false) {
                         echo "<span class='error'>You can upload only:-"
                         .implode(', ', $permited)."</span>";
                        } 
                else{
                     move_uploaded_file($file_temp, $uploaded_image);
                    $query = "INSERT INTO tbl_types(body,price,image,type)VALUES('$body','$price','$uploaded_image','$type')";
                    $addproduct = $db->insert($query);
                    if ($addproduct) {
                       echo "<span class='success'>product insert successfully</span>";
                    }else{
                        echo "<span class='error'>Product is not inserted!</span>";
                    }
                }


            }

        ?>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                
               
                
                
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <input type="text" name="type">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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


