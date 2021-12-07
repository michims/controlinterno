<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


 session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
	class ConsultasModel
	{
		// set database config for mysql
		function __construct($consetup)
		{
			$this->host = $consetup->host;
			$this->user = $consetup->user;
			$this->pass =  $consetup->pass;
			$this->db = $consetup->db;            					
		}
		// open mysql data base
		public function open_db()
		{
			$this->condb=new mysqli($this->host,$this->user,$this->pass,$this->db);
			$this->condb->set_charset("utf8");
			if ($this->condb->connect_error) 
			{
    			die("Erron in connection: " . $this->condb->connect_error);
			}else{
				
            }
		}

		// close database 
		public function close_db()
		{
			$this->condb->close();
		}	

		//Métodos Base de Datos
		public function InicioSesion($id,$clave)
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_InicioSesion(?,?)");
					$query->bind_param("ss",$id,$clave);
					
			
				$query->execute();
				$res=$query->get_result();
				$rol="";
				while ($row = mysqli_fetch_array($res)){
					$_SESSION['Rol'] = $row['Rol'];
					$_SESSION['id'] = $id;
					$_SESSION['departamento'] = $row['departamento']; 
					$_SESSION['namedepartamento'] = $row['NombreDepartamento'];
					$rol=$row['Rol'];
					
				}   	
				$query->close();				
				$this->close_db();  
                return $rol;
 
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function RegistroUsuario($id,$nombre,$tel,$email,$direccion,$departamento)
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_RegistroUsuario(?,?,?,?,?,?)");
					$query->bind_param("ssssss",$id,$nombre,$tel,$email,$direccion,$departamento);
					
			
				$query->execute();
				$result=$query->get_result();
				$res="";
				while ($row = mysqli_fetch_array($result)){  
				$res=$row['resultado'];
				} 
				$query->close();				
				$this->close_db();  
                return $res;
 
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function RegistroFormContacto($nombre,$email,$consulta)
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_RegistroFormContacto(?,?,?)");
					$query->bind_param("sss",$nombre,$email,$consulta);
					
			
				$query->execute();
				$resultform=$query->get_result();
				$id="";
				while ($row = mysqli_fetch_array($resultform)){  
				$id=$row['IdForm'];

				}   	
				$query->close();				
				$this->close_db(); 
				    
                return $id;
 
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function ComboRegistroUsuario()
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_ComboRegistroUsuario()");					
			
				$query->execute();
				$result2=$query->get_result(); 	
				$query->close();				
				$this->close_db(); 
				    
                return $result2;
 
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function PerfilUsuario($id)
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_PerfilUsuario(?)");
					$query->bind_param("s",$id);
					
			
				$query->execute();
				$result3=$query->get_result();	
				$query->close();				
				$this->close_db(); 
				
                return $result3;
 
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function EliminarPerfil($id)
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_EliminarCuentaUsuario(?)");
					$query->bind_param("s",$id);
					
			
				$query->execute();  	
				$query->close();				
				$this->close_db(); 
				    
              
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function ActualizarPerfil($id,$tel,$mail,$direc)
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_ActualizarPerfil(?,?,?,?)");
					$query->bind_param("ssss",$id,$tel,$mail,$direc);
					
			
				$query->execute();
				$query->close();				
				$this->close_db(); 
				    
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function ComboInfoCaractComponente($idcomponente)
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_InfoCaractComponente($idcomponente)");					
					$query->bind_param("d",$idcomponente);

				$query->execute();
				$result4=$query->get_result(); 	
				$query->close();				
				$this->close_db(); 
				    
                return $result4;
 
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function OpcionesCaracteristica($idopc)
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_OpcionesCaracteristica(?)");
					$query->bind_param("d",$idopc);
					
			
				$query->execute();
				$result5=$query->get_result();	
				$query->close();				
				$this->close_db(); 
				
                return $result5;
 
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function ComboAtributoFormulario($idcomp)
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_ComboAtributoFormulario(?)");
					$query->bind_param("d",$idcomp);
					
			
				$query->execute();
				$result6=$query->get_result();
	
				$query->close();				
				$this->close_db(); 
				    
                return $result6;
 
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function ComboOpcionAtributo($idcaracter)

        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_ComboOpcionAtributo(?)");

                    $query->bind_param("d",$idcaracter);

                $query->execute();

                $result7=$query->get_result();
                $query->close();                

                $this->close_db();

                return $result7;

            }

            catch(Exception $e)

            {

                $this->close_db();

                throw $e;  

            }

        }

		public function RegistroResultadoFormulario($idcarac,$idDepar,$idOpcion,$evidencia,$docfalt,$problemas)
		{	
			try
			{
                $this->open_db();
               
				$query=$this->condb->prepare("CALL sp_RegistroResultadoFormulario(?,?,?,?,?,?)");
				$query->bind_param("dddsss",$idcarac,$idDepar,$idOpcion,$evidencia,$docfalt,$problemas);
					
			
				$query->execute();
				$query->get_result();	
				$query->close();				
				$this->close_db(); 
				
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function ActualizarResultadoFormulario($idresul,$idopcion,$evidencia,$docfalt,$problemas)

        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_UpdateResultadoFormulario(?,?,?,?,?)");

			$query->bind_param("ddsss",$idresul,$idopcion,$evidencia,$docfalt,$problemas);

                $query->execute();

                $query->close();                

                $this->close_db();
            }
            catch(Exception $e)
            {
                $this->close_db();

                throw $e;  
            }

        }

		public function InfoFormDepartamento($idcaract,$iddepart)

        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_InfoFormDepartamento(?,?)");

                    $query->bind_param("dd",$idcaract,$iddepart);

                $query->execute();

                $result8=$query->get_result();
                $query->close();                

                $this->close_db();

                return $result8;

            }

            catch(Exception $e)

            {

                $this->close_db();

                throw $e;  

            }

        }

		public function TablaResultadosForm($iddepart)

        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_TablaResultadosForm(?)");

                    $query->bind_param("d",$iddepart);

                $query->execute();

                $result8=$query->get_result();
                $query->close();                

                $this->close_db();

                return $result8;

            }

            catch(Exception $e)

            {

                $this->close_db();

                throw $e;  

            }

        }

		public function ResultadosaRevision($iddepart)

        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_ResultadosaRevision(?)");

                    $query->bind_param("d",$iddepart);

                $query->execute();
                $query->close();                
                $this->close_db();
            }

            catch(Exception $e)

            {

                $this->close_db();

                throw $e;  

            }

        }

		public function RespuestasContacto()

        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_RespuestasContacto()");

                $query->execute();

                $result8=$query->get_result();
                $query->close();                

                $this->close_db();

                return $result8;

            }

            catch(Exception $e)

            {

                $this->close_db();

                throw $e;  

            }

        }

		public function ActualizarEstadoFormulario()

        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_ActualizarEstadoFormulario()");

                $query->execute();

                $result9=$query->get_result();
				$estado="";
				while ($row = mysqli_fetch_array($result9)){  
				$estado=$row['Estado'];

				}   
                $query->close();                

                $this->close_db();

                return $estado;

            }

            catch(Exception $e)

            {

                $this->close_db();

                throw $e;  

            }

        }

		public function InfoPeriodo()

        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_InfoPeriodo()");

                $query->execute();

                $result10=$query->get_result();
                $query->close();                

                $this->close_db();

                return $result10;

            }

            catch(Exception $e)

            {

                $this->close_db();

                throw $e;  

            }

        }

		public function ActualizarPeriodoFormulario($inicio,$fin)
        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_PeriodoFormulario(?,?)");
					$query->bind_param("ss",$inicio,$fin);

                $query->execute();
			

                $resultperiodo=$query->get_result();
				
				$res="";
				while ($row = mysqli_fetch_array($resultperiodo)){
					
				$res=$row['res'];
				}   
                $query->close();                

                $this->close_db();

                return $res;

            }

            catch(Exception $e)

            {

                $this->close_db();

                throw $e;  

            }

        }

		

		public function EditarComponenteFormulario()

        {  

            try

            {

                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_InfoComponenteFormulario()");

                $query->execute();

                $resultcomp=$query->get_result();
                $query->close();                
                $this->close_db();

                return $resultcomp;

            }

            catch(Exception $e)

            {
                $this->close_db();
                throw $e;  
            }

        }

		public function InfoAtributoComponenteEditar($idcomponen)

        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_InfoAtributoComponenteEditar(?)");
                    $query->bind_param("d",$idcomponen);
                $query->execute();
                $resultcomped=$query->get_result();
                $query->close();                


                $this->close_db();

                return $resultcomped;

            }

            catch(Exception $e)

            {
                $this->close_db();
                throw $e;  
            }

        }

		public function TablaModificacionFormulario($idcaract)
        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_TablaModificacionFormulario(?)");
                    $query->bind_param("d",$idcaract);
                $query->execute();
                $resultabla=$query->get_result();
                $query->close();                

                $this->close_db();

                return $resultabla;

            }

            catch(Exception $e)

            {
                $this->close_db();
                throw $e;  
            }

        }

		public function ActualizarFormulario($id,$opcion,$val,$descrip,$evidencia)
        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_ActualizarFormulario(?,?,?,?,?)");
                    $query->bind_param("dssss",$id,$opcion,$val,$descrip,$evidencia);
                $query->execute();
				$resultact=$query->get_result();
                $query->close();                

                $this->close_db();
				return $resultact;

            }

            catch(Exception $e)

            {
                $this->close_db();
                throw $e;  
            }

        }


		
		public function ManejoUsuarios($id)
        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_ManejoUsuarios(?)");
                    $query->bind_param("d",$id);
                $query->execute();
				$resultusuarios=$query->get_result();
                $query->close();                

                $this->close_db();
				return $resultusuarios;

            }

            catch(Exception $e)

            {
                $this->close_db();
                throw $e;  
            }

        }


		public function ActualizarUsuario($id,$tel,$email,$direccion,$rol)
        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_ActualizarUsuario(?,?,?,?,?)");
                    $query->bind_param("sssss",$id,$tel,$email,$direccion,$rol);
                $query->execute();
				$query->get_result();
                $query->close();                

                $this->close_db();
            }

            catch(Exception $e)

            {
                $this->close_db();

                throw $e;  
            }

        }

        public function RespuestaenRevision($id)
        {  
            try

            {
                $this->open_db();

                    $query=$this->condb->prepare("CALL sp_RespuestasenRevision(?)");
                    $query->bind_param("d",$id);
                $query->execute();
				$respuestas=$query->get_result();
                $query->close();                

                $this->close_db();
                return $respuestas;
            }

            catch(Exception $e)

            {
                $this->close_db();
                throw $e;  
            }

        }
        public function ActualizarConsulta($id)
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_EstadoContacto(?)");
					$query->bind_param("i",$id);
					
			
				$query->execute();  	
				$query->close();				
				$this->close_db(); 
				    
              
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

        public function ComentarRespuesta($id,$evi,$doc,$prob)
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_ComentarRespuesta(?,?,?,?)");
					$query->bind_param("dsss",$id,$evi,$doc,$prob);
					
			
				$query->execute();  	
				$query->close();				
				$this->close_db(); 
              
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		
        public function ResultadosDepartamento()
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_ResultadosDepartamento()");
				$query->execute();  
				$result=$query->get_result();	
				$query->close();				
				$this->close_db(); 
              return $result;
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function PeriodosFormulario()
		{	
			try
			{
                $this->open_db();
               
				$query=$this->condb->prepare("SELECT * FROM revijarf_reviewme.PeriodosFormulario order by IdPeriodo asc limit 10 ");
				$query->execute();  
				$result=$query->get_result();	
				$query->close();				
				$this->close_db(); 
              return $result;
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function PeriodosFormularioCombo()
		{	
			try
			{
                $this->open_db();
               
				$query=$this->condb->prepare("SELECT * FROM revijarf_reviewme.PeriodosFormulario");
				$query->execute();  
				$result=$query->get_result();	
				$query->close();				
				$this->close_db(); 
              return $result;
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

		public function InfoComponentexPeriodo($idper,$iddepa)
		{	
			try
			{
                $this->open_db();
               
					$query=$this->condb->prepare("CALL sp_InfoComponentexPeriodo(?,?)");
					$query->bind_param("dd",$idper,$iddepa);
					$query->execute();
					$res=$query->get_result();
					
			
				  	
				$query->close();				
				$this->close_db();
				return $res; 
              
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e; 	
			}
			
		}

  


		
}
?>