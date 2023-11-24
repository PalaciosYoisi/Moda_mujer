<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];  
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];


    // Validamos los datos del formulario
  if (empty($nombre) || empty($correo) || empty($contrasena)) {
    $mensaje = "Todos los campos son requeridos.";
    $tipo_mensaje = "danger";
  }else {
    // Si los datos son válidos, enviamos un correo electrónico al usuarios
    // Aquí puedes agregar tu código para enviar el correo electrónico
    $mensaje = "¡Gracias por registrarte! Se ha enviado un correo electrónico de verificación";
    $tipo_mensaje = "success";
  }
}

$conexion = mysqli_connect("localhost","root","","proyecto_electiva");

if(!$conexion){
    echo "Error de conexion " .mysqli_connect_error();
    exit();
}

    //crear comando sql
$sql = "insert into usuarios(nombre, correo, contrasena) 
values( '".$_POST['nombre']."', '".$_POST['correo']."','".$_POST['contrasena']."')";

//ejecutar comando

$resultado = mysqli_query($conexion, $sql);

//verificar comando
if($resultado){
 // echo "Los datos se guardaron de forma correcta";
 header("Location: ../login.html");

}else {
  echo "Error: "; 
}
?>