<?php
require_once "../php/conexion.php";
$conexion=conexion();
$sql="SELECT * FROM persona p, llamada c WHERE p.id_persona = c.id_persona GROUP BY p.id_persona";
$result=mysqli_query($conexion,$sql);
?>
<br><br>
<div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label>Buscador</label>
		<select id="buscadorvivo" class="form-control input-sm">
			<option value="0">Seleciona uno</option>
			<?php
			while($ver=mysqli_fetch_row($result)): 
				?>
				<option value="<?php echo $ver[0] ?>">
					<?php echo $ver[1]//." ".$ver[2] POR SI SE AGREGA APELLIDOS ?>
				</option>
			<?php endwhile; ?>
		</select>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#buscadorvivo').select2();
		$('#buscadorvivo').change(function(){
			$.ajax({
				type:"post",
				data:'valor=' + $('#buscadorvivo').val(),
				url:'../php/crearsession.php',
				success:function(r){
					$('#tabla').load('../componentes/tablacontacto.php');
				}
			});
		});
	});
</script>