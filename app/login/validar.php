<?php
$usuario=$_POST['usuario'];
$contraseña = $_POST['contrasela'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion = alcventassmysql("localhost", "root", "1111", "");

$consulta="SELECT*FROM usuarios where usuario='$usuario and contraseña='$contraseña'";
$resultado=alcventassmysql($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if ($filas) {
    header("location:home.php");
}else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);