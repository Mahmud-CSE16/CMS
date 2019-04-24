
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
        
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>