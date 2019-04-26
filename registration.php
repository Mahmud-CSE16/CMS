<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 
 <?php
    $message = "";
     if(isset($_POST['register'])){
         
         $username = $_POST['username'];
         $email    = $_POST['email'];
         $password = $_POST['password'];
         
         $username = mysqli_real_escape_string($conn,$username);
         $email = mysqli_real_escape_string($conn,$email);
         $password = mysqli_real_escape_string($conn,$password);
         
         $query = "SELECT randSalt FROM users ";
         $select_randSalt_query = mysqli_query($conn,$query);
         
         if(!$select_randSalt_query){
             die("Query Failed "+mysqli_error($conn));
         }
         
         $row = mysqli_fetch_array($select_randSalt_query);
         $randSalt = $row['randSalt'];
         $password = crypt($password,$randSalt);
         
         $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
         $query .= "VALUES('{$username}','{$email}','{$password}','subscriber' )";
         $register_user_query = mysqli_query($conn,$query);
         if(!$register_user_query){
             die("Query Failed ". mysqli_error($conn));
         }
         
         $message = "<h6 class='text-center text-info'>Your Resgistration has been submited</h6>";
     }
 ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       <?php echo $message; ?>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
