<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesa extends CI_Controller {
	
	 function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));   
	}
	
    public function index()
	{
		$this->load->model("ret_model");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
        $data=$this->session->all_userdata();
        
        if($data['NICKNAME']=='') redirect ();
        if($data['ID_TIPO']!=2) redirect("index.php/".$data['ID_TIPO']."");
		$this->load->view('templates/header');
		

		$query=$this->ret_model->categorias();
		 $cont="0";
      	foreach ($query->result() as $fila)
        {    

            $CATE[$cont]=$fila->NOMBRE_CATE;
            $IDCATE[$cont]=$fila->ID_CATE;
            $cont++;
        }
        
        $query1=$this->ret_model->cargar_alimentos();
		 $con1="0";
      	foreach ($query1->result() as $fila)
        {    

            $ID_ALIMENTO[$con1]=$fila->ID_ALI;
            $NOMBRE_ALIMENTO[$con1]=$fila->NOMBRE_ALI;
            $DESCRIPCION[$con1]=$fila->DESCRIPCION_ALI;
            $PRECIO_ALIMENTO[$con1]=$fila->PRECIO;
            $ICATE[$con1]=$fila->ID_CATE;
            $TIEMPO[$con1]=$fila->TIEMPO_PREPARACION;
            $img[$con1]=$fila->IMG_URL;
            $con1++;
        }

        
        $id_or=$data['ID_ORDEN'];
		$query2=$this->ret_model->cargarpreventa($id_or);
		$cont3="0"; 
      	foreach ($query2->result() as $fila)
        {    
            $nombre2[$cont3]=$fila->NOMBRE_ALI;
            $idale[$cont3]=$fila->ID_ALI;
            $cantidad[$cont3]=$fila->CANTIDAD;
            $cont3++;
        }


        $query3=$this->ret_model->cargarventa($id_or);
		$cont4="0"; 
      	foreach ($query3->result() as $fila)
        {    
            $nombre3[$cont4]=$fila->NOMBRE_ALI;
            $idale3[$cont4]=$fila->ID_ALI;
            $cantidad3[$cont4]=$fila->CANTIDAD;
            $cont4++;
        }
        
        $query4=$this->ret_model->total($id_or);
        foreach ($query4->result() as $fila)
        {    
            $total=$fila->total;
            
        }
        $query5=$this->ret_model->totalpagar($id_or);
        foreach ($query5->result() as $fila)
        {    
            $total2=$fila->total;
            
        }
        $data["total2"]=$total2;
        $data["total"]=$total;


        $data["nombre3"]=$nombre3;
        $data["idale3"]=$idale;
        $data["cantidad3"]=$cantidad3;
        $data["cont4"]=$cont4;

        $data["nombre2"]=$nombre2;
        $data["idale"]=$idale;
        $data["cantidad"]=$cantidad;
        $data["cont"]=$cont3;

		$data["id"]=$ID_ALIMENTO;
        $data["nombre"]=$NOMBRE_ALIMENTO;
        $data["descripcion"]=$DESCRIPCION;
        $data["precio"]=$PRECIO_ALIMENTO;
        $data["ca"]=$CATE;
        $data["idc"]=$IDCATE;

        $data["tiempo"]=$TIEMPO;
        $data["cateid"]=$ICATE;
        $data["imgurl"]=$img;
		$this->load->view('mesa/index',$data);
		$this->load->view('templates/footer');
	}
	public function welcome()
	{
        $this->load->model("ret_model");
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->library('session');
        $data=$this->session->all_userdata();
		if(isset($data['ID_ORDEN']))
                {
                    $id_usu=$data['ID_USUARIO'];
                    $this->ret_model->terminar_venta($id_usu);
                    $this->session->unset_userdata('ID_ORDEN');
                    
                    
                }
		$this->load->view('templates/header');
		
		$this->load->view('mesa/iniciar');
		$this->load->view('templates/footer');
	}
	public function comenzar()
	{
		$this->load->model("ret_model");
		$this->load->library('session');
        $data=$this->session->all_userdata();
        $id_usu=$data['ID_USUARIO'];
        $query = $this->ret_model->comenzar_venta($id_usu);
        foreach ($query->result() as $fila)
        {    
            $id_orden=$fila->ID_ORDEN;
        }
        $this->session->set_userdata('ID_ORDEN', $id_orden);
        $data=$this->session->all_userdata();
		redirect("index.php/2");
	}
	
	public function gracias1()
	{
		$this->load->model("ret_model");
		$this->load->library('session');
        $data=$this->session->all_userdata();

		$this->load->view('templates/header');
		$this->load->view('mesa/gracia1');
		$this->load->view('templates/footer');
	}
	public function rank()
	{
		$this->load->view('templates/header');
		$this->load->view('mesa/rank');
		$this->load->view('templates/footer');
	}
	public function gracia2()
	{
		$this->load->model("ret_model");
		$nota = $_POST["nota"];
		$this->load->library('session');
        $data=$this->session->all_userdata();
        $id_or=$data['ID_ORDEN'];
        $this->ret_model->calificar($id_or,$nota);
		$jsondata['bandera']    = 1;
		$jsondata['mensaje']    = $ali;
        $jsondata['nivel']    = "../../index.php/mesa/gracia22";
        
    echo json_encode($jsondata); 

	}
	public function gracia22()
	{
		$this->load->view('templates/header');
		
		$this->load->view('mesa/gracia2');
		$this->load->view('templates/footer');
	}
	public function preventa()
	{
		$id=$_POST['id'];

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model("ret_model");
        $data=$this->session->all_userdata();

        $id_or=$data['ID_ORDEN'];
     	$this->ret_model->activarpreventa($id,$id_or);

		$query=$this->ret_model->cargarpreventa($id_or);
		$cont="0"; 
      	foreach ($query->result() as $fila)
        {    
            $nombre[$cont]=$fila->NOMBRE_ALI;
            $idale[$cont]=$fila->ID_ALI;
            $cantidad[$cont]=$fila->CANTIDAD;
            $cont++;
        }
        $query4=$this->ret_model->total($id_or);
        foreach ($query4->result() as $fila)
        {    
            $total=$fila->total;
            
        }
        $data["total"]=$total;

        $data["nombre"]=$nombre;
        $data["idale"]=$idale;
        $data["cantidad"]=$cantidad;
        $data["cont"]=$cont;
     	echo json_encode($data);

	}
	public function cancelarventa()
	{
		$id=$_POST['id'];

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model("ret_model");
        $data=$this->session->all_userdata();

        $id_or=$data['ID_ORDEN'];
     	$this->ret_model->desacpreventa($id,$id_or);

		$query=$this->ret_model->cargarpreventa($id_or);
		$cont="0"; 
      	foreach ($query->result() as $fila)
        {    
            $nombre[$cont]=$fila->NOMBRE_ALI;
            $idale[$cont]=$fila->ID_ALI;
            $cantidad[$cont]=$fila->CANTIDAD;
            $cont++;
        }
        $query4=$this->ret_model->total($id_or);
        foreach ($query4->result() as $fila)
        {    
            $total=$fila->total;
            
        }
        $data["total"]=$total;

        $data["nombre"]=$nombre;
        $data["idale"]=$idale;
        $data["cantidad"]=$cantidad;
        $data["cont"]=$cont;
     	echo json_encode($data);
	}

	public function comprar()
	{
		$id=$_POST['id'];

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model("ret_model");
        $data=$this->session->all_userdata();

        $id_or=$data['ID_ORDEN'];
     	$this->ret_model->comprar($id_or);

		$query=$this->ret_model->cargarventa($id_or);
		$cont="0"; 
      	foreach ($query->result() as $fila)
        {    
            $nombre[$cont]=$fila->NOMBRE_ALI;
            $idale[$cont]=$fila->ID_ALI;
            $cantidad[$cont]=$fila->CANTIDAD;
            $cont++;
        }
        $query4=$this->ret_model->total($id_or);
        foreach ($query4->result() as $fila)
        {    
            $total=$fila->total;
            
        }
        $data["total"]=$total;

        $data["nombre"]=$nombre;
        $data["idale"]=$idale;
        $data["cantidad"]=$cantidad;
        $data["cont"]=$cont;
     	echo json_encode($data);
	}
    function verificacion()
    {
        $dato="";
       // $id=$_POST['idventa'];
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model("ret_model");
         $data=$this->session->all_userdata();

        $id_or=$data['ID_ORDEN'];
        $query=$this->ret_model->verificando($id_or);
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $dato=$row->NOMBRE_ALI;
                $dato2=$row->ID_VENTA;
            }
            
            $query2=$this->ret_model->cambiando($dato2);
        }
        $data["comida_servida"]=$dato;
            echo json_encode($data);
    }
}
