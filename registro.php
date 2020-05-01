<?php 
	include "controllers/config.php";
	include "controllers/database.php";
 ?>
 <?php 
 	$db = new Database();
 	if(isset($_POST['submit'])){

 		$titulo  = mysqli_real_escape_string($db->link, $_POST['titulo']);
         $genero  = mysqli_real_escape_string($db->link, $_POST['genero']);
 		$autor  = mysqli_real_escape_string($db->link, $_POST['autor']);
 		$publicacion  = mysqli_real_escape_string($db->link, $_POST['publicacion']);
 		$precio  = mysqli_real_escape_string($db->link, $_POST['precio']);

 		if($titulo==''||$autor==''||$precio==''){
 			$error="Los campos no deben estar vacios";
 		}else{
            $query = "INSERT INTO libros(titulo,genero,autor,publicacion,precio) 
            Values('$titulo','$genero','$autor','$publicacion','$precio')";
 			$create=$db->insert($query);
 		}
 	}
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:CRUD - registro:.</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/boostrap.min.css">
    <link rel="stylesheet" href="css/styleregister.css">
</head>

<body>
    <div class="containercard">
    <div class="col-sm-12">
  <?php
  if (isset($error)) {
    echo "<div class='alert alert-danger'><span>" . $error . "</span></div>";
  }
  ?>


</div>

        <h1 class="display-4 text-center">
            My<span class="text-primary">Book</span>List
        </h1>

        <form action="registro.php" method="POST" id="book-form">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="form-group">
                <label for="categoria">Genero</label>
                <select class="form-control" id="genero" name="genero">
                    <option value="aventura">aventura</option>
                    <option value="cuento">cuento</option>
                    <option value="paranormal">paranormal</option>
                    <option value="historia">historia</option>
                    <option value="fantasia">fantasia</option>
                </select>
            </div>

            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor">
            </div>

            <div class="form-group">
                <label for="publicacion">Fecha de publicacion</label>
                <input class="form-control" type="date" id="publicacion" name="publicacion">
            </div>
            
            <div class="form-group">
                <label for="precio">Precio</label>
                    <input class="form-control" type="number" id="precio" name="precio">
            </div>

            <button value="submit" type="submit" name="submit" class="btn btn-primary btn-block">Guardar</button>
          
         
        </form>
        <a href="index.php">
            <button class="btn btn-danger btn-block">Volver</button>
            </a>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="js/boostrap.min.js"></script>
</body>

</html>