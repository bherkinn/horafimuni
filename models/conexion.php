<?php 

	Class Conexion{

		protected $con1;
		protected $con2;
		protected $host="localhost";
		protected $db1="horariosfim";
		protected $db2="oeraae2018";
		protected $usu="root";
		protected $pass="";
		protected $memoria;

		public function Conexion(){
			
		}

		public function Open($num){
			$this->Conectar($num);
		}


		protected function Conectar($num){

			if($num==1)
			{
				try {

				$this->con1= new PDO("mysql:host=$this->host;dbname=$this->db1",$this->usu,$this->pass);
				$this->con1->exec("SET CHARACTER SET UTF8");
				}
				catch (Exception $e) {

					echo "Error".$e->getMessage();
				}

				}else if($num==2)
			{

				try {

				$this->con2= new PDO("mysql:host=$this->host;dbname=$this->db2",$this->usu,$this->pass);
				$this->con2->exec("SET CHARACTER SET UTF8");
				}
				catch (Exception $e) {

					echo "Error".$e->getMessage();
				}
			}else
			{
				echo "error";
			}
			
	
		}

		public function Mostrar($tabla,$orden,$num){

				if($num==1)
				{
					$this->memoria=$this->con1->query("SELECT * FROM $tabla ORDER BY $orden");
					$datos=$this->memoria->fetchAll(PDO::FETCH_OBJ);

					return $datos;
				}
					else if($num==2)
					{
						$this->memoria=$this->con2->query("SELECT * FROM $tabla ORDER BY $orden");
						$datos=$this->memoria->fetchAll(PDO::FETCH_OBJ);

						return $datos;
					}
					else
					{
						echo"Error";
					}
				
		}

		public function Close($num){

			$this->memoria->closeCursor();
			$this->memoria=null;

				if($num==1)
				{
					$this->con1=null;

				}else if($num==2)
					{
						$this->con2=null;

					}
				else{
				
				}

		}

		public function Cargas($curso){

			$this->conectar(1);
			$this->memoria=$this->con1->query("SELECT * FROM basehorarios WHERE codCurso='$curso';");

			if(!empty($this->memoria))
			{	
				$datos=$this->memoria->fetchAll(PDO::FETCH_OBJ);
				$this->Close(1);

				return $datos;
			}
			else{

				return "vacio";

			}

			
		}

		public function InsertarDatos($datos)
		{	
			try {

				$this->Conectar(1);
				$this->con1->query("INSERT INTO basehorarios (dia,hora,codCurso,secCurso,teopra,codAula,codDocente,c1,c2,c3,c4,c5,c6,c7,c8,c9,c10) VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]','$datos[11]','$datos[12]','$datos[13]','$datos[14]','$datos[15]','$datos[16]')");
				} catch (Exception $e) {
				
				echo "error".$e->getMessage();
			
				}
				// $this->Close(1);
			
			

		}


	}
 ?>

