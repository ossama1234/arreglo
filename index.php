<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Programa de Arreglos Asociativos</title>
	<title>REGISTRO DE DATOS</title>
</head>
<body >


<div class="container ">
	  <div class="row mb-5 pt-5">
	  		  <div class="col">
					<h3  >REGISTRO DE DATOS</h3>
					<h4 class="p-3">Ingrese los Datos a Registrar</h4>
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					   <table >
						<tr>
							<td>Nombre:</td>	
							<td><input type="text" name="nombre" ></td>
						</tr>
				
						<tr>
							<td>Apellido:</td>	
							<td><input type="text" name="apellido" ></td>
						</tr>
			
						<tr>
							<td>Cedula:</td>	
							<td><input type="text" name="cedula" ></td>
						</tr>
		
						<tr>
							<td>Lugar de trabajo:</td>	
							<td><input type="text" name="lugar" ></td>
						</tr>
		
						<tr>
							<td>Departamento:</td>	
							<td><input type="text" name="departamento" ></td>
						</tr>

						<tr>
							<td>Sueldo:</td>	
							<td><input type="text"  name="sueldo" ></td>
						</tr>
		
						<tr>
							<td class="pt-3"> <input type="submit" name="guardar" class="btn btn-primary " value="Registrar"> </td>	
						</tr>

						<tr>
							<td> <input type="submit" name="mostrar" class="btn btn-primary " value="Visualizar "> </td>			
						</tr>
			
						 <tr>
							<td > <input  type="reset" name="btn" class="btn btn-primary " value="Limpiar"> </td>
						</tr>

						 <tr>
							<td > <input  type="submit" name="borrar" class="btn btn-primary " value=" Borrar "> </td>
						 </tr>

				    </table>
			    </form>
		   </div>

 	
 		    <div class="col">

			<?php
			session_start();

				if(!isset($_SESSION['personas'])){
					$_SESSION['personas']=array();
					$_SESSION['count']=0;
				}

				if(isset($_POST['guardar']) && ($_SESSION['count']<3)){
							$nombre= $_POST['nombre'];
							$apellido= $_POST['apellido'];
							$cedula= $_POST['cedula'];
							$lugar= $_POST['lugar'];
							$departamento= $_POST['departamento'];
							$sueldo= $_POST['sueldo'];

					if (isset($_POST['nombre'])&& !empty($_POST['nombre']) && isset($_POST['apellido'])&& !empty($_POST['apellido']) && isset($_POST['cedula'])&& !empty($_POST['cedula'])  && isset($_POST['lugar'])&& !empty($_POST['lugar']) && isset($_POST['departamento'])&& !empty($_POST['departamento'])&& isset($_POST['sueldo'])&& !empty($_POST['sueldo'])){
							if (is_numeric($cedula) && is_numeric($sueldo)) {

								$personas= array(
								"nombre"=>$nombre,
								"apellido"=>$apellido,
								"cedula"=>$cedula,
								"Lugar de trabajo"=>$lugar,
								"departamento"=>$departamento,
								"sueldo"=>$sueldo,
							);
					
								$_SESSION['personas'][$_SESSION['count']]=$personas;
								++$_SESSION['count'];

							}else{
								echo "Debe ingresar valores numericos en los campos de Cedula y Sueldo, intentelo de nuevo";
							}

					}else{

						echo "Los campos no pueden estar vacios, intentelo de nuevo";
					}


				} else if ($_SESSION['count']>=3){

					echo " Ya ha registrado de forma satisfactoria a 3 personas <br>";
					echo " Borre los registros si desea almacenar otros valores <br><br>";
				}
				

				if(isset($_POST['mostrar'])){

					foreach ($_SESSION['personas'] as $personas) {
						echo "<b>Datos del empleado</b>";
						foreach ($personas as $key=> $valor) {
							echo "<br> ".$key." = " . $valor;
						}
						echo "<br><br>";
					}
				}

				if(isset($_POST['borrar'])){
					   unset($_SESSION['personas']);
					   unset($_SESSION['count']);
						echo"Registros borrados";
				}				

			?>
		</div>
	</div>
</div>




 </body>
</html>

