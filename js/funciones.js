function agregaform(datos){
	d = datos.split('||');
	$('#idllamada').val(d[4]);
	$('#idpersona').val(d[0]);
	$('#nombre').val(d[1]);
	$('#edad').val(d[2]);
	$('#sexo').val(d[3]);
	$('#telefono').val(d[6]);
	$('#correo').val(d[7]);
	$('#fecha').val(d[5]);
	$('#comentario').val(d[8]);
}

function preguntar(id){
	alertify.confirm('Eliminar encuesta', '¿Desea eliminar ésta encuesta?', 
	function(){eliminarencuesta(id)},
	function(){ alertify.error('Se cancelo la elimincacion')});
}

function eliminarencuesta(id){
	cadena="id=" + id;

	$.ajax({
		type:"POST",
		data: cadena,
		url: "../php/eliminarencuesta.php",
		success: function(r){
			if(r==1){
				$('#tabla').load('../componentes/tablaencuesta.php');
				alertify.success('Se elimino encuesta');	
			}
			else{
				alertify.error('Fallo el servidor al eliminar la encuesta');
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar contacto', '¿Desea eliminar este contacto?', 
		function(){ eliminarDatos(id) }, 
		function(){ alertify.error('Se cancelo la eliminacion')});
}

function eliminarDatos(id){
	cadena = "id=" + id;
	$.ajax({
		type: "POST",
		data: cadena,
		url: "../php/eliminarcontacto.php",
		success:function(r){
			if (r==1) {
				$('#tabla').load('../componentes/tablacontacto.php');
				alertify.success("Se elimino el contacto con exito");
			}else{
				alertify.error("Fallo el servidor al eliminar el contacto");
			}
		}
	});
}


function Numeros(string){//Solo numeros
    var out = '';
    var filtro = '1234567890';//Caracteres validos
	
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
             //Se añaden a la salida los caracteres validos
	     out += string.charAt(i);
	
    //Retornar valor filtrado
    return out;
} 

function NumText(string){//solo letras y espacios
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ´ ';//Caracteres validos
	
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}