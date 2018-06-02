



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
	
		<tr class="tr" id="<?php echo $indice; ?>">

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
			
				<select id="select-aulas<?php echo $indice;?>" class="select-aulas cboaulas" disabled>

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
			
		</td>
		<td class="comun" id="docentes">
			
				<select id="select-docentes<?php echo $indice;?>" class="select-docentes cbodocentes" disabled>
					<?php 
						$u->Open(2);
						$tabla=$u->Mostrar("docentes","apePaterno",2);
						foreach($tabla as $e)
						{
					?>	
						<option value="<?php echo $e->codDocente; ?>" <?php if($e->codDocente==$a->codDocente):echo "selected"; endif ?> >
							<?php echo $e->apePaterno." ".$e->apeMaterno.", ".$e->nombres; ?>
						</option>
					<?php  
						}
						$u->Close(2);	
					?>
				</select>
			
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

		// var cursorstatic;
		var trderecho;
		var combo=0;
		// var permiso;
		// var fila;
		// var idcursor;
		// var detener=1;



		
		// 	$("tr").mouseenter(function(){	
		// 		idcursor=$(this).attr("id");
				
		// 		if(idcursor)
		// 		{
		// 		if(detener<=2)
		// 			{
		// 				$("#"+idcursor).click(function(){
		// 				console.log(idcursor);
								
		// 						detener=1;
		// 						if(permiso==1)
		// 						{
		// 							combo=0;
		// 						}
								
								

		// 						if(fila==idcursor)
		// 						{
									
		// 						}
		// 						else
		// 						{
		// 							if(disponible==0)

		// 							{	
		// 								salir(cursorstatic);
		// 							}	
		// 							cursorstatic=idcursor;
		// 							editar(idcursor);
		// 							fila=cursorstatic;
		// 							disponible=0;
		// 						}
								

		// 					$("#select-aulas"+cursorstatic).change(function(){
		// 						combo=0;

		// 					});

		// 					$("#select-docentes"+cursorstatic).change(function(){
		// 						combo=0;
		// 					});
		// 				});

		// 				detener++;
		// 				}
		// 			}
				
		// 		if(idcursor)
		// 		{	
		// 			console.log(idcursor);
		// 			$("#tabla-docentes").css({"display":"none"});
		// 			$.post("anexos/mostrar.php",{idfila:idcursor},
		// 			function(data){
		// 			$("#tabla-docentes").html(data).fadeIn();
		// 			send(data);
		// 			});
		// 		}
					

					
				
		// 	});

		

		// $(document).ready(function(){
		// 	$("tr").mouseleave(function(){	
		// 		idcursor=null;
		// 	});
		// });


		// $(document).ready(function(){

			$("td").click(function(){
							var nombre=$(this).attr("id");
							if(nombre=="docentes")
							{
								combo=1;
								//permiso=0;
							}
							else
							{
								//permiso=0;
							}

							if(nombre=="aulas")
							{
								combo=1;
								//permiso=0;
							}
							else
							{
								//permiso=0;
							}

						});
			
		// 	$("#tabla").mouseleave(function(){

		// 		if(cursorstatic)
		// 		{
		// 			{	
		// 					if(combo==0)
		// 					{
		// 						salir(cursorstatic);
		// 						fila=null;
		// 					}
		// 					else
		// 					{

		// 					}
						
		// 			}
		// 		}
		// 	});

		// });

// **********************************************************************************************************

var idcursor;
var open="";

$(document).ready(function(){
	$("tr").click(function(){
		idcursor=$(this).attr("id");

			
			if(idcursor)
			{	

				if(idcursor!=open)
				{	
					if(open!="")
					{
						salir(open);
					}		
					open=idcursor;
					$.post("anexos/mostrar.php",{idfila:open},
					function(data){
					$("#tabla-docentes").html(data).fadeIn();
					send(data);
					});		
					console.log(idcursor);
					editar(idcursor);

					$("#select-aulas"+open).change(function(){
						combo=0;
						console.log("aulas");

					});

					$("#select-docentes"+open).change(function(){
						combo=0;
						console.log("docentes");
					});

					if(idcursor!=open)
					{

					}

				}
				
			}
	});
});

	$("#tabla").mouseleave(function(){

				if(open)
				{
					{	
							if(combo==0)
							{
								salir(open);
								open="";
							}
							else
							{

							}
						
					}
				}
			});

	// $("tr").mouseenter(function(){

	// 	var idhover=$(this).attr("id");
	// 	if(idhover)
	// 	{
	// 		console.log("hover"+idhover);
	// 		$.post("anexos/mostrar.php",{idfila:idhover},
	// 		function(data){
	// 		$("#tabla-docentes").html(data).fadeIn();
	// 		send(data);
	// 		});
	// 	}
		
	// });

	// ***************************************************Menu Contextual********************************************************
	$("tr").mousedown(function(e){
		trderecho=$(this).attr("id");
		if(trderecho)
		{
			if(e.which==3)
			{
			$("#"+trderecho).addClass("pintado")
			$("#menucontextual").css("top",e.pageY - 20);
			$("#menucontextual").css("left",e.pageX - 20);
			$("#menucontextual").show("fast");
			}
		}
		
	})

	$("#menucontextual").mouseleave(function(){
		$("#"+trderecho).removeClass("pintado")
		$("#menucontextual").hide("fast");
	});
		
	$(document).bind("contextmenu",function(e){
		$("#menu").css("display","block");
		$("#menu").css("top",e.pageY);
		$("#menu").css("left",e.pageX);
		return false;

	});
		

	
	</script>