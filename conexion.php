<?php

$conexion = mysqli_connect('localhost' , 'root', '', 'formulario') or die(mysqli_error($mysqli));

diferencia($conexion);

function diferencia($conexion){
    if(isset($_POST['enviar'])){
        insertar($conexion);
    }
    if(isset($_POST['eliminar'])){
        eliminar($conexion);
    }
}

insertar($conexion);

function insertar($conexion){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $genero = $_POST['gender'];
    $edad = $_POST['edad'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $ocupacion = $_POST['ocupacion'];
    $cedula = $_POST['cedula'];

    $consulta = "INSERT INTO persona(nombre, apellido, genero, edad, fechaNacimiento, ocupacion, cedula) VALUES ('$nombre', '$apellido', '$genero', '$edad', '$fechaNacimiento', '$ocupacion', '$cedula')";
    //$insertando = mysqli_query($conexion, $consulta);
    //if(!$insertando){
    //    echo "error en insertar";
    //};
    mysqli_query($conexion, $consulta);    
    mysqli_close($conexion);
   //header("Location: index.php");
}

function eliminar($conexion){
    $nombre = $_POST['nombre'];

    $consulta = "DELETE FROM persona WHERE nombre='$nombre'";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    //header("Location: index.php");
}

function cargarTabla($conexion){
    $consulta = "SELECT * FROM persona";
    $resultado = mysqli_query($conexion, $consulta);

    while($fila = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>".$fila['nombre'];
        echo "<td>".$fila['apellido'];;
        echo "<td>".$fila['genero'];;
        echo "<td>".$fila['edad'];;
        echo "<td>".$fila['fechaNacimiento'];;
        echo "<td>".$fila['ocupacion'];;
        echo "<td>".$fila['cedula'];;
        echo "<tr>";
    }
    mysqli_close($conexion);
}


?>