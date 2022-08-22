<?php 

	class conectar{//los metodos prvados son seguro porque solo se pueden acceder por esa clase
		private $servidor="localhost";
		private $usuario="ventas";
		private $password="12345";
		private $bd="ventas";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}


 ?>