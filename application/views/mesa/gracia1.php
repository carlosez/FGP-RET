<script>

setInterval(ever1, 30000); //cada 30 sec llamará a la función
</script> 
<div data-role="page" id="page1">
    <div data-role="header" data-theme="f" class="ui-header ui-bar-f" role="banner">
        <h1 class="ui-title" role="heading" aria-level="1">RET</h1>
    </div>
    <div data-role="content">
        <div >
            <center>
                <img src="<?php echo base_url(); ?>style/imagenes/32.png"> 
            </center>
        </div>
        <marquee behavior="alternate">
            <h2>
                ¿Desea obtener un postre gratis calificando nuestra comida?
            </h2>
        </marquee>
        <center>
            <a data-role="button" data-inline="true" data-theme="b" href="#../mesa/rank"
            data-icon="check" data-iconpos="left">
                Aceptar
            </a>
            <a data-role="button" data-inline="true" data-theme="b" href="../mesa/welcome"
            data-icon="delete" data-iconpos="left">
                Cancelar
            </a>
        </center>
        <br>
    </div>
