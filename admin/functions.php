<?php
  
  function insert_categories(){
     global $conn;
     $cat_title ="";
     if(isset($_POST["submit"])){
         $cat_title = $_POST['cat_title'];
         if($cat_title=="" || empty($cat_title)){
             echo "*this field should not be empty.";
         }else{
             $query = "INSERT INTO categories(cat_title) ";
             $query .= "value('{$cat_title}') ";

             $create_catagory = mysqli_query($conn,$query);
             if(!$create_catagory){
                 die("Query failed" . mysqli_error($conn));
             }
         }
         $cat_title ="";
     }

  }

function findAllCategories(){
    global $conn;
    $query = "select * from categories";
    $select_all = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_all)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>
               <td>{$cat_id}</td>
               <td>{$cat_title}</td>
               <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
               <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>
             </tr>";
    }
                        
}

function confirmQuery($result){
    global $conn;
    if(!$result){
        die("Query Failed".mysqli_error($conn));
    }
}

function deleteCategories(){
    global $conn;
    if(isset($_GET['delete'])){
      $the_cat_id = $_GET['delete'];
      $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
      $delete_query = mysqli_query($conn,$query);
      header("location: categories.php");
    }
}

?>