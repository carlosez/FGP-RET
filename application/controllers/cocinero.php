<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cocinero extends CI_Controller {

	public function __construct()
   {
      parent::__construct();
      $this->load->model('ret_model');
      $this->load->helper('url');
        $this->load->library('session');
   }	
	public function index()
	{
		
        $data=$this->session->all_userdata();
      /*  if($data['USER_NAME']=='') redirect ('index.php/login');
        if($data['USER_TYPE_ID']!=3) redirect("index.php/".$data['USER_TYPE_ID']."");*/
		$this->load->view('templates/header');
    $query=$this->ret_model->pedidos_en_proceso();
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
		$this->load->view('cocinero/index',$data);
		$this->load->view('templates/footer');

        if(isset($data['bandera']))
        {
            if($data['bandera']=='1')
            {
                $this->load->view('cocinero/prueba');
            }
        }
	}


		
	
}
?>