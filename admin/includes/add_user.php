<?php 
if(isset($_POST['add_user'])){
    
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
//    $post_image = $_FILES['post_image']['name'];
//    $post_image_temp = $_FILES['post_image']['tmp_name'];
    
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    
//    move_uploaded_file($post_image_temp,"../images/$post_image");
    
    $query = "SELECT randSalt FROM users ";
         $select_randSalt_query = mysqli_query($conn,$query);
         
         if(!$select_randSalt_query){
             die("Query Failed "+mysqli_error($conn));
         }
         
         $row = mysqli_fetch_array($select_randSalt_query);
         $randSalt = $row['randSalt'];
         $user_password = crypt($user_password,$randSalt);
//    
    $query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password) ";
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}' )";
    
    $create_user_query = mysqli_query($conn,$query);
    
    confirmQuery($create_user_query);
    echo "User Created   "." <a href='users.php'>View Users</a>";
   // header("location: users.php");
}
?>
 

 <form action="" method="post" enctype="multipart/form-data">
  
   <div class="form-group">
       <label for="user_firstname">First Name</label>
       <input type="text" class="form-control" name="user_firstname">
   </div>
   
   <div class="form-group">
       <label for="user_lastname">Last Name</label>
       <input type="text" class="form-control" name="user_lastname">
   </div>
   
   <div class="form-group">
       <label for="user_role">User Role</label>
       <select name="user_role" id="">
           <option value="subscriber">Select Option</option>
           <option value="admin">admin</option>
           <option value="subscriber">subscriber</option>
           
       </select>
   </div>
   
    <div class="form-group">
       <label for="username">Username</label>
       <input type="text" class="form-control" name="username">
   </div>
   
   <div class="form-group">
       <label for="user_email">Email</label>
       <input type="email" class="form-control" name="user_email">
   </div>
   
<!--
   <div class="form-group">
       <label for="post_image">Post Image</label>
       <input type="file" class="form-control" name="post_image">
   </div>
-->
   
   <div class="form-group">
       <label for="user_password">Password</label>
       <input type="password" class="form-control" name="user_password">
   </div>
   
   <div class="form-group">
       <input type="submit" class="btn btn-primary" name="add_user" value="Add User">
   </div>
</form>