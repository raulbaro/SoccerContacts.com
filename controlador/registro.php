<?php
require_once('../modelo/DB.php');
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);

if (isset($_POST['enviar'])) {
    if (empty($email) || empty($password) || empty($name)) {
      
        header("Location: ../vista/registro.php?error=Revisa%20los%20datos%20introducidos");
    }else {
        // Comprobamos las credenciales con la base de datos
        if (DB::comprobarUsuario($email,$password)) {
         
            header("Location: ../vista/registro.php?error=El%20Usuario%20ya%20existe");
        }
        else {
            echo "nuevo Usuario";
           DB::nuevoUsuario($name,$email,$password);
            header("Location: ../vista/login.php");
        }
    }
}


?>