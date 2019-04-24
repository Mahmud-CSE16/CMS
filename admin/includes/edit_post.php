<?php 

if(isset($_GET['p_id'])){
     $the_post_id = $_GET['p_id'];
     $the_post_image = "";
     $query = "SELECT * FROM posts WHERE post_id = {$the_post_id} ";
     $select_all = mysqli_query($conn,$query);
    
     while($row = mysqli_fetch_assoc($select_all)){
         $post_id = $row['post_id'];
         $post_author = $row['post_author'];
         $post_title = $row['post_title'];
         $post_category_id = $row['post_category_id'];
         $post_status = $row['post_status'];
         $post_tags = $row['post_tags'];
         $post_content = $row['post_content'];
         $the_post_image =$post_image = $row['post_image'];
         $post_comment_count = $row['post_comment_count'];
         $post_date = $row['post_date'];
     }
    
    if(isset($_POST['update_post'])){
        $post_title = $_POST['title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 4;

        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        if(empty($post_image)){
            $post_image = $the_post_image;
        }
        
        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_category_id ='{$post_category_id}', ";
        $query .= "post_date = now(), ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_image = '{$post_image}' ";
        $query .=  "WHERE post_id = {$the_post_id} ";
        
        $update_post = mysqli_query($conn,$query);
        confirmQuery($update_post);
       // header("location: posts.php");
        echo "Your post is updeted"."   "."<a href='../post.php?p_id={$post_id}'>View Post</a> or <a href='posts.php'>Edit More Posts</a>";
    }
}

 
?>
 
 <form action="" method="post" enctype="multipart/form-data">
  
   <div class="form-group">
       <label for="title">Post Title</label>
       <input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
   </div>
   
   <div class="form-group">
       <label for="post_category_id">Post category</label>
       <select name="post_category" id="">
           <?php
            $query = "select * from categories";
            $select_all = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($select_all)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
           ?>
           
       </select>
   </div>
   
   <div class="form-group">
       <label for="post_author">Post Author</label>
       <input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
   </div>
   
    <div class="form-group">
       <label for="post_status">Post Status</label>
       <select name="post_status" id="">
          <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
           <?php
               if($post_status == 'draft'){
                  echo  "<option value='published'>published</option>";
               }else{
                   echo "<option value='draft'>draft</option>";
               }
           ?>
           
       </select>
   </div>
   
<!--
   <div class="form-group">
       <label for="post_status">Post Status</label>
       <input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>">
   </div>
-->
   
   <div class="form-group">
       <label for="post_image">Post Image</label>
       <img src="../images/<?php echo $post_image; ?>" width="100" height="50" alt="image">
       <input type="file" class="form-control" name="post_image">
   </div>
   
   <div class="form-group">
       <label for="post_tags">Post Tags</label>
       <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
   </div>
   
   <div class="form-group">
       <label for="post_content">Post Content</label>
       <textarea class="form-control" id="body" name="post_content" cols="30" rows="10">
          <?php echo $post_content; ?>
       </textarea>
   </div>
   
   <div class="form-group">
       <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
   </div>
</form>