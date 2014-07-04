 <div data-role="header" data-theme="f" class="ui-header ui-bar-f" role="banner">
        <h1 class="ui-title" role="heading" aria-level="1">RET</h1>
        </div> 
<form>
    <fieldset data-role="collapsible" data-theme="c" data-content-theme="c">
        <legend>Agregar Categor&iacute;a de Menu</legend>
        <input type="text" required title ="Ingrese Categoria" name="nombre_categoria" id="nombre_categoria" placeholder="Inserte un nombre de categor&iacute;a" value="">
        <a id="a_categoria" data-role="button" data-inline="true" data-transition="none"
        data-theme="b" href="#" data-icon="check" data-iconpos="right">
            Agregar
        </a>
    </fieldset>
</form>
 <form>
    <fieldset data-role="collapsible" data-theme="c" data-content-theme="c">
        <legend>Agregar Alimentos a Categor&iacute;a</legend>
        <select name="select_categoria" id="select_categoria" data-native-menu="false"  data-theme="b" data-inline="true">
        <option value="" >Nombre de Categoria a la que pertenece</option>
        <?php 
        $select='';
        for($x=0; $x < count($idcategoria);$x++)
    {
        $select=$select.'<option value="'.$idcategoria[$x].'">'.$categoria[$x]."</option>";
    }
    echo $select;
        ?>
    </select>
     <input type="text" name="nombre_alimento" id="nombre_alimento" placeholder="Nombre del Alimento" value="">
    <textarea cols="40" rows="8" name="textarea-1" id="descripcion" placeholder="Descripci&oacute;n del Alimento"></textarea>
     <label for="file1">Imagen del Alimento:</label>
     <input type="file" data-clear-btn="false" name="imagen" id="imagen" >
     <input type="text" name="precio" id="precio" placeholder="Precio en dólares" value="">
     <input type="number" data-clear-btn="true" name="tiempo_min" pattern="[0-9]*" id="tiempo_min" value="" placeholder="Tiempo de Preparaci&oacute;n en Minutos">
        <a id="a_alimento" data-role="button" data-inline="true" data-transition="none"
        data-theme="b" href="#" data-icon="check" data-iconpos="right">
            Agregar
        </a>
    </fieldset>
</form>
<form>
    <fieldset data-role="collapsible" data-theme="c" data-content-theme="c">
        <legend>Agregar Variante</legend>
        <input type="text" required title ="Ingrese Categoria" name="nombre_variante" id="nombre_variante" placeholder="Inserte una Variante" value="">
        <a id="a_variante" data-role="button" data-inline="true" data-transition="none"
        data-theme="b" href="#" data-icon="check" data-iconpos="right">
            Agregar
        </a>
    </fieldset>
</form>
<form>
    <fieldset data-role="collapsible" data-theme="c" data-content-theme="c">
        <legend>Agregar Variantes a un Alimento</legend>
        <select name="select_alimento" id="select_alimento" data-native-menu="false"  data-theme="b" data-inline="true">
        <option value="" >Alimento</option>
        <?php 
        $select2='';
        for($j=0; $j < count($idalimento);$j++)
    {
        $select2=$select2.'<option value="'.$idalimento[$j].'">'.$alimento[$j]."</option>";
    }
    echo $select2;
        ?>
    </select>
     <select name="select_variante" id="select_variante" multiple="multiple" data-native-menu="false" data-icon="grid" data-iconpos="left" data-inline="true" data-theme="b">
        <option value="" >Variantes</option>
        <?php 
        $select3='';
        for($v=0; $v < count($idvariante);$v++)
    {
        $select3=$select3.'<option value="'.$idvariante[$v].'">'.$variante[$v]."</option>";
    }
    echo $select3;
        ?>
    </select>
        <a id="ali_variantes" data-role="button" data-inline="true" data-transition="none"
        data-theme="b" href="#" data-icon="check" data-iconpos="right">
            Agregar
        </a>
    </fieldset>
</form>
<form>
    <fieldset data-role="collapsible" data-theme="c" data-content-theme="c">
        <legend>Agregar Usuario</legend>
        <select name="select_tipo" id="select_tipo" data-native-menu="false"  data-theme="b" data-inline="true">
        <option value="" >Tipo de Usuario</option>
        <?php 
        $select='';
        for($u=0; $u < count($idtipo);$u++)
    {
        $select=$select.'<option value="'.$idtipo[$u].'">'.$tipo[$u]."</option>";
    }
    echo $select;
        ?>
    </select>
        <input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre Completo de Usuario" value="">
        <input type="text" name="nickname" id="nickname" placeholder="Nickname" value="">
        <input type="password" data-clear-btn="true" name="password" id="password" value="" placeholder="Contraseña" autocomplete="off">
        <input type="number" data-clear-btn="true" name="capacidad" class="capacidad" id="capacidad" placeholder="Capacidad de Personas en Mesa" value="">
        <a id="a_usuario" data-role="button" data-inline="true" data-transition="none"
        data-theme="b" href="#" data-icon="check" data-iconpos="right">
            Agregar
        </a></fieldset>
</form>
<ul data-role="listview" data-divider-theme="b" data-inset="true">

 <li data-theme="c" ><a href="login/logout" data-ajax="false" data-transition="slide">Cerrar Sesi&oacute;n</a></li>
<script type="text/javascript">
 $(document).ready(function() 
{
    $("#select_tipo").change(function(){
 
        if ($(this).val() == "2" ) {
 
            $(".capacidad").slideDown("fast"); 
 
        } else {
 
            $(".capacidad").slideUp("fast");    
 
        }
    });

     $("#a_usuario").click(function(){
        
        var select_tipo= $("#select_tipo").val();
        var nombre_usuario= $("#nombre_usuario").val();    
        var nickname= $("#nickname").val();
        var password= $("#password").val();
        var capacidad= $("#capacidad").val();
        if (select_tipo!="2")
        {
            capacidad="0";
        }
    
    if (nombre_variante=='')
    {
        alert("Debe ingresar un usuario");
    }
    else
    {
    $.ajax
    ({ 
        type: "POST",
        url: "administrador/insert_usuario",
        data: 'select_tipo='+ select_tipo + '&' + 'nombre_usuario='+nombre_usuario + '&' + 'nickname='+nickname + '&' + 'password='+password+ '&' + 'capacidad='+capacidad ,
        success: function(data) 
        {
            location.reload();
        },
        error: function(xml,msg)
        {

        }
    });
    }  
    });

    
    $("#ali_variantes").click(function(){
        
        var select_alimento= $("#select_alimento").val();    
        var select_variante= $("#select_variante").val();
        //var select_variante=select_variante.split(",");  
    
    if (nombre_variante=='')
    {
        alert("Debe ingresar una variante");
    }
    else
    {
    $.ajax
    ({ 
        type: "POST",
        url: "administrador/insert_variantes_alimento",
        data: 'select_alimento='+ select_alimento + '&' + 'select_variante='+select_variante,
        success: function(data) 
        {
            location.reload();
        },
        error: function(xml,msg)
        {
            alert();
        }
    });
    }  
    });

     $("#a_variante").click(function(){
            
        var nombre_variante= $("#nombre_variante").val();   
    
    if (nombre_variante=='')
    {
        alert("Debe ingresar una variante");
    }
    else
    {
    $.ajax
    ({ 
        type: "POST",
        url: "administrador/insert_variante",
        data: 'nombre_variante='+nombre_variante,
        success: function(data) 
        {
            location.reload();
        },
        error: function(xml,msg)
        {
        }
    });
    }  
    });

    $("#a_categoria").click(function(){
            
        var nombre_categoria= $("#nombre_categoria").val();   
    
    if (nombre_categoria=='')
    {
        alert("Debe ingresar una categoria");
    }
    else
    {
    $.ajax
    ({ 
        type: "POST",
        url: "administrador/insert_categoria",
        data: 'nombre_categoria='+nombre_categoria,
        success: function(data) 
        {
            location.reload();
        },
        error: function(xml,msg)
        {
        }
    });
    }  
    });

    $("#a_alimento").click(function(){
        var select_categoria= $("#select_categoria").val();
         var nombre_alimento= $("#nombre_alimento").val();
          var descripcion= $("#descripcion").val();
           var imagen= $("#imagen").val();
            var precio= $("#precio").val();
             var tiempo_min= $("#tiempo_min").val();
             tiempo_min='00:'+tiempo_min+':00';
   if (select_categoria=='')
    {
        alert("Debe completar los campos");
    }
    else
    {
    $.ajax
    ({ 
        type: "POST",
        url: "administrador/insert_alimento",
        data: 'select_categoria='+select_categoria +'&'+ 'nombre_alimento='+nombre_alimento +'&'+ 'descripcion='+descripcion +'&'+ 'imagen='+imagen +'&'+ 'precio='+precio +'&'+ 'tiempo_min='+tiempo_min,
        success: function(data) 
        {

            location.reload();
        },
        error: function(xml,msg)
        {
        }
    });
    }
    });


});


</script>