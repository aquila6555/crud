<?php
$conexion = new mysqli("localhost", "root", "", "mybook");
class DataBase{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $dbname = DB_NAME;
	
	public $link;
	public $error; 
	
	public function __construct(){
		$this->connectDB();
	}
	private function connectDB(){ /*INSTANCIANDO LA CONEXION CON LA BD*/
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if(!$this->link) {
			$this->error = "Conexion fallida".$this->link->connect_error;
			return false;
		}
	}
	/*SELECCIONAR O LEER LA BASE DE DATOS*/
	public function select($query){
		$result = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		}
		else{
			return false;
		}
	}
	/*INSERTAR DATOS*/
	public function insert($query){
		$insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($insert_row) {
			header("Location:index.php?msg=".urlencode('Datos almacenados exitasamente!!!'));
			exit();
		}else{
			die("Error:(".$this->link->errno.")".$this->link_error);
		}
	}
  
    
	/*ACTUALIZAR DATOS*/
	public function update($query){
		$update_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if ($update_row) {
			header("Location:index.php?msg=".urlencode('Los datos han sido actualizados exitosamente!!!.'));
			exit();
		}else{
			die("Error:(".$this->link->errno.")".$this->link_error);
		}
	}
    	
	/*ELIMINAR DATOS*/
	public function delete($query){
		$delete_row = $this->link->query($query) or die ($this->link->error.__LINE__) ;
		if ($delete_row) {
			header("Location:index.php?msg=".urlencode('Datos Elimiandos exitosamente!!!.'));
			exit();
		}else{
			die("Error:(".$this->link->errno.")".$this->link_error);
		}
	}
}
?>