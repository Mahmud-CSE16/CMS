<table class="table table-bordered table-hover">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        <?php
 $query = "select * from users";
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

     echo "<tr>";
     echo "<td>$user_id</td>";
     echo "<td>$username</td>";
     echo "<td>$user_firstname</td>";
//            $query = "select * from categories where cat_id = {$post_category_id}";
//            $select_cat_id = mysqli_query($conn,$query);
//            while($row = mysqli_fetch_assoc($select_cat_id)){
//                $cat_id = $row['cat_id'];
//                $cat_title = $row['cat_title'];
//                echo "<td>{$cat_title}</td>";
//            }
     echo "<td>$user_lastname</td>";
     echo "<td>$user_email</td>";
//     echo "<td> <img src='../images/$post_image' width='100' height='50' alt='image'></td>";
     echo "<td>$user_role</td>";
      echo "<td><a href='users.php?admin={$user_id}'>Admin</a></td>";
     echo "<td><a href='users.php?subscriber={$user_id}'>Subscriber</a></td>";;
     echo "<td><a href='users.php?source=edit_user&user_id={$user_id}'>Edit</a></td>";
     echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
     echo"</tr>";


 }

 ?>

 </table>
 


<?php 

  if(isset($_GET['admin'])){
      $the_user_id = $_GET['admin'];
      $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$the_user_id} ";
      
      $admin_query = mysqli_query($conn,$query);
      header("location: users.php");
  }

  if(isset($_GET['subscriber'])){
      $the_user_id = $_GET['subscriber'];
      $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$the_user_id} ";
      
      $subscriber_query = mysqli_query($conn,$query);
      header("location: users.php");
  }


  if(isset($_GET['delete'])){
      $the_user_id = $_GET['delete'];
      $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
      
      $delete_query = mysqli_query($conn,$query);
      header("location: users.php");
  }
?>