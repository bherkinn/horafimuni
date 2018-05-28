<?php 
	usleep(600000);

	function Cargar($curso){

		require_once("../models/conexion.php");
		$u=new Conexion();
		$datos=$u->Cargas($curso);

		foreach($datos as $a)
		{
			$indice=$a->idHorarios;

?>
	
		<tr id="<?php echo $indice; ?>">

		<td class="comun">
			<input type="text" id="txtdia<?php echo $indice;?>" spellcheck="false" name="txtdia" class="i txtform" value="<?php echo $a->dia; ?>" disabled>
		</td>

		<td class="comun">
			<input type="text" id="txthora<?php echo $indice;?>" spellcheck="false" name="txthora" class="i txtform " value="<?php echo $a->hora; ?>" disabled>
		</td>

		<td class="comun">
			<input type="text" id="txtcurso<?php echo $indice;?>" spellcheck="false" name="txtcurso" class="txtform i" value="<?php echo $curso; ?>" disabled >
		</td>

		<td class="comun">
			<input type="text" id="txtseccion<?php echo $indice;?>" spellcheck="false" name="txtseccion" class="txtform i" value="<?php echo $a->secCurso; ?>" disabled>
		</td>

		<td class="comun">
			<input type="text" id="txttp<?php echo $indice;?>" spellcheck="false" name="txttp" class="txtform i" value="<?php echo $a->teopra; ?>" disabled>
		</td>

		<td class="comun" id="aulas">
			<center>
				<select id="select-aulas<?php echo $indice;?>" class="select-aulas title-aulas" disabled=>

					<?php 
						$u->Open(2);
						$tabla=$u->Mostrar("aulas","aula",2);
						foreach($tabla as $e)
						{
							if($e->taburete==1)
							{
								$e->taburete="Si";
							}
							else
							{
								$e->taburete="No";
							}
					?>		
						<option value="<?php echo $e->aula; ?>" <?php if($e->aula==$a->codAula):echo "selected"; endif?> 
								title="<?php echo 'Capacidad: '.$e->capacidad.'&#10;'.
													'Pizarra: '.$e->pizarra.'&#10;'.
													'Entrada: '.$e->tipEntrada.'&#10;'.
													'Entorno: '.$e->tipSilla.'&#10;'.
													'Ventilacion: '.$e->equVentilacion.'&#10;'.
													'Entrada: '.$e->tipEntrada.'&#10;'.
													'Taburete: '.$e->taburete.'&#10;';?>">
								<?php echo $e->aula; ?>
						</option>
					<?php  
						}
						$u->Close(2);	
					?> 

				</select>
			</center>
		</td>
		<td class="comun" id="docentes">
			<center>
				<select id="select-docentes<?php echo $indice;?>" class="select-docentes" disabled>
					<?php 
						$u->Open(2);
						$tabla=$u->Mostrar("docentes","apePaterno",2);
						foreach($tabla as $e)
						{
					?>	
						<option value="<?php $e->codDocente; ?>" <?php if($e->codDocente==$a->codDocente):echo "selected"; endif ?> >
							<?php echo $e->apePaterno." ".$e->apeMaterno.", ".$e->nombres; ?>
						</option>
					<?php  
						}
						$u->Close(2);	
					?>
				</select>
			</center>
		</td>
		<td class="comun">
			<input type="text" name="txtc1" id="txtc1<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c1 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc2" id="txtc2<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c2 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc3" id="txtc3<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c3 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc4" id="txtc4<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c4 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc5" id="txtc5<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c5 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc6" id="txtc6<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c6 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc7" id="txtc7<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c7 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc8" id="txtc8<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c8 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc9" id="txtc9<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c9 ?>" disabled>
		</td>
		<td class="comun">
			<input type="text" name="txtc10" id="txtc10<?php echo $indice; ?>" spellcheck="false" class="txtform i" value="<?php echo $a->c10 ?>" disabled>
		</td>
	</tr>

	<?php  
		}

	}	
	?>
	<script type="text/javascript">

		var cursorstatic;
		var combo=0;
		var permiso;
		var fila;


		$(document).ready(function(){
			$("tr").hover(function(){	
				idcursor=$(this).attr("id");
					$("#"+idcursor).click(function(){
					console.log(idcursor);
							
							if(permiso==1)
							{
								combo=0;
							}
							
							

							if(fila==idcursor)
							{
								
							}
							else
							{
								if(disponible==0)
								{
									salir(cursorstatic);
								}	
								cursorstatic=idcursor;
								editar(idcursor);
								fila=cursorstatic;
								disponible=0;
							}
							

							$("#select-aulas"+cursorstatic).change(function(){
								combo=0;

							});

							$("#select-docentes"+cursorstatic).change(function(){
								combo=0;
							});


					});

			});

		});


		$(document).ready(function(){

			$("td").click(function(){
							var nombre=$(this).attr("id");
							if(nombre=="docentes")
							{
								combo=1;
								permiso=0;
							}
							else
							{
								permiso=0;
							}

							if(nombre=="aulas")
							{
								combo=1;
								permiso=0;
							}
							else
							{
								permiso=0;
							}

							console.log("td disponible ="+disponible);
							console.log("td combo ="+combo);
						});
			
			$("#tabla").hover(function(){
				{	
						if(combo==0)
						{
							salir(cursorstatic);
							fila=null;
						}
						else
						{
							console.log("disponible ="+disponible);
							console.log("combo ="+combo);
						}
					
				}
			});

		});


		
		

	
	</script>