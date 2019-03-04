<?php 
	require_once "../php/conexion.php";
	$conexion=conexion();

	$sql = "SELECT p.*, c.*, d.*, l.*, pre.*, pro.*, em.* FROM persona p, informacion c, direccion d, lider l, presupuesto pre, proyecto pro, empresa em WHERE p.id_persona = c.id_persona and c.id_informacion = em.id_informacion AND d.id_direccion = em.id_direccion AND pro.id_proyecto = em.id_proyecto AND l.id_lider = pro.id_lider AND pre.id_presupuesto = pro.id_presupuesto";//GROUP BY p.id_persona
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
					$('#tabla').load('../componentes/tablaencuesta.php');
				}
			});
		});
	});
</script>