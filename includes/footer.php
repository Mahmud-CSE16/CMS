 <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script>
         //Select All checkbox of posts
      
    var div_box = "<div id='load-screen'> <div id='loading'></div> </div>";
    $('body').prepend(div_box);
    $('#load-screen').delay(500).fadeOut(500,function(){
        $(this).remove();
    });
        
    </script>

</body>

</html>