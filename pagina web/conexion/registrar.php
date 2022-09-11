<?php

include('conexion.php');

$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
$contraseña2 = $_POST["contraseña2"];

if($usuario == "" || $contraseña=="" || $contraseña2=="" )
{
    echo'<script type="text/javascript">
    alert("Por favor llene todos los campos!");
    window.location.href="../pages/registro.html";
    </script>';
}

elseif($contraseña != $contraseña2)
{
    echo'<script type="text/javascript">
    alert("Las contraseñas no coinciden!...");
    window.location.href="../pages/registro.html";
    </script>';
}

else
{
    $buscar = "SELECT*FROM usuarios where nombre='$usuario'";
    $exist = mysqli_query($conexion,$buscar);
    $filas = mysqli_num_rows($exist);


    if($filas)
    {
        echo'<script type="text/javascript">
        alert("El usuario ya existe!");
        window.location.href="../pages/registro.html";
        </script>';
    }
    else
    {
        $insertar = "INSERT INTO usuarios (nombre,clave) VALUES ('$usuario','$contraseña')";

        $query = mysqli_query($conexion,$insertar);
    
        if($query){
            echo'<script type="text/javascript">
            window.location.href="../index.html";
            </script>';
        }else{
            echo'<script type="text/javascript">
            alert("Ha ocurrido un problema de conexion");
            window.location.href="../pages/registro.html";
            </script>';
        }
    }

  

}






?>