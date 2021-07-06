<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
include("model/productos.php");
?>
<body>

<div method="GET" action="index.php?controller=productos&action=listar">
<?php

			        foreach ($productos as $producto) {
                echo '<div class="card" style="width: 18rem;" >
                <img src="public/imagenes/productos/'.$producto->imagen.'" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">'.$producto->nombre.'</h5>
                  <p class="card-text">'.$producto->precio.'</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
               </div>';
              }
?>


</div>
</body>
<?php
require_once("footer.php");
?>
</html>