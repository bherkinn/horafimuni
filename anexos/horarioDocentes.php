<script type="text/javascript">
	// setInterval("recargar()", 3000);


</script>

<?php 	
		
		
		

		
		require_once("../models/conexion.php");

		
		
			$hd=new Conexion();
		$datos=$hd->HorarioDocente("08787197");

		foreach ($datos as $a) {
			
			echo $a->secCurso;
			echo $a->codAula;
		}
		
		



 ?>

