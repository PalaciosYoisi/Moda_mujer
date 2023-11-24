<?php 
#1 paso, establecer conexion con la base de datos
$conexion = mysqli_connect("localhost","root","","proyecto_electiva");
#2 paso, verificar la conexion
if(!$conexion){
    echo "error de conexion".mysqli_connect_error();
    exit();

}
#3 establecer comando sql

$sql = "select * from usuarios where correo='".$_POST['correo']."' and contrasena='".$_POST['contrasena']."'";


#4 ejecutar el comando
$resultado = mysqli_query($conexion, $sql);
$registro = mysqli_fetch_array($resultado);

if($registro){
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location: ../home.html");
}else {
    echo 'El correo o clave es incorrecto ';
}


?>