<script>

setInterval(ever3, 5000); //cada 30 sec llamará a la función
</script> 
<div data-role="page"  id="album-list" tabindex="0" style="min-height: 346px;">
    <div data-role="header" data-position="fixed" data-theme="f">
        <h1>Mesas Disponibles</h1>
        <a href="login/logout" data-rel="back" data-icon="delete" data-theme="a">Cerrar Sesi&oacute;n</a>
        <a href="#" onclick="window.location.reload()" data-icon="back" data-theme="a" data-iconpos="notext">Recargar</a>
    </div><!-- /header -->
    <div data-role="content" class="ui-content" role="main">
        <center>
             <img  src="<?php echo base_url(); ?>style/imagenes/food_banner.jpg" /> 
        </center>
        <ul id="list" class="touch" data-role="listview" data-icon="false" data-split-icon="delete" data-split-theme="d">           
<?php 
$ordenes='';
for($i=0; $i<count($nombre);$i++)
{
    if($estado[$i]=="T")
    {
        $ordenes=$ordenes.'
        <li>
        <a href="#demo-mail">
        <h3>'.$nombre[$i].'</h3>
        <p class="ui-li-aside"><strong>'.$capacidad[$i].' Personas</strong></p>
        </a>
        </li>';
    }
    else
    {
        $ordenes=$ordenes.'
        <li data-theme="b">
        <a href="#demo-mail">
        <h3>'.$nombre[$i].'</h3>
        <p>(Disponible)</p>
        <p class="ui-li-aside"><strong>'.$capacidad[$i].' Personas</strong></p>
        </a>
        </li>';
    }
	
}

echo $ordenes;
?>
        </ul>
    </div><!-- /content -->
    