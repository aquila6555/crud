<?php
define("DB_HOST","localhost");/*SERVIDOR REMOTE*/
define("DB_USER","root");/*USUARIO RAIZ*/
define("DB_PASS","");/*CONTRASENA*/
define("DB_NAME","mybook");/*NOMBRE DE LA BASE DE DATOS*/
    
    $con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        @die("<h2 style='text-align:center'>Imposible conectarse a la base de datos! </h2>".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        @die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
    
    
    
?>