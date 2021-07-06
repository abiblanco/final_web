<?php
    include ("conn.php");
    class UsuariosDAO {

        /*public static $FILE = "model/usuarios.json";*/

        public static function usuarioOcupado($mail){
            /*
            $content = file_get_contents(UsuariosDAO::$FILE);
    
             $arr_usuarios = json_decode($content, true);
            
             $return = false;
             foreach ($arr_usuarios as $cred){
    
                if ($cred["mail"] == $mail){
                    $return = true;
                    break;
                }
    
             }
    
             return $return;
        */
        
        $return=0;
        
         global $mysqli;
         if($_SERVER['REQUEST_METHOD'] == "GET"){
            
            $mail= $_GET["mail"];
            
            //CONSULTA/SELECT A DB
            $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE mail= ?");
            $stmt->bind_param("s", $mail);
            $stmt->execute();
            $result = $stmt->get_result();
            echo "Select ejecutado <br>";
        
            if($result->num_rows > 0){
                $return=false;
            }else{
                $return=true;
            }
        } 
        return $return;
        }

        public static function existeUsuario($mail, $pwd){
            global $mysqli;
            $return=0;
         if($_SERVER['REQUEST_METHOD'] == "GET"){
            
                    $mail= $_GET["mail"];
                    $pwd= $_GET["password"];
                    //CONSULTA/SELECT A DB
                    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE mail= ? and pwd=?");
                    $stmt->bind_param("s", $mail);
                    $stmt->bind_param("s", $pwd);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    echo "Select ejecutado <br>";
                
                    if($result->num_rows>0){
                        $return=true;
                    }else{
                        $return=false;
                    }
        }
        return $return;
        }

        public static function crearUsuario($nombre,$apellido,$mail, $password){
            /*
            $content = file_get_contents(UsuariosDAO::$FILE);

             $arr_usuarios = json_decode($content, true);

             $user = array(
                "nombre"=>$nombre,
                "apellido"=>$apellido,
                "mail"=>$mail,
                "password"=>$pwd
             );

             array_push($arr_usuarios,$user);

             $jsondata = json_encode($arr_usuarios, JSON_PRETTY_PRINT);

             file_put_contents("model/usuarios.json", $jsondata);

        }*/
        global $mysqli;
			$query ="INSERT INTO usuarios(nombre,apellido,mail,password) VALUES ('$nombre','$apellido','$mail','$password')";
			 $resultado = mysqli_query($mysqli,$query);
             if(!$resultado){
				die($mysqli->error);

		    	}
             /*$query = $mysqli->query("INSERT INTO usuarios(nombre,apellido,mail,password) VALUES ('$nombre','$apellido','$mail','$password')");
	     		if(!$query){
				die($mysqli->error);
			}*/
            
        }
    }
    class Usuario{

		public $nombre;
		public $apellido;
		public $mail;
        public $password;
		public function __construct($nombre,$apellido,$mail,$password){
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->mail = $mail;
            $this->password=$password;
        }


    }

    ?>