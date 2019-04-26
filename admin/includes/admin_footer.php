
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    
   <!--scripts.js-->
    <script src="js/scripts.js"></script>
    <script>
         //Select All checkbox of posts
      $('#selectAllBoxes').click(function( event ){
         if(this.checked){
             $('.checkBox').each(function(){
                 this.checked = true;
             });
         }
         else{
             $('.checkBox').each(function(){
                 this.checked = false;
             });
         }
     });
        
    var div_box = "<div id='load-screen'> <div id='loading'></div> </div>";
    $('body').prepend(div_box);
    $('#load-screen').delay(500).fadeOut(500,function(){
        $(this).remove();
    });
        
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>