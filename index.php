<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                     
                     $post_query_count = "SELECT * FROM posts";
                     $post_count = mysqli_query($conn,$post_query_count);
                     $count = mysqli_num_rows($post_count);
                     $count = ceil($count/5);
                     if(isset($_GET['page'])){
                         $page = $_GET['page'];
                         $start_page_post = $page*5-5;
                     }else{
                         $start_page_post = 0;
                         $page = 1;
                     }

                     $query = "select * from posts where post_status = 'published' ORDER BY post_id DESC LIMIT $start_page_post , 5 ";
                     $select_all = mysqli_query($conn,$query);
                     $rowcount=mysqli_num_rows($select_all);
                     if($rowcount==0){
                         echo "<h1 class='display-1 text-center'>No Post Sorry</h1>";
                     }else{
                     while($row = mysqli_fetch_assoc($select_all)){
                         $post_id = $row['post_id'];
                         $post_title = $row['post_title'];
                         $post_author = $row['post_author'];
                         $post_date = $row['post_date'];
                         $post_image = $row['post_image'];
                         $post_content = substr($row['post_content'],0,100) ;
                         $post_status = $row['post_status'];
                         
                         ?>
                         

                        <!-- First Blog Post -->
                        <h2>
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?> </p>
                        <hr>
                        
                        <a href="post.php?p_id=<?php echo $post_id; ?>">
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                        </a>
                        
                        <hr>
                        <p> <?php echo $post_content; ?> </p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                   <?php }} ?>
                   
                   <ul class="pagination">
                       <?php
                         for($i=1;$i<=$count;$i++){
                             if($i==$page){
                                 echo " <li class='active'><a  href='index.php?page={$i}'>{$i}</a></li>";
                             }else{
                                 echo " <li><a href='index.php?page={$i}'>{$i}</a></li>";
                             }
                             
                         }
                       ?>
                   </ul>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/footer.php" ?>
