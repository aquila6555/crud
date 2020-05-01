<?php 
/*RECIBIR DATOS*/
	session_start();
	include("database.php");
	$id=$_GET['id'];
	
	/*INTERACTUAR CON LA BASE DE DATOS*/
	if($id>0) {
		$sql_borrar = "DELETE FROM libros WHERE id='$id'";
		$conexion->query($sql_borrar);/*ACA SE REALIZA LA CONSULTA CON LA CONSULTE A TRAVEZ DEL METODO QUERY*/
                header("Location:../index.php?msg=".urlencode('eliminado correctamente!!!'));
		if($conexion->error) die($conexion->error);
	}

?>
<script>
	self.location = "../index.php" /*REDIRECCIONAR ARCHIVO*/
</script>