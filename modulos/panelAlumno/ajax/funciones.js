$(document).ready(function(){
  var id_pass= document.getElementById("id");
  id_pass.style.display= "none";

  $(document).on("click","#mod_pass",
    function(){

      var id=$("#id").val();
      var pass1=$("#Nuevo_pass").val();
      var pass2=$("#confirama-pass").val();

      if(pass1===pass2){
        $.ajax({
          url:"php/nueva_passE.php",
          method:"POST",
          data:{pass:pass1,
                id:id 
                },
          success: function(data){
              alert(data); 
             $(document.body).append('<meta http-equiv="Refresh" content="0; url=../../index.php">');
            }
        })
      }else{
        alert("Las contraseñas no coinciden");
      }
    }
    ) 
})