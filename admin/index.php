<?php include "includes/admin_header.php" ?>
    <div id="wrapper">
        <!-- Navigation -->
      <?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        
                    </div>
                           
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                      <div class='huge'>
                                      <?php 
                                          $query = "SELECT * FROM posts";
                                          $select_all_post = mysqli_query($conn,$query);
                                          $post_count = mysqli_num_rows($select_all_post);
                                          echo $post_count;
                                          ?>
                                      </div>
                                      <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                     <div class='huge'>
                                       <?php 
                                          $query = "SELECT * FROM comments";
                                          $select_all_comment = mysqli_query($conn,$query);
                                          $comment_count = mysqli_num_rows($select_all_comment);
                                          echo $comment_count;
                                          ?>
                                     </div>
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'>
                                       <?php 
                                          $query = "SELECT * FROM users";
                                          $select_all_user = mysqli_query($conn,$query);
                                          $user_count = mysqli_num_rows($select_all_user);
                                          echo $user_count;
                                          ?>
                                        </div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'>
                                        <?php 
                                          $query = "SELECT * FROM categories";
                                          $select_all_category = mysqli_query($conn,$query);
                                          $category_count = mysqli_num_rows($select_all_category);
                                          echo $category_count;
                                          ?>
                                        </div>
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                </div>
                
                <?php 
                  $query = "SELECT * FROM posts where post_status = 'published' ";
                  $select_all_published_post = mysqli_query($conn,$query);
                  $post_published_count = mysqli_num_rows($select_all_published_post);
                  
                  $query = "SELECT * FROM posts where post_status = 'draft' ";
                  $select_all_draft_post = mysqli_query($conn,$query);
                  $post_draft_count = mysqli_num_rows($select_all_draft_post);
                
                  $query = "SELECT * FROM comments where comment_status = 'unapproved' ";
                  $select_all_unapproved_comment = mysqli_query($conn,$query);
                  $comment_unapproved_count = mysqli_num_rows($select_all_unapproved_comment);
                
                  $query = "SELECT * FROM users where user_role = 'subscriber' ";
                  $select_all_subscriber_user = mysqli_query($conn,$query);
                  $user_subscriber_count = mysqli_num_rows($select_all_subscriber_user);
                  
                ?>
                <!-- /.row -->
                <div class="row">
                <script type="text/javascript">
                google.charts.load('current', {'packages':['bar']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Data', 'Count'],
                    <?php 
                      $element_text = ['All Post','Active Post','Draft Post','Comments','Pending Comments','Users','Subscribers','Categories'];
                      $element_count = [$post_count,$post_published_count,$post_draft_count,$comment_count,$comment_unapproved_count,$user_count,$user_subscriber_count,$category_count];
                    
                      for($i=0;$i<7;$i++){
                          echo "['{$element_text[$i]}',{$element_count[$i]}],";
                      }
                    ?>
                ]);

                var options = {
                  chart: {
                    title: '',
                    subtitle: '',
                  }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
                }
                </script>
               <div id="columnchart_material" style="width: auto; height: 500px;"></div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php" ?>