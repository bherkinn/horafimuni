<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Registrar</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- **************************************CSS************************************* -->
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/css/principal.css">
	<link rel="stylesheet" type="text/css" href="librerias/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertify/themes/alertify.core.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertify/themes/alertify.default.css">

	<!-- ***************************************JS************************************* -->

	<script type="text/javascript" src="librerias/alertify/lib/alertify.js"></script>
	<script type="text/javascript" src="librerias/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="librerias/bootstrap4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="librerias/select2/js/select2.min.js"></script>
	<script type="text/javascript" src="librerias/bootstrap4/js/bootstrap.bundle.min.js"></script>
<!-- 	<script type="text/javascript" src="librerias/jqueryPlugintipsy/js/jquery.tipsy.js"></script> -->

	

	

</head>

<body>
		<header>
			<div class="container-fluid cabecera">
				<img class="img-logo" src="librerias/img/uni.png">
				HORARIOS FIM
				<button style="display: none;" class="menu fas fa-bars">
					<!-- <i class="fas fa-bars"></i> -->
				</button>
			</div>
		</header>

		<nav>
				<ul class="nav">
					<li><a href="#">Inicio</a></li>
					<li><a href="#">Docentes</a></li>
					<li><a href="#">Aulas</a></li>
					<li><a href="#">Cursos</a></li>
					<li><a href="#">Otros</a></li>
				</ul>
		</nav>
		<br>
		<div id="tabla-acomodar" class="container">
			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 border rounded" >
				<br>

				
						<center>
							<select id="select-cursos" class="select-cursos">
							<?php 
								$o->Open(2);
								$tabla=$o->Mostrar("cursos","codCurso",2);
								foreach($tabla as $a)
								{
							?>	
								<option value="<?php echo $a->codCurso; ?>">
									
										<?php echo $a->codCurso." - ".$a->nomCurso; ?>
									
								</option>
							<?php  
								}
								$o->Close(2);	
							?>
							</select>
						</center>
				<br>

					<div class="container-fluid">
						<div id="tabla">
							<!-- AQUI SE CARGARA LA TABLA DE ASISTENCIA -->
						</div>
					</div>
				<br>
			</div>
			<br>	
		</div>

		<div id="tablas-extras" class="container">
			<div class="row">
				<div class="container-fluid col-md-6">
					<div class="container-fluid border rounded" style=" height: 300px;">
						
					</div>
				</div>
				
				<div class="container-fluid col-md-6">
					<div class="container-fluid border rounded">
						<br>
						<center>
						<table class="table-responsive border rounded table-hover" >
							<tr class="border">
								<th class="comun-docentes table-success">COD. UNI</th>
								<td style="">
									
								</td>
							</tr>
							<tr class="border">
								<th  class="comun-docentes table-success">A. PATERNO</th>
								<td></td>
							</tr>
							<tr class="border">
								<th class="comun-docentes table-success">A. MATERNO</th>
								<td></td>
							</tr>
							<tr class="border">
								<th class="comun-docentes table-success">NOMBRES</th>
								<td></td>
							</tr>
							<tr class="border">
								<th class="comun-docentes table-success">DEDICAION</th>
								<td></td>
							</tr>
							<tr class="border">
								<th class="comun-docentes table-success">DEPA.</th>
								<td></td>
							</tr>
								
						</table>
						</center>
						<br>
					</div>
				</div>
			</div>
			</div>
			<br>

		
			
		<script type="text/javascript" src="librerias/js/principal.js" >
			$(document).ready(function(){
				$("#select-cursos").select2({
					 width: '240px',
				});
			});

		</script>

		
		



</body>

</html>