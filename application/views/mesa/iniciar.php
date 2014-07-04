<div data-role="page" id="page0" >
    <div data-role="header" data-theme="f" class="ui-header ui-bar-f" role="banner">
        <h1 class="ui-title" role="heading" aria-level="1">RET</h1>
    </div>
    <div data-role="content">
        <div style=" text-align:center">
            <img id="bienvenido" style="width: 700px; " src="<?php echo base_url(); ?>style/imagenes/bienvenidos.gif">
        </div>
        <a id="ordene" data-role="button" data-ajax="false" data-theme="b" href="../mesa/comenzar">
            ¡ORDENE AQUÍ!
        </a>
</div>

<!--script type="text/javascript">

$(document).ready(function() 
{

$("#ordenar").click(function()
    {

      $("#page0").remove();
      $("#principal").load("mesa/menu");
   });
return false;
 });


</script-->