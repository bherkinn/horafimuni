var FancyWebSocket = function(url)
{
	var callbacks = {};
	var ws_url = url;
	var conn;
	
	this.bind = function(event_name, callback)
	{
		callbacks[event_name] = callbacks[event_name] || [];
		callbacks[event_name].push(callback);
		return this;
	};
	
	this.send = function(event_name, event_data)
	{
		this.conn.send( event_data );
		return this;
	};
	
	this.connect = function() 
	{
		if ( typeof(MozWebSocket) == 'function' )
		this.conn = new MozWebSocket(url);
		else
		this.conn = new WebSocket(url);
		
		this.conn.onmessage = function(evt)
		{
			dispatch('fila', evt.data);
		};
		
		this.conn.onclose = function(){dispatch('close',null)}
		this.conn.onopen = function(){dispatch('open',null)}
	};
	
	this.disconnect = function()
	{
		this.conn.close();
	};
	
	var dispatch = function(event_name, fila)
	 {
	// 	if(message == null || message == "")//aqui es donde se realiza toda la accion
	// 		{
	// 		}
	// 		else
	// 		{
	// 			var JSONdata    = JSON.parse(message); //parseo la informacion
	// 			switch(JSONdata[0].actualizacion)//que tipo de actualizacion vamos a hacer(un nuevo mensaje, solicitud de amistad nueva, etc )
	// 			{
	// 				case '1':
				//actualiza_mensaje(message);
				/****************************************/
				// if(docentes)
				// {
				// 	var hdocentes=JSON.parse(docentes);
				// 	llenarTablaDocente(hdocentes);
				// }
				/****************************************/

				if(fila)
				{
					$.post("anexos/docentes/ObtenerHorariosDocentes.php",{idfila:fila},
						function(data){
						var hdocentes=JSON.parse(data);
						llenarTablaDocente(hdocentes);

					});	

					$.post("anexos/aulas/ObtenerHorariosAulas.php",{idfila:fila},
						function(data){
						var haulas=JSON.parse(data);
						llenarTablaAulas(haulas);

					});	

					$.post("anexos/cursos/ObtenerHorariosCursos.php",{idfila:fila},
						function(data){
						var hcursos=JSON.parse(data);
						llenarTablaCursos(hcursos);

					});	

					$.post("anexos/ObtenerHorariosModulos.php",{idfila:fila},
						function(data){
						var hciclos=JSON.parse(data);

						distribuirDatos(hciclos);

					});	
				}

				
				
	// 				break;
	// 				case '2':
	// 				actualiza_solicitud(message);
	// 				break;
					
	// 			}
	// 			//aqui se ejecuta toda la accion
				
				
				
				
				
				
	//		}
	}
};

var Server;
function send( text ) 
{
    Server.send( 'fila', text );
}
$(document).ready(function() 
{
	Server = new FancyWebSocket('ws://172.20.5.137:12345');
    Server.bind('open', function()
	{
    });
    Server.bind('close', function( data ) 
	{
    });
    Server.bind('fila', function( payload ) 
	{
    });
    Server.connect();
});

var datos="";
var camposDocentes=new Array();
var camposAulas=new Array();
var camposCursos=new Array();
var camposModulo1=new Array();
/*---------------------------------*/
var ciclos=new Array();
var grupos=new Array();
var cciclo=0;
/*---------------------------------*/
var contador=0;
var canhoras=0;


function distribuirDatos(datos){

	for(i=1;i<=10;i++)
	{	
		if(datos[0]["c"+i]!="")
		{	
			console.log("-----------------------------------------------------");
			console.log(datos[0]["c"+i]);

			longcadena=datos[0]["c"+i].length;

			for(u=0;u<longcadena;u++)
			{
				ciclos[cciclo]="c"+i;
				grupos[cciclo]=datos[0]["c"+i].substr(u,1);
				alert(ciclos[cciclo]+" - "+grupos[cciclo]);
				cciclo++;
				
			}

			// if()
			// if(datos[0]["c"+i].indexOf("-")!=-1)
			// {
			// 	var ubicacion1=datos[0]["c"+i].indexOf("-");
			// 	console.log("la ubicaion 1 es "+ubicacion1);
			// 	ciclos[cciclo]="c"+i;
			// 	grupos[cciclo]=datos[0]["c"+i].substr(0,ubicacion1);
			// 	alert(ciclos[cciclo]+" - "+grupos[cciclo]);
			// 	cciclo++;

			// 	if(datos[0]["c"+i].indexOf("-",2)!=-1)
			// 	{
			// 		var ubicacion2=datos[0]["c"+i].indexOf("-",2);
			// 		console.log("la ubicaion 2 es "+ubicacion2);
			// 		// -------------------------------------------
			// 		ciclos[cciclo]="c"+i;
			// 		grupos[cciclo]=datos[0]["c"+i].substr(ubicacion2-1,1);
			// 		alert(ciclos[cciclo]+" - "+grupos[cciclo]);
			// 		cciclo++;

			// 		ciclos[cciclo]="c"+i;
			// 		grupos[cciclo]=datos[0]["c"+i].substr(ubicacion2+1,1);
			// 		alert(ciclos[cciclo]+" - "+grupos[cciclo]);
			// 		cciclo++;
			// 	}
			// 	else
			// 	{
			// 		ciclos[cciclo]="c"+i;
			// 		grupos[cciclo]=datos[0]["c"+i].substr(ubicacion1+1,1);
			// 		alert(ciclos[cciclo]+" - "+grupos[cciclo]);
			// 		cciclo++;
			// 	}
				
			// }
			// else
			// {
			// 	ciclos[cciclo]="c"+i;
			// 	grupos[cciclo]=datos[0]["c"+i];
			// 	alert(ciclos[cciclo]+" - "+grupos[cciclo]);
			// 	cciclo++;
			// }
			
		}
		
	}

	//$.post("anexos")
	
	cciclo=0;
	ciclos=[];
	grupos=[];
}

function llenarTablaModulo1(jsondatos)
{

}
function llenarTablaCursos(jsondatos){

	if(camposCursos[0])
	{
		limpiarCajas(camposCursos);
	}

	if(jsondatos[0]["taburete"]=="0")
	{
		var taburete="NO";
	}
	else
	{
		var taburete="SI";
	}

	$("#nomcurso").html(jsondatos[0]["codCurso"]+" - "+jsondatos[0]["nomCurso"]);
	$("#caracteristica").html("Capacidad "+jsondatos[0]['capacidad']+" sillas <br> Con Pizarra "+jsondatos[0]["pizarra"]+" y "+taburete+" tiene taburete");
	console.log(jsondatos);
	console.log(jsondatos[0]['idHorarios']);

	var cantidad=Object.keys(jsondatos).length;
	var dia;
	
	for(i=0;i<cantidad;i++)
	{
		var hinicio=parseInt(jsondatos[i]['hora'].substr(0,2));
		var hfinal=parseInt(jsondatos[i]['hora'].substr(3,5));
		switch(jsondatos[i]['dia'])
		{
			case "LU":dia=1;
			break;
			case "MA":dia=2;
			break;
			case "MI":dia=3;
			break;
			case "JU":dia=4;
			break;
			case "VI":dia=5;
			break;
			case "SA":dia=6;
			break;
			case "DO":dia=7;
			break;
		}

		console.log("el dia es "+dia);
		

		console.log(hinicio+""+hfinal);

		while(hinicio<hfinal)
		{	
			
			var celda = $("#c"+hinicio+dia).html();
			if(celda=="")
			{
				$("#c"+hinicio+""+dia).append(jsondatos[i]['secCurso']+" : "+jsondatos[i]['codAula']+"<br>"+jsondatos[i]['apePaterno']+", "+jsondatos[i]['nombres']+"<br>");
				$("#c"+hinicio+""+dia).addClass("pintado-true");
				canhoras++;
			}
			else
			{
				$("#c"+hinicio+""+dia).removeClass("pintado-true");
				$("#c"+hinicio+""+dia).append(jsondatos[i]['secCurso']+" : "+jsondatos[i]['codAula']+"<br>"+jsondatos[i]['apePaterno']+", "+jsondatos[i]['nombres']+"<br>");
				$("#c"+hinicio+""+dia).addClass("pintado-false");
				canhoras++;
			}

			camposCursos[contador]="#c"+hinicio+""+dia;
			hinicio++;
			contador++;
		}
	}
	contador=0;
	canhoras=0;

}

function llenarTablaAulas(jsondatos){

	if(camposAulas[0])
	{
		limpiarCajas(camposAulas);
	}

	if(jsondatos[0]["taburete"]=="0")
	{
		var taburete="NO";
	}
	else
	{
		var taburete="SI";
	}

	$("#nomaula").html("AULA: "+jsondatos[0]["codAula"]);
	$("#caracteristica").html("Capacidad "+jsondatos[0]['capacidad']+" sillas <br> Con Pizarra "+jsondatos[0]["pizarra"]+" y "+taburete+" tiene taburete");
	console.log(jsondatos);
	console.log(jsondatos[0]['idHorarios']);

	var cantidad=Object.keys(jsondatos).length;
	var dia;
	
	for(i=0;i<cantidad;i++)
	{
		var hinicio=parseInt(jsondatos[i]['hora'].substr(0,2));
		var hfinal=parseInt(jsondatos[i]['hora'].substr(3,5));
		switch(jsondatos[i]['dia'])
		{
			case "LU":dia=1;
			break;
			case "MA":dia=2;
			break;
			case "MI":dia=3;
			break;
			case "JU":dia=4;
			break;
			case "VI":dia=5;
			break;
			case "SA":dia=6;
			break;
			case "DO":dia=7;
			break;
		}

		console.log("el dia es "+dia);
		

		console.log(hinicio+""+hfinal);

		while(hinicio<hfinal)
		{	
			
			var celda = $("#a"+hinicio+dia).html();
			if(celda=="")
			{
				$("#a"+hinicio+""+dia).append(jsondatos[i]['codCurso']+jsondatos[i]['secCurso']+"<br>"+jsondatos[i]['apePaterno']+", "+jsondatos[i]['nombres']+"<br>");
				$("#a"+hinicio+""+dia).addClass("pintado-true");
				canhoras++;
			}
			else
			{
				$("#a"+hinicio+""+dia).removeClass("pintado-true");
				$("#a"+hinicio+""+dia).append(jsondatos[i]['codCurso']+jsondatos[i]['secCurso']+"<br>"+jsondatos[i]['apePaterno']+", "+jsondatos[i]['nombres']+"<br>");
				$("#a"+hinicio+""+dia).addClass("pintado-false");
				canhoras++;
			}

			camposAulas[contador]="#a"+hinicio+""+dia;
			hinicio++;
			contador++;
		}
	}
	contador=0;
	canhoras=0;

}


function llenarTablaDocente(jsondatos){

	if(camposDocentes[0])
	{
		limpiarCajas(camposDocentes);
	}


	$("#nomdocente").html(jsondatos[0]["apePaterno"]+jsondatos[0]["apeMaterno"]+", "+jsondatos[0]["nombres"]+" / "+jsondatos[0]["codDocente"]);
	console.log(jsondatos);
	console.log(jsondatos[0]['idHorarios']);

	var cantidad=Object.keys(jsondatos).length;
	var dia;
	
	for(i=0;i<cantidad;i++)
	{
		var hinicio=parseInt(jsondatos[i]['hora'].substr(0,2));
		var hfinal=parseInt(jsondatos[i]['hora'].substr(3,5));
		switch(jsondatos[i]['dia'])
		{
			case "LU":dia=1;
			break;
			case "MA":dia=2;
			break;
			case "MI":dia=3;
			break;
			case "JU":dia=4;
			break;
			case "VI":dia=5;
			break;
			case "SA":dia=6;
			break;
			case "DO":dia=7;
			break;
		}

		console.log("el dia es "+dia);
		

		console.log(hinicio+""+hfinal);

		while(hinicio<hfinal)
		{	
			
			var celda = $("#d"+hinicio+dia).html();
			if(celda=="")
			{
				$("#d"+hinicio+""+dia).append(jsondatos[i]['codCurso']+jsondatos[i]['secCurso']+"/"+jsondatos[i]['codAula']+"<br>");
				$("#d"+hinicio+""+dia).addClass("pintado-true");
				canhoras++;
			}
			else
			{
				$("#d"+hinicio+""+dia).removeClass("pintado-true");
				$("#d"+hinicio+""+dia).append(jsondatos[i]['codCurso']+jsondatos[i]['secCurso']+"/"+jsondatos[i]['codAula']+"<br>");
				$("#d"+hinicio+""+dia).addClass("pintado-false");
				canhoras++;
			}

			camposDocentes[contador]="#d"+hinicio+""+dia;
			hinicio++;
			contador++;
			$("#horas").html(canhoras);
		}
	}
	contador=0;
	canhoras=0;

}


function limpiarCajas(camposllenos){

	while(contador<camposllenos.length)
	{
		$(camposllenos[contador]).removeClass("pintado-true");
		$(camposllenos[contador]).html("");
		$(camposllenos[contador]).removeClass("pintado-false");
		contador++;
	}

	contador=0;

}



function actualiza_mensaje(message)
{	
	//console.log(message);
	// var JSONdata    = JSON.parse(message); //parseo la informacion
	// 			var tipo = JSONdata[0].tipo;
	// 			var mensaje = JSONdata[0].mensaje;
	// 			var fecha = JSONdata[0].fecha;
				
	// 			var contenidoDiv  = $("#"+tipo).html();
	// 			var mensajehtml   = fecha+' : '+mensaje;
				
		//		$("#"+tipo).html(contenidoDiv+'0000111'+mensajehtml);
				//$("#temporal").html(message);	
}
function actualiza_solicitud()
{
	alert("tipo de envio 2");
}
