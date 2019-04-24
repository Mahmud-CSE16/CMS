
                    
                    
                    <form action="" method="post">
                        <div class="form-group">
                           <label for="cat_title">Edit Category</label>
                           <?php

                              if(isset($_GET['edit'])){
                                  $cat_id = $_GET['edit'];

                                  $query = "select * from categories where cat_id = $cat_id ";
                                  $select_all_id = mysqli_query($conn,$query);

                                  while($row = mysqli_fetch_assoc($select_all_id)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    
                                    ?>
                                    <input value="<?php echo $cat_title; ?>" class="form-control" type="text" name="cat_title" >
                         <?php  }
                               }
                            ?>
                            
                            <?php
                            if(isset($_POST['update'])){
                                $the_cat_title = $_POST['cat_title'];
                                $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
                                $update_query = mysqli_query($conn,$query);
                                if(!$update_query){
                                    die("Query failed" . mysqli_error($conn));
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update" value="Update Category" >
                        </div>
                    </form>