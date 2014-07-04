


<div data-role="page"  id="album-list"  tabindex="0" style="min-height: 346px;">
    <div data-role="header" data-position="fixed" data-theme="f">
        <h1>Pedidos Activos</h1>
        <a href="login/logout" data-rel="back" data-icon="delete" data-theme="a">Cerrar Sesi&oacute;n</a>
        <a href="#" onclick="window.location.reload()" data-icon="back" data-theme="a" data-iconpos="notext">Recargar</a>
    </div><!-- /header -->
    <div data-role="content">
        <ul id="list" class="touch" data-role="listview" data-icon="false" data-split-icon="delete" data-split-theme="d">           
<?php 
$ordenes='';
for($i=0; $i<count($id_mesa);$i++)
{
    $ordenes=$ordenes.'
    <li>
    <a href="#demo-mail">
    <h3>'.$mesa[$i].'</h3>
    <p class="topic"><strong>'.$alimento[$i].'</strong></p><p>'.$descripcion[$i].'</p>
    <p>' .$variante[$i].'</p>
    <p class="ui-li-aside"><strong>Precio: $'.$precio[$i].'</strong></p>
    </a>
    </li>';
}
echo $ordenes;
?>
<script type="text/javascript">

setInterval(ever4,5000);

</script>

 
 
