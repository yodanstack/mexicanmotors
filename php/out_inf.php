<?php
$enlace = include("./php/bd_mexi.php");
if ($enlace) {
    $consulta = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conect, $consulta);
    if ($resultado) {
        while ($row = mysqli_fetch_array($resultado)) {
            $id = $row["IDusuario"];
            $name = $row['Nombres'];
            $apelli = $row['Apellidos'];
            $fech = $row['date'];
            $correo = $row['Correo'];
             $pass = $row['passw'];
?>
            <div>
                <h2><?php echo $name;  ?></h2>
                <div>
                    <p>
                        <b>ID:  </b> <?php echo $id; ?> <br>
                        <b>Nombre: </b> <?php echo $name; ?> <br>
                        <b>Apellidos: </b> <?php echo $apelli ?> <br>
                        <b>fecha de Nacimiento: </b> <?php echo $fech ?> <br>
                        <b>Correo electronico: </b> <?php echo $correo ?> <br>
                        <b>Contraseña: </b> <?php echo $pass ?> <br>
                    </p>
                </div>
            </div>
<?php
        }
    }
}
