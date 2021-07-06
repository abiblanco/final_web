<?php
include ("conn.php");
    class productosDAO{
        
        public static function crearProducto($id,$nombre,$descripcion,$stock,$categoria,$precio,$imagen){
            
            global $mysqli;
			$query ="INSERT INTO productos(id,nombre,descripcion,stock,categoria,precio,imagen) VALUES ($id,'$nombre','$descripcion',$stock,'$categoria',$precio,'$imagen')";
			 $resultado = mysqli_query($mysqli,$query);
             if(!$resultado){
				die($mysqli->error);

             }
            
        }

        public static function listar(){

			global $mysqli;
			$result = $mysqli->query("SELECT * FROM productos");
			$rows = array();
			while($row = $result->fetch_assoc()) {
                $id = $row["id"];
				$nombre = $row["nombre"];
				$descripcion = $row["descripcion"];
				$stock = $row["stock"];
                $categoria= $row["categoria"];
				$precio = $row["precio"];
				$imagen= $row["imagen"];

				$rows[] = new Productos($id,$nombre,$descripcion,$stock,$categoria,$precio,$imagen);
                
			}

			return $rows;
			
		}
        public static function modificar($id,$nombre,$descripcion,$stock,$categoria,$precio,$imagen){
            global $mysqli;
            
                //CONSULTA/SELECT A DB
                $stmt = $mysqli->prepare("UPDATE productos
                SET id = $id, nombre = '$nombre', descripcion = '$descripcion', stock = $stock, categoria ='$categoria', precio= $precio, imagen='$imagen' 
                WHERE id=?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $resultado = mysqli_query($mysqli,$stmt);
             if(!$resultado){
				die($mysqli->error);
             }
        
        }  
        public static function eliminar($id){
           
           global $mysqli;
           $query ="DELETE FROM productos WHERE id=$id";
            $resultado = mysqli_query($mysqli,$query);
            if(!$resultado){
               die($mysqli->error);

            }
        } 
    }
    
    class Productos{
        public $id;
		public $nombre;
		public $descripcion;
		public $stock;
        public $categoria;
        public $precio;
        public $imagen;
		public function __construct($id,$nombre,$descripcion,$stock,$categoria,$precio,$imagen){
			$this->id = $id;
            $this->nombre = $nombre;
			$this->descripcion = $descripcion;
			$this->stock = $stock;
            $this->categoria=$categoria;
            $this->precio = $precio;
            $this->imagen=$imagen;
        }


    }

?>