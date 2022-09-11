<?php

$usuario=$_POST["user"];
$contraseña =$_POST["password"];

session_start();
$_SESSION["usuario"] = $usuario;

include('conexion.php');

$consulta = "SELECT*FROM usuarios where nombre='$usuario' and clave ='$contraseña'";

$resultado = mysqli_query($conexion,$consulta);

$filas = mysqli_num_rows($resultado);

if($filas){
    // echo "Los datos son correctos!";
    echo'<script type="text/javascript">
    window.location.href="../pages/home.html";
    </script>';

}else{

    echo'<script type="text/javascript">
    alert("Datos incorrectos!");
    window.location.href="../index.html";
    </script>';

}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>