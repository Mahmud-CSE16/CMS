<?php 
  if(isset($_POST['checkBoxArray'])){
      foreach($_POST['checkBoxArray'] as $postIdValue){
          $bulk_option = $_POST['bulk_option'];
          switch($bulk_option){
              case 'published':
                  $query = "UPDATE posts SET post_status = '{$bulk_option}' WHERE post_id = {$postIdValue} ";
                  $update_post_status = mysqli_query($conn,$query);
                  break;
              case 'draft':
                  $query = "UPDATE posts SET post_status = '{$bulk_option}' WHERE post_id = {$postIdValue} ";
                  $update_post_status = mysqli_query($conn,$query);
                  break;
              case 'delete':
                  $query = "DELETE FROM posts WHERE post_id = {$postIdValue} ";
                  $delete_post = mysqli_query($conn,$query);
                  
                   $query = "DELETE FROM comments WHERE comment_post_id = {$postIdValue} ";
                   $delete_comment_query = mysqli_query($conn,$query);
                  break;
          }
      }
  }
?>



<form action="" method="post">

<table class="table table-bordered table-hover">
       
       <div id="bulkOptionContainer" class="col-xs-4" >
           <select name="bulk_option" id="" class="form-control">
               <option value="">Select Option</option>
               <option value="published">Publish</option>
               <option value="draft">Draft</option>
               <option value="delete">Delete</option>
           </select>
       </div>
       <div class="col-xs-4">
           <input type="submit" class='btn btn-success' value="Apply">
           <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
       </div>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
        <?php
 $query = "select * from posts";
 $select_all = mysqli_query($conn,$query);

 while($row = mysqli_fetch_assoc($select_all)){
     $post_id = $row['post_id'];
     $post_author = $row['post_author'];
     $post_title = $row['post_title'];
     $post_category_id = $row['post_category_id'];
     $post_status = $row['post_status'];
     $post_tags = $row['post_tags'];
     $post_image = $row['post_image'];
     $post_comment_count = $row['post_comment_count'];
     $post_date = $row['post_date'];

     echo "<tr>";
     ?>
     <td><input type="checkbox" class="checkBox" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>
     <?php
     echo "<td>$post_id</td>";
     echo "<td>$post_author</td>";
     echo "<td><a href='../post.php?p_id= {$post_id}'>$post_title<a></td>";
            $query = "select * from categories where cat_id = {$post_category_id}";
            $select_cat_id = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($select_cat_id)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<td>{$cat_title}</td>";
            }
     echo "<td>$post_status</td>";
     echo "<td>$post_tags</td>";
     echo "<td> <img src='../images/$post_image' width='100' height='50' alt='image'></td>";
     echo "<td>$post_comment_count</td>";
     echo "<td>$post_date</td>";
     echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
     echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
     echo"</tr>";


 }

 ?>

 </table>
</form>   


<?php 
  if(isset($_GET['delete'])){
      $the_post_id = $_GET['delete'];
      $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
      $delete_post_query = mysqli_query($conn,$query);
      
      $query = "DELETE FROM comments WHERE comment_post_id = {$the_post_id} ";
      $delete_comment_query = mysqli_query($conn,$query);
      header("location: posts.php");
  }
?>
