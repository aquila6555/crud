<?php 
	include "controllers/config.php";
	include "controllers/database.php";
 ?>
     <?php
      	$db = new Database();
            $id=$_GET['id'];
            $actualizar = "SELECT * FROM libros WHERE id='$id'";
            $cambio=$conexion->query($actualizar);
            foreach ($cambio as $row) {
             $titulo=$row['titulo'];
             $genero=$row['genero'];
             $autor=$row['autor'];
             $publicacion=$row['publicacion'];
             $precio=$row['precio'];
          }

           if (isset($_POST['submit'])) {
            $titulo =mysqli_real_escape_string($conexion, $_POST['titulo']);
            $genero =mysqli_real_escape_string($conexion, $_POST['genero']);
            $autor =mysqli_real_escape_string($conexion, $_POST['autor']);
            $publicacion =mysqli_real_escape_string($conexion, $_POST['publicacion']);
            $precio =mysqli_real_escape_string($conexion, $_POST['precio']);

          
            $query = "update libros SET titulo='$titulo', genero = '$genero', autor='$autor', publicacion='$publicacion', precio='$precio' where id='$id'";
 			$create=$db->insert($query);
           echo '<script> alert("LOS DATOS HAN SIDO MODIFICADOS CORRECTAMENTE");
           self.location ="index.php"</script>';

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

</div>

        <h1 class="display-4 text-center">
            My<span class="text-primary">Book</span>List
        </h1>

        <form action="update.php?id=<?php echo $id;?>" method="POST" id="book-form">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input value="<?php echo $titulo; ?>" type="text" class="form-control" id="titulo" name="titulo">
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
                <input value="<?php echo $autor; ?>" type="text" class="form-control" id="autor" name="autor">
            </div>

            <div class="form-group">
                <label for="publicacion">Fecha de publicacion</label>
                <input value="<?php echo $publicacion; ?>" class="form-control" type="date" id="publicacion" name="publicacion">
            </div>
            
            <div class="form-group">
                <label for="precio">Precio</label>
                    <input value="<?php echo $precio; ?>" class="form-control" type="number" id="precio" name="precio">
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