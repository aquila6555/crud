<?php 
	include "controllers/config.php";
  include "controllers/database.php";

	$sql_consulta="SELECT * FROM libros";
  $resultado=$conexion->query($sql_consulta);
  
  $db = new Database();
	$query = "select * from libros";
	$read = $db->select($query);
  
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:CRUD - home:.</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/boostrap.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
	if(isset($_GET['msg'])){
		echo "<div class='alert alert-success'><span>".$_GET['msg']."</span></div>";
	}
  ?>
 		 <h1 class="display-4 text-center">
            My<span class="text-primary">Book</span>List
        </h1>
        <h1 class="display-5 text-center">
            lista de libros
        </h1>
<div class="container">
        <table>
       
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titulo</th>
      <th scope="col">Genero</th>
      <th scope="col">Autor</th>
      <th scope="col">Publicacion</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>

  <?php foreach ($resultado as $row) { ?>
                
                <?php if($read){?>
    <?php 
    $i=1;
    while($row = $read->fetch_assoc()){
    ?>

  <tbody>
    <tr>
      <td data-label="ID">
        <?php echo $i++ ?>
      </td>
      <td data-label="titulo"><?php echo $row['titulo']; ?></td>
      <td data-label="genero"><?php echo $row['genero']; ?></td>
      <td data-label="autor"><?php echo $row['autor']; ?></td>
      <td data-label="publicacion"><?php echo $row['publicacion']; ?></td>
      <td data-label="precio"><?php echo $row['precio']; ?></td>

      <td><a href="update.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-danger btn-block">editar</a></td>
      <td><a href="controllers/delete.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-danger btn-sm">borrar</a></td>         	 	 	
 
    
      </tr>
    

    <?php  } ?>
			<?php  }else { ?>
			<p>Los Datos son Validos!!</p>
			<?php } ?>
               <?php } mysqli_close($conexion); ?>   
  </tbody>
  
</table>

<a href="registro.php">
<button class="btn btn-primary btn-block">Agregar libro</button>
</a>

</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="js/boostrap.min.js"></script>
</body>
</html>