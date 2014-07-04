<?php
class RET_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }
/*---------------------MESA----------------------*/
   public function comprobar_usuario($nick, $pass)
   {  $password=md5($pass);
      $query = $this->db->get_where('usuario', array('NICKNAME' => $nick,'PASSWORD' => $password));
      return $query->row_array();
   }

   public function categorias()
   {
      
     $query = $this->db->query('SELECT * FROM `categoria`');
   
     return $query;
   }
   public function cargar_alimentos()
   {
       $query = $this->db->query('SELECT * FROM `alimento_menu` ');
      return $query;

   }

   public function comenzar_venta($id_usuario)
   {
      $this->db->query('INSERT INTO `iniciar_orden`(`ID_ORDEN`, `ID_USUARIO`) VALUES ("","'.$id_usuario.'")');
      $this->db->query('UPDATE `usuario` SET `ESTADO_ORDEN`="T" WHERE `ID_USUARIO`= "'.$id_usuario.'"');
      $query = $this->db->query('SELECT `ID_ORDEN` FROM `iniciar_orden` WHERE `ID_USUARIO` = "'.$id_usuario.'" order by `ID_ORDEN` ASC');
      return $query;
   }
   public function terminar_venta($id_usuario)
   {
      $this->db->query('UPDATE `usuario` SET `ESTADO_ORDEN`="F" WHERE `ID_USUARIO`= "'.$id_usuario.'"');
      return true;
   }
   public function calificar($id,$nota)
   {
      $query = $this->db->query('SELECT `ID_ALI` FROM `control_venta` WHERE `ID_ORDEN`= "'.$id.'"');
      foreach ($query->result() as $fila)
        {    
            $ali=$fila->ID_ALI;
            $this->db->query('INSERT INTO `comentario_alimento`(`ID_COMEN_ALI`, `ID_ALI`, `COMENTARIO`) VALUES ("","'.$ali.'","'.$nota.'")');
        }
      return $query;
   }
   public function cargarvariante($id)
   {
    $query = $this->db->query('SELECT   T1.NOMBRE_ALI ALIMENTO,
                                        T3.ID_VARI ID_VARIANTE,
                                        T3.DESCRIP_VARI VARIANTE
                                        FROM alimento_menu T1 INNER JOIN alimento_variante T2 ON T1.ID_ALI=T2.ID_ALI
                                        INNER JOIN menu_variante T3 ON T2.ID_VARI=T3.ID_VARI
                                        WHERE T1.ID_ALI="'.$id.'"');
      return $query;
   }
   public function cargarpreventa($id)
   {
    $query = $this->db->query('SELECT control_venta.ID_ALI ID_ALI, alimento_menu.NOMBRE_ALI NOMBRE_ALI, control_venta.CANTIDAD CANTIDAD
                                FROM alimento_menu RIGHT JOIN control_venta ON alimento_menu.ID_ALI = control_venta.ID_ALI
                                WHERE control_venta.ESTADO_PREVENTA="T"  and control_venta.ESTADO_VENTA = "F"  and control_venta.ID_ORDEN="'.$id.'"');
      return $query;
   }
   public function cargarventa($id)
   {
    $query = $this->db->query('SELECT control_venta.ID_ALI ID_ALI, alimento_menu.NOMBRE_ALI NOMBRE_ALI, control_venta.CANTIDAD CANTIDAD
                                FROM alimento_menu RIGHT JOIN control_venta ON alimento_menu.ID_ALI = control_venta.ID_ALI
                                WHERE control_venta.ESTADO_PREVENTA="T"  and control_venta.ESTADO_VENTA = "T"  and control_venta.ID_ORDEN="'.$id.'"');
      return $query;
   }
   public function activarpreventa($id,$id_or)
   {
    $cont="1";
    $query = $this->db->query('SELECT `CANTIDAD` FROM `control_venta` WHERE `ESTADO_PREVENTA` = "T" and `ESTADO_VENTA` = "F" and  `ID_ALI` = "'.$id.'" and `ID_ORDEN`="'.$id_or.'"');
    foreach ($query->result() as $fila)
        {    
            $cont=$fila->CANTIDAD;
            $cont++;
        }
    if($cont == "1")
    {
        $this->db->set('ID_ALI', $id);
        $this->db->set('ID_ORDEN', $id_or);
        $this->db->set('CANTIDAD', '1');
        $this->db->set('ESTADO_SERVIDO', 'F');
        $this->db->set('ESTADO_PREVENTA', 'T');
        $this->db->set('ESTADO_VENTA', 'F');
        $this->db->set('MENSAJE', 'F');
        $this->db->insert('control_venta');
    }
    else
    {
        $query = $this->db->query('UPDATE `control_venta` SET `CANTIDAD`="'.$cont.'" WHERE `ESTADO_PREVENTA` = "T" and `ESTADO_VENTA` = "F" and  `ID_ALI` = "'.$id.'" and `ID_ORDEN`="'.$id_or.'"');
    }
    
    return true; 
   }
   
   public function desacpreventa($id,$id_or)
   {
    $cont="1";
    $query = $this->db->query('SELECT `CANTIDAD` FROM `control_venta` WHERE  `ESTADO_PREVENTA` = "T" and `ESTADO_VENTA` = "F"  and  `ID_ALI` = "'.$id.'" and `ID_ORDEN`="'.$id_or.'"');
    foreach ($query->result() as $fila)
        {    
            $cont=$fila->CANTIDAD;
            $cont--;
        }
    if($cont == "0")
    {
        $query = $this->db->query('UPDATE `control_venta` SET `ESTADO_PREVENTA` = "F" WHERE `ESTADO_PREVENTA` = "T" and `ESTADO_VENTA` = "F"  and  `ID_ALI` = "'.$id.'" and `ID_ORDEN`="'.$id_or.'"');
    }
    else
    {
        $query = $this->db->query('UPDATE `control_venta` SET `CANTIDAD`="'.$cont.'" WHERE `ESTADO_PREVENTA` = "T" and `ESTADO_VENTA` = "F" and  `ID_ALI` = "'.$id.'" and `ID_ORDEN`="'.$id_or.'"');
    }
    
    return true; 
   }
   public function comprar($id)
   {
    
        $query = $this->db->query('UPDATE `control_venta` SET `ESTADO_VENTA` = "T" WHERE `ESTADO_PREVENTA` = "T"  and `ID_ORDEN`="'.$id.'"');

    return true; 
   }
   public function verificando($id)
        {
          $query = $this->db->query('SELECT T2.NOMBRE_ALI , T1.ID_VENTA
                                    FROM control_venta T1
                                    INNER JOIN alimento_menu T2 ON T1.ID_ALI = T2.ID_ALI
                                    WHERE T1.MENSAJE =  "T" AND T1.ESTADO_SERVIDO="T"
                                    AND T1.ID_ORDEN =  "'.$id.'"');
        return $query;
        }
    public function cambiando($id)
    {
           $data = array(
               'MENSAJE' => 'F',
               );
    $this->db->where('ID_VENTA', $id);
    $this->db->update('CONTROL_VENTA', $data);
    return true;

    }
    public function total($id)
    {
      $query = $this->db->query('SELECT Sum(alimento_menu.PRECIO*control_venta.CANTIDAD) AS total
                               FROM alimento_menu RIGHT JOIN control_venta ON alimento_menu.ID_ALI = control_venta.ID_ALI
                               WHERE control_venta.ID_ORDEN="'.$id.'" and control_venta.ESTADO_PREVENTA="T"');
      return $query;
    }
    public function totalpagar($id)
    {
      $query = $this->db->query('SELECT Sum(alimento_menu.PRECIO*control_venta.CANTIDAD) AS total
                               FROM alimento_menu RIGHT JOIN control_venta ON alimento_menu.ID_ALI = control_venta.ID_ALI
                               WHERE control_venta.ID_ORDEN="'.$id.'" and control_venta.ESTADO_PREVENTA="T" and control_venta.ESTADO_VENTA="T"');
      return $query;
    }
   /*-----------------------------Mesero----------------------------------------------------*/
   public function ordenes_activas()
   {
    $query = $this->db->query('SELECT   T1.ID_USUARIO ID_MESA,
                              T3.ID_VENTA ID_VENTA,
                              T1.NOMBRE MESA,
                              T3.CANTIDAD CANTIDAD,
                              T4.NOMBRE_ALI ALIMENTO,
                              T4.DESCRIPCION_ALI DESCRIPCION,
                              T4.PRECIO PRECIO
                              FROM usuario T1
                              INNER JOIN iniciar_orden T2 ON T1.ID_USUARIO=T2.ID_USUARIO
                              INNER JOIN control_venta T3 ON T2.ID_ORDEN=T3.ID_ORDEN
                              INNER JOIN alimento_menu T4 ON T3.ID_ALI=T4.ID_ALI
                              WHERE T1.ESTADO_ORDEN="T" AND T3.ESTADO_SERVIDO="F" AND T3.ESTADO_PREVENTA="T"  AND T3.ESTADO_VENTA="T"
                              ORDER BY ID_MESA ASC , T4.ID_CATE ASC , T4.NOMBRE_ALI ASC');
      return $query;
   }
   public function actualizar_venta($idventa)
   {

    $data = array(
               'ESTADO_SERVIDO' => 'T',
               'MENSAJE' => 'T',
               );
    $this->db->where('ID_VENTA', $idventa);
    $this->db->update('control_venta', $data);
    return true;
   }


/*-----------------------Cocinero-------------------------------------------------*/
   public function pedidos_en_proceso()
   {
    $query = $this->db->query('SELECT   T1.ID_USUARIO ID_MESA,
                              T3.ID_VENTA ID_VENTA,
                              T1.NOMBRE MESA,
                              T3.CANTIDAD CANTIDAD,
                              T4.NOMBRE_ALI ALIMENTO,
                              T4.DESCRIPCION_ALI DESCRIPCION,
                              T4.PRECIO PRECIO
                              FROM usuario T1
                              INNER JOIN iniciar_orden T2 ON T1.ID_USUARIO=T2.ID_USUARIO
                              INNER JOIN control_venta T3 ON T2.ID_ORDEN=T3.ID_ORDEN
                              INNER JOIN alimento_menu T4 ON T3.ID_ALI=T4.ID_ALI
                              WHERE T1.ESTADO_ORDEN="T" AND T3.ESTADO_SERVIDO="F" AND T3.ESTADO_VENTA="T"
                              ORDER BY ID_VENTA ASC');
      return $query;
   }
   public function mesas()
   {
      $query = $this->db->query('SELECT  `NOMBRE` ,  `ESTADO_ORDEN` ,  `CAPACIDAD_PERSONA_MESA` 
                                 FROM  `usuario` 
                                 WHERE  `ESTADO_MESA` =  "T" order by `CAPACIDAD_PERSONA_MESA`');
        return $query;
   }
   
   

/*---------------------admin----------------------------------------------*/
        public function insertar_categoria($categoria)
        {
          $this->db->set('NOMBRE_CATE', $categoria);
          $this->db->set('ESTADO_CATE', 'T');
            $this->db->insert('categoria');
        }
        public function extraer_categorias()
        {
          $query = $this->db->query('SELECT ID_CATE, NOMBRE_CATE FROM `categoria`');
              return $query;
        }
        public function extraer_variantes()
        {
          $query = $this->db->query('SELECT ID_VARI, DESCRIP_VARI FROM `menu_variante`');
              return $query;
        }
        public function extraer_alimentos()
        {
          $query = $this->db->query('SELECT ID_ALI, NOMBRE_ALI FROM `alimento_menu`');
              return $query;
        }
        public function extraer_tipos()
        {
          $query = $this->db->query('SELECT ID_TIPO, TIPO FROM `tipo_usuario`');
              return $query;

        }

        public function insertar_alimento($select_categoria,$nombre_alimento,$descripcion,$imagen,$precio,$tiempo_min)
        {
          $this->db->set('ID_CATE', $select_categoria);
          $this->db->set('NOMBRE_ALI', $nombre_alimento);
          $this->db->set('DESCRIPCION_ALI', $descripcion);
          $this->db->set('IMG_URL', $imagen);
          $this->db->set('PRECIO', $precio);
          $this->db->set('TIEMPO_PREPARACION', $tiempo_min);
          $this->db->set('ESTADO_ALI', 'T');
            $this->db->insert('alimento_menu');
            return true; 
        }
        public function insertar_variante($variante)
        {
          $this->db->set('DESCRIP_VARI', $variante);
            $this->db->insert('menu_variante');
        }
        public function insertar_variantes_alimento($select_alimento,$variantes)
        {
          for ($i=0;$i<count($variantes);$i++)
          {
            $this->db->set('ID_ALI', $select_alimento);
            $this->db->set('ID_VARI', $variantes[$i]);
            $this->db->insert('alimento_variante');
          }
        }
        public function insertar_usuario($select_tipo,$nombre_usuario,$nickname,$password,$capacidad,$estado_mesa)
        {
          $this->db->set('ID_TIPO', $select_tipo);
          $this->db->set('NOMBRE', $nombre_usuario);
          $this->db->set('NICKNAME', $nickname);
          $this->db->set('PASSWORD', $password);
          $this->db->set('ESTADO_ACTIVO', 'T');
          $this->db->set('ESTADO_ORDEN', 'F');
          $this->db->set('ESTADO_MESA', $estado_mesa);
          $this->db->set('CAPACIDAD_PERSONA_MESA', $capacidad);
            $this->db->insert('usuario');

        }

}
?>