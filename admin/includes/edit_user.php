<?php 
if($_GET['user_id']){
    $the_user_id = $_GET['user_id'];
    
    $query = "select * from users where user_id = {$the_user_id} ";
    $select_all = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($select_all)){
         $user_id = $row['user_id'];
         $username = $row['username'];
         $user_password = $row['user_password'];
         $user_firstname = $row['user_firstname'];
         $user_lastname = $row['user_lastname'];
         $user_email = $row['user_email'];
         $user_image = $row['user_image'];
         $user_role = $row['user_role'];
    }
    
    
    if(isset($_POST['edit_user'])){
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
    //    $post_image = $_FILES['post_image']['name'];
    //    $post_image_temp = $_FILES['post_image']['tmp_name'];

        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

    //    move_uploaded_file($post_image_temp,"../images/$post_image");
        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname ='{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .=  "WHERE user_id = {$the_user_id} ";

        $update_user_query = mysqli_query($conn,$query);

        confirmQuery($update_user_query);
        header("location: users.php");
    }
}
?>
 

 
 <form action="" method="post" enctype="multipart/form-data">
  
   <div class="form-group">
       <label for="user_firstname">First Name</label>
       <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
   </div>
   
   <div class="form-group">
       <label for="user_lastname">Last Name</label>
       <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
   </div>
   
   <div class="form-group">
       <label for="user_role">User Role</label>
       <select name="user_role" id="">
          <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
           <?php
               if($user_role == 'admin'){
                  echo  "<option value='subscriber'>subscriber</option>";
               }else{
                   echo "<option value='admin'>admin</option>";
               }
           ?>
           
       </select>
   </div>
   
    <div class="form-group">
       <label for="username">Username</label>
       <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
   </div>
   
   <div class="form-group">
       <label for="user_email">Email</label>
       <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
   </div>
   
<!--
   <div class="form-group">
       <label for="post_image">Post Image</label>
       <input type="file" class="form-control" name="post_image">
   </div>
-->
   
   <div class="form-group">
       <label for="user_password">Password</label>
       <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
   </div>
   
   <div class="form-group">
       <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
   </div>
</form>