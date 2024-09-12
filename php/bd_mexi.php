<?php

$conect = mysqli_connect("localhost", "root", "", "test");

if (isset($_POST['enviar'])) {
    if (
        strlen($_POST['Nombre']) >= 1 &&
        strlen($_POST['Apellidos']) >= 1 &&
        strlen($_POST['Fecha_nac']) >= 1 &&
        strlen($_POST['Correo']) >= 1 &&
        strlen($_POST['password']) >= 1
    ) {

        $name = $_POST['Nombre'];
        $apelli = $_POST['Apellidos'];
        $fech = $_POST['Fecha_nac'];
        $correo = $_POST['Correo'];
        $pass = $_POST['password'];

        $consulta = "INSERT INTO usuarios (Nombres, Apellidos, Correo, date, passw)
         VALUES ('$name','$apelli','$fech','$correo','$pass')";

         $resultado = mysqli_query($conect,$consulta);

         if ($resultado) {
            echo "se enviaron los datos correctamente";
    } else {
        echo "error";
    }
}
}
?>