<?php
if ($_FILES["archivoUsuarios"]["error"] > 0){
    echo "Error: " . $_FILES["archivoUsuarios"]["error"] . "<br>";
  }
else{
    $archivo = fopen($_FILES["archivoUsuarios"]["tmp_name"], "r");
    $conexion = new mysqli("localhost", "root", "andres986532", "gemas");
    $conexion->autocommit(false);
    $errorEnOperacion = false;
    
    while( ($linea =   fgets($archivo)) !== false ){
        $arrayUsuarios =   explode("," , $linea);
        $email = $arrayUsuarios[0];
        $nombre = $arrayUsuarios[1];   
        $apellido = $arrayUsuarios[2];   
        $codigo = $arrayUsuarios[3]; 
        $Revisor = $arrayUsuarios[4];

            
        if($codigo==1 || $codigo==2 || $codigo==3){
            $sql = "INSERT INTO USUARIO_GEMAS (EMAIL, NOMBRE, APELLIDO_U, CODIGO, COD_REVISOR) VALUES ('$email', '$nombre', '$apellido', '$codigo', '$Revisor')";
                if (!$conexion->query($sql)){
                    $errorEnOperacion = true;
                }
          }else{
            $conexion->rollback();
        }
    }

if ($errorEnOperacion){
    $conexion->rollback();
} else {
    $conexion->commit();
}
$conexion->close();
fclose($archivo);
}
?>

<?php
$link=mysqli_connect('localhost','root','andres986532');
if(!$link){
    echo'No se pudo establecer conexion con el servidor:'.mysql_error();
}else{
    $base=mysqli_select_db($link, 'GEMAS');
    if(!$base){
        echo'No se encontro la base de datos:'.mysqli_error();
    }else{
        $sql1= "SELECT U.EMAIL, U.NOMBRE, U.APELLIDO_U, I.APELLIDO FROM USUARIO_GEMAS U, REVISORES I WHERE U.CODIGO=1 AND U.COD_REVISOR=I.ID";
        $ejecuta_sentencia1 = mysqli_query($link, $sql1);
    
        $sql2= "SELECT U.EMAIL, U.NOMBRE, U.APELLIDO_U, I.APELLIDO FROM USUARIO_GEMAS U, REVISORES I WHERE U.CODIGO=2 AND U.COD_REVISOR=I.ID";
        $ejecuta_sentencia2 = mysqli_query($link, $sql2);
       
        $sql3= "SELECT U.EMAIL, U.NOMBRE, U.APELLIDO_U, I.APELLIDO FROM USUARIO_GEMAS U, REVISORES I WHERE U.CODIGO=3 AND U.COD_REVISOR=I.ID";
        $ejecuta_sentencia3 = mysqli_query($link, $sql3);
    }
}

?>
<!DOCTYPE html>

<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <title>GEMA S.A.S</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <div id="main-comtainer">
            <a href="index.php"><< Volver</a>
            <h1>USUARIOS ACTIVOS</h1>
            <table>
                <tr>
                    <th>EMAIL</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th> 
                    <th>REVISOR</th>
                        <?php
                             while($row=mysqli_fetch_array($ejecuta_sentencia1)) {                              
                                echo"<tr>";
                                     echo"<td>".$row['EMAIL']."</td>";
                                     echo"<td>".$row['NOMBRE']."</td>";
                                     echo"<td>".$row['APELLIDO_U']."</td>";
                                     echo"<td>".$row['APELLIDO']."</td>";
                                echo"</tr>";
                        }
                        ?>
                </tr>
            </table>

            <h1>USUARIOS INACTIVOS</h1>
            <table>
                <tr>
                    <th>EMAIL</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>REVISOR</th> 
                        <?php
                            while($row=mysqli_fetch_array($ejecuta_sentencia2)) {                              
                                echo"<tr>";
                                    echo"<td>".$row['EMAIL']."</td>";
                                    echo"<td>".$row['NOMBRE']."</td>";
                                    echo"<td>".$row['APELLIDO_U']."</td>";
                                    echo"<td>".$row['APELLIDO']."</td>";
                                echo"</tr>";
                            }
                        ?>
                </tr>
        </table>

            <h1>USUARIOS EN ESPERA</h1>
            <table>
                <tr>
                    <th>EMAIL</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>REVISOR</th> 
                        <?php
                            while($row=mysqli_fetch_array($ejecuta_sentencia3)) {                              
                                echo"<tr>";
                                    echo"<td>".$row['EMAIL']."</td>";
                                    echo"<td>".$row['NOMBRE']."</td>";
                                    echo"<td>".$row['APELLIDO_U']."</td>";
                                    echo"<td>".$row['APELLIDO']."</td>";
                                echo"</tr>";
                            }
                        ?>
                </tr>
            </table>
        </div>  
    </body>
</html>