<?php
 	require_once("../models/conexion.php");
 	$o=new Conexion();
 ?>
 <center>
 <div class="container-fluid col-lg-12">
 <table class="tabla-base table-responsive border rounded table-hover">
		<thead class="table-success">
			<th class="titulo-dia">DIA</th>
			<th class="titulo-hora">HORA</th>
			<th class="titulo-registro">CURSO</th>
			<th class="titulo-registro titulo-seccion">SECCION</th>
			<th class="titulo-registro titulo-tp">T/P</th>
			<th class="titulo-registro titulo-aulas">AULA</th>
			<th class="titulo-registro titulo-docentes">DOCENTE</th>
			<th class="titulo-ciclo">C1</th>
			<th class="titulo-ciclo">C2</th>
			<th class="titulo-ciclo">C3</th>
			<th class="titulo-ciclo">C4</th>
			<th class="titulo-ciclo">C5</th>
			<th class="titulo-ciclo">C6</th>
			<th class="titulo-ciclo">C7</th>
			<th class="titulo-ciclo">C8</th>
			<th class="titulo-ciclo">C9</th>
			<th class="titulo-ciclo">C10</th>
		</thead>
		<?php 
				require_once("cargar.php");

				if(isset($_POST["curso"]))
				{	
					$curso=$_POST["curso"];

					Cargar($curso);

				}
				else {
					$curso="MB146";
					Cargar($curso);
				}	
		 ?>

		<tr>

			<td class="comun">
				<input type="text" id="txtdia" class="txtform form-control" required="">
			</td>
			<td class="comun">
				<input type="text" id="txthora" class="txtform form-control">
			</td>
			<td class="comun">
				<input type="text" id="txtcurso" class="txtform form-control" value="<?php echo $curso; ?>" disabled >
			</td>
			<td class="comun">
				<input type="text" id="txtseccion" class="txtform form-control">
			</td>
			<td class="comun">
				<input type="text" id="txttp" class="txtform form-control">
			</td>
			<td class="comun">
				<center>
				<select id="select-aulas">
					<option selected disabled>
						--SELECCIONE--
					</option>
					<?php 
						$o->Open(2);
						$tabla=$o->Mostrar("aulas","aula",2);
						foreach($tabla as $a)							
						{
							if($a->taburete==1)
							{
								$a->taburete="Si";
							}
							else
							{
								$a->taburete="No";
							}
					?>	
						<option title="<?php echo 'Capacidad: '.$a->capacidad.'&#10;'.
													'Pizarra: '.$a->pizarra.'&#10;'.
													'Entrada: '.$a->tipEntrada.'&#10;'.
													'Entorno: '.$a->tipSilla.'&#10;'.
													'Ventilacion: '.$a->equVentilacion.'&#10;'.
													'Entrada: '.$a->tipEntrada.'&#10;'.
													'Taburete: '.$a->taburete.'&#10;';?>">
						<?php echo $a->aula; ?>
						</option>
					<?php  
						}
						$o->Close(2);	
					?>


				</select>
				</center>
			</td>
			<td class="comun">
				<center>
				<select id="select-docentes">

					<option selected disabled>
						--SELECCIONE--
					</option>
					<?php 
						$o->Open(2);
						$tabla=$o->Mostrar("docentes","apePaterno",2);
						foreach($tabla as $a)
						{
					?>	
							<option value="<?php echo $a->codDocente ?>">
							<?php echo $a->apePaterno." ".$a->apeMaterno.", ".$a->nombres; ?>
							</option>
				
					<?php  
						}
						$o->Close(2);	
					?>
				</select>
				</center>
			</td>
			<td class="comun">
				<input type="text" id="txtc1" class="txtform form-control">
			</td>
			<td class="comun">
				<input type="text" id="txtc2" class="txtform form-control">
			</td>
			<td class="comun">
				<input type="text" id="txtc3" class="txtform form-control">
			</td>
			<td class="comun">
				<input type="text" id="txtc4" class="txtform form-control">
			</td>
			<td class="comun">
				<input type="text" id="txtc5" class="txtform form-control">
			</td>
			<td class="comun">
				<input type="text" id="txtc6" class="txtform form-control">
			</td>
			<td class="comun">
				<input type="text" id="txtc7" class="txtform form-control">
			</td>
			<td class="comun">
				<input type="text" id="txtc8" class="txtform form-control">
			</td>
			<td class="comun">
				<input type="text" id="txtc9" class="txtform form-control">
			</td>
			<td class="comun">
				<input type="text" id="txtc10" class="txtform form-control">
			</td>
		</tr>	

</table>

<!-- <div class="reducir-opciones col-sm-2 col-md-2 col-lg-1">								
		<table class="table-opciones" >
			<tr>
				<th class="th-botones titulo-opciones"></th>
				<th class="th-botones"></th>
				<th class="th-botones"></th>

			</tr>
		 		
	
		 	<tr>		
				<td class="comun" colspan="3">
						<button class="btn btn-primary" style="width: 94.5px;" onclick="guardar();">
							<span class="fas fa-save"></span>
							Guardar
						</button>
				</td>
				
			</tr>
		</table>								
</div> -->
</div>
</center>

<script>

	$(document).ready(function(){
		$("#select-aulas").select2({
			width: '120px',

		});
	});
	$(document).ready(function(){
		$(".select-aulas").select2({
			width: '120px',
		});
	});

	$(document).ready(function(){
		$("#select-docentes").select2({
			 width: '240px',
		});
	});
	$(document).ready(function(){
		$(".select-docentes").select2({
			 width: '240px',
		});
	});

			
</script>


<!-- <script type="text/javascript">
		$(function() {
	            $("[title]").tipsy({
	            	arrowWidth: 10,
	            	attr: 'data-tipsy',
	            	position: 'right',
	            	offset: 7,
	            	attr: 'data-tipsy',

	            });
	        });
</script> -->
