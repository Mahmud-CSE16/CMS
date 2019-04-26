 $(document).ready(function(){
     
     //Editor CKEditor
     ClassicEditor
        .create( document.querySelector( '#body' ) ).catch( error => {
            console.error( error );
        } );
     
   
 });

