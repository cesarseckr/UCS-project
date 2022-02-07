<div class="modal fade" id="materias_grupos" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-user-edit"></i>&nbsp; Asignación de materias a grupo y docentes
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
            <div class="form-group col-md-12">
             <form id="form-materias_grupos" action="php/add_materias_gruposE.php" method="post" enctype="multipart/form-data">
             <div class="row">
            <div class="form-group col-sm-4" style="display:none;">
            <input type="text" class="form-control" name="id_grupo_m" id="id_grupo_m">
            <input type="text" class="form-control" name="id_ciclo_m" id="id_ciclo_m">
            <input type="text" class="form-control" name="id_curso_m" id="id_curso_m">
            </div>
               <div class="form-group col-sm-6">
                <label>Grupo:</label>
                <input type="text" class="form-control" name="grupo_mat" id="grupo_mat" readonly>
              </div>
              <div class="form-group col-sm-6">
                <label>Módulo:</label>
                <input type="text" class="form-control" name="curso_mat" id="curso_mat" readonly>
              </div>
              <div class="form-group col-sm-12">
                <label>Carrera:</label>
                <input type="text" class="form-control" name="carrera_mat" id="carrera_mat" readonly>
              </div>
              <div class="form-group col-sm-12">
                <h5>Asignación de materias</h5>
                <hr>
              </div>
              <div id="materias_grupo"></div>

              <div class="form-group col-sm-8"><br>
              <label for="input" style="color:red;"><i>Los campos marcados con (*) son obligatorios.</i></label>
              </div>
            </div>
            </div>   
            </div>
             </div>

            <div class="modal-footer">
              <button class="btn btn-primary btn-sm">
              <i class="fa fa-play-circle"></i>Asignar</button>
              <button type="reset" class="btn btn-secondary btn-sm">
              <i class="fa fa-eraser"></i></button>
              <button class="btn btn-danger btn-sm" data-dismiss="modal">
              <i class="fa fa-times"></i>Cerrar</button>
                     </form>
      </div>
    </div>
  </div>
</div>

<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-materias_grupos',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-materias_grupos","Listado de grupos");
      $successMsg.show();
      return false; 
    }
  });
</script>