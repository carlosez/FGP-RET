<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {
	
	     function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
                $this->load->model('ret_model');

   	}
     public function help()
    {
        $this->load->view('admin/help');
    }
	public function index()
	{
		$this->load->library('session');
        $data=$this->session->all_userdata();
        if($data['NICKNAME']=='') redirect ();
        if($data['ID_TIPO']!=1) redirect("index.php/".$data['ID_TIPO']."");
        $this->load->view('templates/header');
        $categorias=$this->ret_model->extraer_categorias();
        $variantes=$this->ret_model->extraer_variantes();
        $alimentos=$this->ret_model->extraer_alimentos();
        $tipos=$this->ret_model->extraer_tipos();
        $cont1="0";
      foreach ($categorias->result() as $fila)
        {    

            $ID_CATEGORIA[$cont1]=$fila->ID_CATE;
            $CATEGORIA[$cont1]=$fila->NOMBRE_CATE;
            $cont1++;
        }
        $cont2="0";
        foreach ($variantes->result() as $fila)
        {    

            $ID_VARIANTE[$cont2]=$fila->ID_VARI;
            $VARIANTE[$cont2]=$fila->DESCRIP_VARI;
            $cont2++;
        }
        $cont3="0";
        foreach ($alimentos->result() as $fila)
        {    

            $ID_ALIMENTO[$cont3]=$fila->ID_ALI;
            $ALIMENTO[$cont3]=$fila->NOMBRE_ALI;
            $cont3++;
        }
        $cont4="0";
        foreach ($tipos->result() as $fila)
        {    

            $ID_TIPO[$cont4]=$fila->ID_TIPO;
            $TIPO[$cont4]=$fila->TIPO;
            $cont4++;
        }
        $data['idcategoria']=$ID_CATEGORIA;
        $data['categoria']=$CATEGORIA;
        $data['idvariante']=$ID_VARIANTE;
        $data['variante']=$VARIANTE;
        $data['idalimento']=$ID_ALIMENTO;
        $data['alimento']=$ALIMENTO;
        $data['idtipo']=$ID_TIPO;
        $data['tipo']=$TIPO;
		$this->load->view('admin/index',$data);
		$this->load->view('templates/footer');
	}
	public function insert_categoria()
	{
		$categoria=$_POST['nombre_categoria'];
		$data=$this->ret_model->insertar_categoria($categoria);
	}
    public function upload_format_img()
    {
        $config['upload_path'] = './imagenes/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '10000KB';
        $config['max_width']  = '2560';
        $config['max_height']  = '1200';
        $this->load->library('upload', $config);
        $this->upload->do_upload();
    }
    public function insert_alimento()
    {
        $this->load->model('ret_model');
        $this->upload_format_img();
        $select_categoria=$_POST['select_categoria'];
        $nombre_alimento=$this->input->post('nombre_alimento');
        $descripcion=$this->input->post('descripcion');
        $imagen=$this->input->post('imagen');
        $imagen=basename($imagen, ".jpg");
        $precio=$this->input->post('precio');
        $tiempo_min=$this->input->post('tiempo_min');
        $data=$this->ret_model->insertar_alimento($select_categoria,$nombre_alimento,$descripcion,$imagen,$precio,$tiempo_min);
    }
    public function insert_variante()
    {
        $variante=$_POST['nombre_variante'];
        $data=$this->ret_model->insertar_variante($variante);
    }
    public function insert_variantes_alimento()
    {
        $this->load->model('ret_model');
       $select_alimento=$_POST['select_alimento'];
        $select_variante=$_POST['select_variante'];
        $variantes=explode(",",$select_variante);
        $data=$this->ret_model->insertar_variantes_alimento($select_alimento,$variantes);

    }
    
    public function insert_usuario()
    {
        $estado_mesa="";
        $select_tipo=$_POST['select_tipo'];
        $nombre_usuario=$_POST['nombre_usuario'];
        $nickname=$_POST['nickname'];
        $password=md5($_POST['password']);
        $capacidad=$_POST['capacidad'];
        if ($select_tipo==2)
        {
            $estado_mesa="T";

        }
        else
        {
            $estado_mesa="F";
        }
        $data=$this->ret_model->insertar_usuario($select_tipo,$nombre_usuario,$nickname,$password,$capacidad,$estado_mesa);
    }
	

}//Fin de controlador Administrador