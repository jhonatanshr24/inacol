<?php

$cone = "planta";

///// INCLUIR LA CONEXIÓN A LA BD ////
include('conexion.php');

///// CONSULTA A LA BASE DE DATOS /////

$cone = "prueba";

$terceros="SELECT * FROM vistaterceroscguno order by fecha_creacion desc";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $con, $terceros, $params, $options );

$row_count = sqlsrv_num_rows( $stmt );

?>

<html lang="es">
	<head>
		<title>TERCEROS</title>
		<meta charset="utf-8">
		 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		
	</head>
	<body>

		
	<div class="container">
	    <div class="row">

	    	<div class="col-md-12">
            	<h4>Generacion de Terceros</h4>
            </div>

			<!--<form method="post" action="reportes.php">-->

				<form method="post" action="reportcaja1.php">
				
				<div class="form-group">
					<label for="fecha1">Fecha Inicio</label>
					<input type="date" class="form-control" name="fecha1" autofocus required>
					
					<label for="fecha2">Fecha Fin</label>
					<input type="date" class="form-control" name="fecha2" required>
				</div>

				<div class="form-group">

					<label for="punto">Punto</label>
					<select class="form-control" name="db">
					  
					  <option value="planta">Planta</option>
					  <option value="santa_elena">Santa Elena</option>
					  <option value="alameda">Alameda</option>
					  <option value="independencia">Independencia</option>
					  <option value="santa_monica">Santa Monica</option>
					  <option value="cdjardin">Ciudad Jardin</option>
					  <option value="caney">Caney</option>
					  

					</select>
				</div>

				<button type="submit" class="btn btn-primary" name="generar_reporte">Generar Terceros</button>

			</form>
		<div class="table-responsive">
			<table class="table" >

				<thead class="thead-dark">
					<tr>
						
						<th>cod_Sucursal</th>
						<th>Nit</th>
						<th>Tercero</th>
						<th>Direccion</th>
						<th>Email</th>
						<th>Fecha Creacion</th>

					</tr>
				</thead>

				<tbody>

				<?php
					

				if($row_count == 0)
				{
					echo "Sin Registro";
				}
				else
				{	

					while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
					{
						echo'<tr>
							 
							 <td>'.$row['CIIU'].'</td>
							 <td>'.$row['claseCliente'].'</td>
							 <td>'.$row['zonac'].'</td>
							 <td>'.$row['codVendedor'].'</td>
							 <td>'.$row['condicionPago'].'</td>
							 <td>'.date_format($row['fecha_creacion'], "Y-m-d").'</td>

							 </tr>';
					}
				}
			
				?>
				</tbody>
			</table>
			
		</div>

	 </div>
</div>



  </body>
</html>


