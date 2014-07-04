<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recepcionista extends CI_Controller {
	
	public function __construct()
   {
      parent::__construct();
      $this->load->model('ret_model');
      $this->load->helper('url');
		$this->load->library('session');
   }
   public function help()
    {
        $this->load->view('mesero/help');
    }
	public function index()
	{
		
        $data=$this->session->all_userdata();
        if($data['NICKNAME']=='') redirect ();
        if($data['ID_TIPO']!=5) redirect("index.php/".$data['ID_TIPO']."");
        $this->load->view('templates/header');
        $query=$this->ret_model->mesas();
		 $cont="0";

      foreach ($query->result() as $fila)
        {    

            $nombre[$cont]=$fila->NOMBRE;
            $estado[$cont]=$fila->ESTADO_ORDEN;
            $capacidad[$cont]=$fila->CAPACIDAD_PERSONA_MESA;
            $cont++;
        }
        	$data["nombre"]=$nombre;
        	$data["estado"]=$estado;      
        	$data["capacidad"]=$capacidad;   
		$this->load->view('recepcionista/index',$data);
		$this->load->view('templates/footer');
	}

	public function actualizar_mesa()
	{
    $idventa=$_POST['idventa'];
     $query=$this->ret_model->actualizar_venta($idventa);  
	}
		
}