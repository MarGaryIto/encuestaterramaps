<?php
require_once "../php/conexion.php";
$conexion=conexion();
$idpersona = $_POST['id'];
$d= "DELETE p.*, c.*, d.*, l.*, pre.*, pro.*, em.* FROM persona p, informacion c, direccion d, lider l, presupuesto pre, proyecto pro, empresa em WHERE p.id_persona = c.id_persona and c.id_informacion = em.id_informacion AND d.id_direccion = em.id_direccion AND pro.id_proyecto = em.id_proyecto AND l.id_lider = pro.id_lider AND pre.id_presupuesto = pro.id_presupuesto AND p.id_persona = '$idpersona'";
$ed = mysqli_query($conexion,$d);
    
echo $ed;

?>