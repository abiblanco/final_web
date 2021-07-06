<?php
  include("model/productos.php");
  class productos{

    function subir(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];
        $categoria = $_POST["categoria"];
        $precio = $_POST["precio"];
        $imagen = $_POST["imagen"];
     if(isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["stock"]) && isset($_POST["categoria"])&& isset($_POST["precio"]) && isset($_POST["imagen"])){

        if(!empty($_POST["id"]) &&!empty($_POST["nombre"]) && !empty($_POST["descripcion"])&&!empty($_POST["stock"]) && !empty($_POST["categoria"])&&!empty($_POST["precio"]) && !empty($_POST["imagen"])){

                productosDAO::crearProducto($id,$nombre,$descripcion,$stock,$categoria,$precio,$imagen);
               // productosDAO::listar($id, $nombre, $descripcion, $stock, $categoria, $precio, $imagen);
                
                $_SESSION["nombre"] = $_POST["nombre"];
                $_SESSION["msg"] = "El producto se ha subido correctamente";
                require_once("view/productos.php");


        } else {

            $_SESSION["msg"] = "Campos incompletos";
            require_once("view/subirproducto.php");

        }

     }else {

        $_SESSION["msg"] = "Campos incompletos 1";
        require_once("view/subirproducto.php");

     }

     }
}
function listar(){
    
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $productos=productosDAO::listar();
        include("view/productos.php");
        
}

}
function modificar(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $stock = $_POST["stock"];
    $categoria = $_POST["categoria"];
    $precio = $_POST["precio"];
    $imagen = $_POST["imagen"];
if(isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["stock"]) && isset($_POST["categoria"])&& isset($_POST["precio"]) && isset($_POST["imagen"])){

    if(!empty($_POST["id"]) &&!empty($_POST["nombre"]) && !empty($_POST["descripcion"])&&!empty($_POST["stock"]) && !empty($_POST["categoria"])&&!empty($_POST["precio"]) && !empty($_POST["imagen"])){

            productosDAO::crearProducto($id,$nombre,$descripcion,$stock,$categoria,$precio,$imagen);
           // productosDAO::listar($id, $nombre, $descripcion, $stock, $categoria, $precio, $imagen);
            
            $_SESSION["nombre"] = $_POST["nombre"];
            $_SESSION["msg"] = "El producto se ha subido correctamente";
            require_once("view/productos.php");


    } else {

        $_SESSION["msg"] = "Campos incompletos";
        require_once("view/subirproducto.php");

    }

}else {

    $_SESSION["msg"] = "Campos incompletos 1";
    require_once("view/subirproducto.php");

}

}
}
function eliminar(){
    $id = $_POST["id"];
    productosDAO::eliminar($id);
}
}

?>