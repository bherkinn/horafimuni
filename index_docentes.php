
 <!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Registrar</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- **************************************CSS************************************* -->
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/css/principal.css">
	<link rel="stylesheet" type="text/css" href="librerias/css/docentes.css">
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
	<script type="text/javascript" src="librerias/js/fancywebsocket.js"></script>
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

		

		<div id="temporal" class="container">

			

		</div>




              	  
          <br>
          <!-- </div> -->
          <br>
          <div id="tabla" class="container">

			

		</div>


	<script type="text/javascript">
		function CrearTabla(filas,columnas,hora){

			var dias = new  Array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabados','Domingos');
			var cantidad="";
			var tabla=document.createElement("table");
			tabla.setAttribute("id","tabla-docentes");
			tabla.setAttribute("class","table-responsive-horario border rounded");
			tabla.setAttribute("border","3");
		    //tabla.style.border="1px solid gray";
		    var content=document.getElementById("tabla");
		    content.appendChild(tabla);
			
			horainicial=hora;

			for(i=0;i<filas;i++){
				$("#tabla-docentes").append("<tr>");
				for(u=0;u<columnas;u++)
				{
					if(i==0)
					{
						$("#tabla-docentes").append("<th class='horas' id='"+u+"'></th>");
						if(u!=0)
						{
							$("#"+u).html(dias[u-1]);
						}
					}
					else
					{	
						$("#tabla-docentes").append("<td id='"+(horainicial-1)+""+u+"'></td>");

						if(u!=0)
						{
							$("#"+(horainicial-1)+""+u).addClass("contenido-tabla");

							
						}
						else
						{
							$("#"+(horainicial-1)+""+u).addClass("horas");

							inicial=hora.toString().length;
							final=(hora+1).toString().length;
							console.log(cantidad);

							if(inicial>1&&final>1)
							{
								$("#"+(horainicial-1)+""+u).html(hora+"-"+(hora+1));
							}
							
							if(inicial==1&&final>1)
							{
								$("#"+(horainicial-1)+""+u).html("0"+hora+"-"+(hora+1));
							}

							if(inicial==1&&final==1)
							{
								$("#"+(horainicial-1)+""+u).html("0"+hora+"-"+"0"+(hora+1));
							}
							
							

							hora++;
							
						}
					}
				}

				horainicial++;

				$("#tabla-docentes").append("</tr>");
				$("#0").html("Horas");
			}

		}

			CrearTabla(17,7,6);
		
	</script>


    </style>
		



</body>

</html>
