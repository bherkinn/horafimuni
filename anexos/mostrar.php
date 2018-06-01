<?php 
	
	require_once("../models/conexion.php");
	$indice=$_POST["idfila"];
	$basehorarios=new Conexion();


	$base=$basehorarios->MostrarDatosFila($indice);
	foreach ($base as $a) {
		$iddocente=$a->codDocente;
	}

	$datos_docente=$basehorarios->HorarioDocente($iddocente);

?>
		<table class="tabla-base table-responsive border rounded table-hover">
		<thead class="table-success">
			<th class="titulo-dia">DIA</th>
			<th class="titulo-hora">HORA</th>
			<th class="titulo-registro">CURSO</th>
			<th class="titulo-registro titulo-seccion">SECCION</th>
			<th class="titulo-registro titulo-tp">T/P</th>
			<th class="titulo-aulas">AULA</th>
			<th class="titulo-docentes">DOCENTE</th>
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

	foreach ($datos_docente as $u) {
		$indice=$u->idHorarios;

 ?>
 	<tr id="<?php echo $indice; ?>">

		<td class="comun">
			<input type="text" id="txtdia<?php echo $indice;?>" spellcheck="false" name="txtdia" class="i txtform" value="<?php echo $u->dia; ?>" disabled>
		</td>

		<td class="comun">
			<input type="text" id="txthora<?php echo $indice;?>" spellcheck="false" name="txthora" class="i txtform " value="<?php echo $u->hora; ?>" disabled>
		</td>

		<td class="comun">
			<input type="text" id="txtcurso<?php echo $indice;?>" spellcheck="false" name="txtcurso" class="txtform i" value="<?php echo $u->codCurso; ?>" disabled >
		</td>

		<td class="comun">
			<input type="text" id="txtseccion<?php echo $indice;?>" spellcheck="false" name="txtseccion" class="txtform i" value="<?php echo $u->secCurso; ?>" disabled>
		</td>

		<td class="comun">
			<input type="text" id="txttp<?php echo $indice;?>" spellcheck="false" name="txttp" class="txtform i" value="<?php echo $u->teopra; ?>" disabled>
		</td>

		<td class="comun" id="aulas">
			
				<input type="text" id="txtaulas<?php echo $indice ?>" spellcheck="false" class="txtform i" value="<?php echo $u->codAula; ?>" >
			
		</td>
		<td class="comun" id="docentes">
			
				
					<?php 
						$basehorarios->Open(2);
						$tabla=$basehorarios->mostrarDocente($u->codDocente);
						foreach($tabla as $e)
						{
					?>	
						<input type="" name="" value="<?php echo $e->apePaterno." ".$e->apeMaterno.", ".$e->nombres; ?>" class="txtform i" >
							
						
					<?php  
						}
					?>
				
			
		</td>
		<td class="comun">
			<input type="text" name="txtc1" id="txtc1<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $u->c1 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc2" id="txtc2<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $u->c2 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc3" id="txtc3<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $u->c3 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc4" id="txtc4<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $u->c4 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc5" id="txtc5<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $u->c5 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc6" id="txtc6<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $u->c6 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc7" id="txtc7<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $u->c7 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc8" id="txtc8<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $u->c8 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc9" id="txtc9<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $u->c9 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc10" id="txtc10<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $u->c10 ?>" disabled>
		</td>
	</tr>
	

 <?php 

	}

  ?>

  </table>

  <script type="text/javascript">
  	$(document).ready(function(){
		$(".select-aulas").select2();
	});
	$(document).ready(function(){
		$(".select-docentes").select2();
	});

  </script>
