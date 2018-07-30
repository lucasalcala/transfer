<?php
//Include the database connection file
include_once("config.php");

// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Marriott Santa Cruz Transfers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default" style="background-color:	#ADD8E6;">
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
        <li><a href="search.php">Buscador</a></li>
				<li><a href="index.php">Pagina Transfer</a></li>
				<li><a href="logout.php">Cerrar Sesion</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Transfers</h3>
  <p>Marriott Santa Cruz de la Sierra</p> 
  
  <form name="form1" method="post">
        <table border="0">
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="nombre" value=""></td>
            </tr>
            <tr> 
                <td>Apellido</td>
                <td><input type="text" name="apellido" value=""></td>
            </tr>
            <tr> 
                <td>Confirmacion</td>
                <td><input type="text" name="confirmacion" value=""></td>
            </tr>
            <tr> 
                <td>Dia</td>
                <td><input type="text" name="dia" value=""></td>
            </tr>
            <tr> 
                <td>Mes</td>
                <td><input type="text" name="mes" value=""></td>
            </tr>
			<tr> 
                <td>Año</td>
                <td><input type="text" name="ano" value=""></td>
            </tr>  
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="submit" value="Buscar"></td>
            </tr>
        </table>
    </form>
  
  <table class="table table-striped">

	<tr>
	  <td>Nombre</td>
		<td>Reserva</td>
		<td>Email</td>
		<td>Vuelo</td>
		<td>Hora</td>
		<td>Fecha</td>
		<td>Adicional</td>
		<td>Cargo</td>
		<td>Extra</td>
		<td>Estado</td>
		<td>Asociado</td>
		<td></td>
	</tr>
    
    <?php
    include_once("config.php");

    if(isset($_POST['submit'])) {	
        $nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($mysqli, $_POST['apellido']);
        $confirmacion = mysqli_real_escape_string($mysqli, $_POST['confirmacion']);
        $dia = mysqli_real_escape_string($mysqli, $_POST['dia']);
        $mes = mysqli_real_escape_string($mysqli, $_POST['mes']);
        $ano = mysqli_real_escape_string($mysqli, $_POST['ano']);
        
        // checking empty fields
        if(empty($nombre) ||empty($apellido) ||  empty($confirmacion) || empty($dia) || empty($mes) || empty($ano)) {
            
            if(empty($nombre)) {
                echo "<font color='red'>Ingresar nombre de huesped. Please add name</font><br/>";
            }
            if(empty($apellido)) {
                echo "<font color='red'>Ingresar apellido. Please add last name</font><br/>";
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
            
            //link to the previous page
            echo "<br/><font color='white'><a href='javascript:self.history.back();'>Recargar datos incorrectos- Reload submitted information</a></font>"; 
    //fetch data in descending order
    $result = mysqli_query($mysqli, "SELECT * FROM transfer ORDER BY id DESC LIMIT 18"); // using mysqli_query instead
    
    //while loop used to retrieve data from the SQL database
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['nombre']." ".$res['apellido']."</td>";
		echo "<td>".$res['confirmacion']."</td>";
		echo "<td>".$res['email']."</td>";
		echo "<td>".$res['vuelo']."</td>";
		echo "<td>".$res['hora']." ".$res['horario']."</td>";
		echo "<td>".$res['dia']."/".$res['mes']."/".$res['ano']."</td>";
		echo "<td>".$res['adicional']."</td>";	
		echo "<td>".$res['cargo']."</td>";
		echo "<td>".$res['extra']."</td>";
		echo "<td>".$res['programacion']."</td>";
		echo "<td>".$res['asociado']."</td>";
				
		echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> <a style='color: #ff0000;' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Estas por eliminar los datos, deseas continuar?')\">Eliminar</a></td>";													
	}
	?>
	</table>
</div>

</body>
</html>
