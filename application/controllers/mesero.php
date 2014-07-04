<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesero extends CI_Controller {
	
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
        if($data['ID_TIPO']!=4) redirect("index.php/".$data['ID_TIPO']."");

		$this->load->view('templates/header');
		$query=$this->ret_model->ordenes_activas();
		 $cont="0";

      foreach ($query->result() as $fila)
        {    

            $ID_MESA[$cont]=$fila->ID_MESA;
            $MESA[$cont]=$fila->MESA;
            $ALIMENTO[$cont]=$fila->ALIMENTO;
            $DESCRIPCION[$cont]=$fila->DESCRIPCION;
            $PRECIO[$cont]=$fila->PRECIO;
            $CANTIDAD[$cont]=$fila->CANTIDAD;
            $VARIANTE[$cont]=$fila->VARIANTE;
            $ID_VENTA[$cont]=$fila->ID_VENTA;
            $cont++;
        }
        	$data["id_mesa"]=$ID_MESA;
        	$data["mesa"]=$MESA;      
        	$data["alimento"]=$ALIMENTO;          
        	$data["descripcion"]=$DESCRIPCION;
            $data["precio"]=$PRECIO;        
            $data["cantidad"]=$CANTIDAD;          
            $data["variante"]=$VARIANTE;
            $data["idventa"]=$ID_VENTA;
		$this->load->view('mesero/index',$data);
		$this->load->view('templates/footer');
	}

	public function actualizar_mesa()
	{
    $idventa=$_POST['idventa'];
     $query=$this->ret_model->actualizar_venta($idventa);  
	}
		
}