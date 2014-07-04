 <script type="text/javascript"> 
 function validar(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==13) {validar_usuario();}
}
 function validar_usuario()
{
    
    var nick = $("#nick").val();
    var pass = $("#pass").val();
    
    $.ajax
    ({ 
    	type: "POST",
        url: "index.php/login/redireccion",
        data: 'nick='+nick +'&'+ 'pass='+pass,
        success: function(data) 
        {   
            var obj = jQuery.parseJSON(data);
            var bandera = obj.bandera;
            var msj     = obj.mensaje;

            switch(bandera)
            {
                case 1:
                    var modulo = obj.nivel;
                    if(modulo == "index.php/2" )
                    {
                        location.href = "index.php/mesa/welcome";
                    }
                    else
                    {
                        location.href = modulo ;
                    }
                    
                    break;
                    
               default:
                    document.getElementById('mensaje_error_form_login').style.visibility='visible';
                        
                    break;
                }

        },
        error: function(xml,msg)
        {
            document.getElementById('mensaje_error_form_login').style.visibility='visible';
        }
    });  
}
</script>
<?php 

	?>
	<div data-role="page" class="type-interior ui-page ui-body-c ui-page-active" id="album-list" data-url="album-list" tabindex="0" style="min-height: 346px;">

	<!--div id="cuadro_login2"-->
	<?php 
	
	 
	$this->load->helper("form");
	$atrb = array('id' =>'cuadro_login2');
	echo form_open("index.php/login/redireccion",$atrb);
	?>
	

        
    <div data-role="content" class="ui-content" role="main">
        <div style=" text-align:center">
            <img style="width:1500px; " src="<?php echo base_url(); ?>style/imagenes/22.png">
        </div>
        <div data-role="fieldcontain">
            <label for="nick">
                Usuarios
            </label>
            <input name="nick" id="nick" placeholder="" value="" type="text">
        </div>
        <div data-role="fieldcontain">
            <label for="pass">
                Password
            </label>
            <input name="pass" id="pass" onkeypress="validar(event);" placeholder="" value="" type="password">
        </div>
        <input type="button" onclick="validar_usuario()" data-theme="b" value="Ingresar">
    </div>

        <div id="mensaje_error_form_login" style="visibility: hidden; color:red; font-size:15px;"><center>
         <h3>Usuario o Contrase&ntilde;a Incorrecta</h3>
          </center></div>
		
</form>
<!--/div-->



