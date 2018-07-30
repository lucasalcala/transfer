<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
	$apellido = mysqli_real_escape_string($mysqli, $_POST['apellido']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$confirmacion = mysqli_real_escape_string($mysqli, $_POST['confirmacion']);
	$vuelo = mysqli_real_escape_string($mysqli, $_POST['vuelo']);
	$dia = mysqli_real_escape_string($mysqli, $_POST['dia']);
	$mes = mysqli_real_escape_string($mysqli, $_POST['mes']);
	$ano = mysqli_real_escape_string($mysqli, $_POST['ano']);
	$hora = mysqli_real_escape_string($mysqli, $_POST['hora']);
	$horario = mysqli_real_escape_string($mysqli, $_POST['horario']);
	$adicional = mysqli_real_escape_string($mysqli, $_POST['adicional']);
	$cargo = mysqli_real_escape_string($mysqli, $_POST['cargo']);
	$extra = mysqli_real_escape_string($mysqli, $_POST['extra']);
	$programacion = mysqli_real_escape_string($mysqli, $_POST['programacion']);
	$asociado = mysqli_real_escape_string($mysqli, $_POST['asociado']);
                    
    // checking empty fields
if(empty($nombre) ||empty($apellido) || empty($email) || empty($confirmacion) || empty($vuelo) || empty($dia) || empty($mes) || empty($ano) || empty($hora)  || empty($horario) || empty($cargo) ) {
		
		if(empty($nombre)) {
			echo "<font color='red'>Ingresar nombre de huesped. Please add name</font><br/>";
		}
		if(empty($apellido)) {
			echo "<font color='red'>Ingresar apellido. Please add last name</font><br/>";
		}
		if(empty($email)) {
			echo "<font color='red'>Ingresar email.</font><br/>";
		}
		
		if(empty($confirmacion)) {
			echo "<font color='red'>Ingresar numero de confirmacion de reserva. Please add a reservation confirmation number</font><br/>";
		}
		
		if(empty($vuelo)) {
			echo "<font color='red'>Ingresar informacion de vuelo. Please add flight number</font><br/>";
		}
		
		if(empty($dia)) {
			echo "<font color='red'>Ingresar dia de llegada de vuelo. Please add arrival day of flight</font><br/>";
		}
		
		if(empty($mes)) {
			echo "<font color='red'>Ingresar mes de llegada de vuelo. Please add month</font><br/>";
		}
		
		if(empty($ano)) {
			echo "<font color='red'>Ingresar año de llegada de vuelo. Please add year</font><br/>";
		}
		
		if(empty($hora)) {
			echo "<font color='red'>Ingresar hora de llegada. Please add arrival time</font><br/>";
		}
		
		if(empty($horario)) {
			echo "<font color='red'>Ingresar horario de llegada. Please add arrival time</font><br/>";
		}
		
		if(empty($cargo)) {
			echo "<font color='red'>Seleccionar cargo de servicio. Please select a payment option</font><br/>";
		}
            
    } else {	
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE transfer SET nombre='$nombre', apellido='$apellido', email='$email', confirmacion='$confirmacion', vuelo='$vuelo', dia='$dia', mes='$mes' , ano='$ano', hora='$hora', horario='$horario', adicional='$adicional', cargo='$cargo', extra='$extra', programacion='$programacion', asociado='$asociado' WHERE id=$id");
        
        //redirecting to the display page. In our case, it is index.php
        header("Location: control.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM transfer WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $nombre = $res['nombre'];
    $apellido = $res['apellido'];
    $email = $res['email'];
    $confirmacion = $res['confirmacion'];
    $vuelo = $res['vuelo'];
    $dia = $res['dia'];
    $mes = $res['mes'];
	$ano = $res['ano'];
	$hora = $res['hora'];
	$horario = $res['horario'];
	$adicional = $res['adicional'];
	$cargo = $res['cargo'];
	$extra = $res['extra'];
	$programacion = $res['programacion'];
	$asociado = $res['asociado'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Alimentos y Bebidas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="control.php">Inicio</a></li>
        <li><a href="search.php">Buscador</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Editar transfer</h3>
  <p>Utilice este formulario para editar transfer.</p> 
  
  
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
            </tr>
            <tr> 
                <td>Apellido</td>
                <td><input type="text" name="apellido" value="<?php echo $apellido;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr> 
                <td>Confirmacion</td>
                <td><input type="text" name="confirmacion" value="<?php echo $confirmacion;?>"></td>
            </tr>
            <tr>
                <td>Vuelo</td>
                <td><input type="text" name="vuelo" value="<?php echo $vuelo;?>"></td>
            </tr>
            <tr> 
                <td>Dia</td>
                <td><input type="text" name="dia" value="<?php echo $dia;?>"></td>
            </tr>
            <tr> 
                <td>Mes</td>
                <td><input type="text" name="mes" value="<?php echo $mes;?>"></td>
            </tr>
			<tr> 
                <td>Año</td>
                <td><input type="text" name="ano" value="<?php echo $ano;?>"></td>
            </tr>
			<tr> 
                <td>Hora</td>
                <td><input type="text" name="hora" value="<?php echo $hora;?>"></td>
            </tr>
			<tr> 
                <td>Horario</td>
                <td><input type="text" name="horario" value="<?php echo $horario;?>"></td>
            </tr>
			<tr> 
                <td>Adicional</td>
                <td><input type="text" name="adicional" value="<?php echo $adicional;?>"></td>
            </tr>
			<tr> 
                <td>Cargo</td>
                <td><input type="text" name="cargo" value="<?php echo $cargo;?>"></td>
            </tr>
			<tr> 
                <td>Extra</td>
                <td><input type="text" name="extra" value="<?php echo $extra;?>"></td>
            </tr>
			<tr> 
                <td>Programacion</td>
                <td><input type="text" name="programacion" value="<?php echo $programacion;?>"></td>
            </tr>
			<tr> 
                <td>Asociado</td>
                <td><input type="text" name="asociado" value="<?php echo $asociado;?>"></td>
            </tr>
            
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
            
        </table>
    </form>
  
</div>

</body>
</html>
