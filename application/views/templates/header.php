<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>RET - Inc</title>
	
	<?php echo link_tag('style/ret.css');?>
	
	<!--link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" -->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" /> 
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> 
  <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script> 
</head> 
<body> 
 <script type="text/javascript"> 
 
 function acep()
{
    
    var nota = $("#nota").val();
    
    $.ajax
    ({ 
        type: "POST",
        url: "../../index.php/mesa/gracia2",
        data: 'nota='+nota,
        success: function(data) 
        {   
            var obj = jQuery.parseJSON(data);
            var bandera = obj.bandera;
            var msj     = obj.mensaje;

            switch(bandera)
            {
                case 1:
                    var modulo = obj.nivel;
                    location.href = modulo;
                    break;              
                }
        },
        
    });  
}
function preventa(id, nombre)
{
    nombre.replace(/"(?=[^\[]*\])/g, '');
    $.ajax
    ({ 
        type: "POST",
        url: "mesa/preventa",
        data: 'id='+id,
        success: function(data) 
        {   
            var obj = jQuery.parseJSON(data);
            var nom = obj.nombre;
            var idale = obj.idale;
            var cant= obj.cantidad;
            var cont= obj.cont;
            var total= obj.total;
            var script = "";
            for(var i = 0 ;i < cont ; i++)
            {
                script=script + "<li id='"+idale[i]+"'><a href='#'><h3>"+nom[i]+"</h3>("+cant[i]+")</a><a href='#' onclick='cancelarventa("+idale[i]+")'  class='delete'>Delete</a></li>";
            }
            
             $("#list1").empty ();
             $("#list1").append (script);
             $("#list1").listview ("refresh");
             $("#precio1").empty ();
             $("#precio1").append ('<li data-icon="false"><a href="#">Total a pagar $'+total+'</a></li>');
             $("#precio1").listview ("refresh");

        },
        
    }); 
    
}

function cancelarventa(id)
{
    $.ajax
    ({ 
        type: "POST",
        url: "mesa/cancelarventa",
        data: 'id='+id,
        success: function(data) 
        {   
            var obj = jQuery.parseJSON(data);
            var nom = obj.nombre;
            var idale = obj.idale;
            var cant= obj.cantidad;
            var cont= obj.cont;
            var total= obj.total;
            var script = "";
            for(var i = 0 ;i < cont ; i++)
            {
                script=script + "<li id='"+idale[i]+"'><a href='#'><h3>"+nom[i]+"</h3>("+cant[i]+")</a><a href='#'  onclick='cancelarventa("+idale[i]+")'   class='delete'>Delete</a></li>";
            }
            
             $("#list1").empty ();
             $("#list1").append (script);
             $("#list1").listview ("refresh");
             $("#precio1").empty ();
             $("#precio1").append ('<li data-icon="false"><a href="#">Total a pagar $'+total+'</a></li>');
             $("#precio1").listview ("refresh");
        },
        
    });
}
function verificar_salida()
{
  // var idventa= $("#idventa").val();
    
    $.ajax
    ({ 
        type: "POST",
        url: "mesa/verificacion",
        //data: 'idventa='+idventa,
        success: function(data) 
        {
           var obj = jQuery.parseJSON(data);
           var nom = obj.comida_servida;
           if (nom=="")
           {

           }
           else
           {
            alert("Gracias por esperar. Su "+nom+" sera llevado por uno de nuestros meseros en segundos"); 
           } 
        },
        error: function(xml,msg)
        {
        }
    });  
}
function ever1()
{
    location.href = "welcome";
//$("#sesion").load("../../recursos/conf/reload_session.php");
}
function ever2()
{
  location.href = "welcome";
//$("#sesion").load("../../recursos/conf/reload_session.php");
}
function ever3()
{
    location.href = "5";
//$("#sesion").load("../../recursos/conf/reload_session.php");
}
function ever4()
{
    location.href="3";
}
function comprar()
{
    $.ajax
    ({ 
        type: "POST",
        url: "mesa/comprar",

        success: function(data) 
        {   
            var obj = jQuery.parseJSON(data);
            var nom = obj.nombre;
            var idale = obj.idale;
            var cant= obj.cantidad;
            var cont= obj.cont;
            var total= obj.total;
            var script = "";
            for(var i = 0 ;i < cont ; i++)
            {
                script=script + "<li id='"+idale[i]+"'><a href='#'>"+nom[i]+"<span class='ui-li-count'>"+cant[i]+"</span></a></li>";
            }
             $("#list1").empty ();
             $("#list2").empty ();
             $("#list2").append (script);
             $("#list2").listview ("refresh");
             $("#precio1").empty ();
             $("#precio1").append ('<li data-icon="false"><a href="#">Total a pagar $'+total+'</a></li>');
             $("#precio1").listview ("refresh");
             $("#precio2").empty ();
             $("#precio2").append ('<li data-icon="false"><a href="#">Total a pagar $'+total+'</a></li>');
             $("#precio2").listview ("refresh");

        },
        
    });
}

function actualizar(idventa)
{
    
    $.ajax
    ({ 
        type: "POST",
        url: "mesero/actualizar_mesa",
        data: 'idventa='+idventa,
        success: function(data) 
        {  
            location.href = '4';
        }
        
    });  
}
/*
$(document).on("pageinit", function() {
    var nextId = 1;
    $("#add").click(function() {
        nextId++;
        var content = "<div data-role='collapsible' id='set" + nextId + "'><h3>Section " + nextId + "</h3> <ul id='list' class='touch' data-role='listview' data-icon='false' data-split-icon='delete' data-split-theme='d'></ul></div>";
        var content2 = "<li><a href='#demo-mail'><h3>Avery Walker</h3><p class='topic'><strong>Re: Dinner Tonight</strong></p><p>Sure, let's plan on meeting at Highland Kitchen at 8:00 tonight. Can't wait! </p><p class='ui-li-aside'><strong>4:48</strong>PM</p></a><a href='#' class='delete'>Delete</a></li><li><a href='#demo-mail'><h3>Amazon.com</h3><p class='topic'><strong>4-for-3 Books for Kids</strong></p><p>As someone who has purchased children's books from our 4-for-3 Store, you may be interested in these featured books.</p><p class='ui-li-aside'><strong>4:37</strong>PM</p></a><a href='#' class='delete'>Delete</a></li>";
        $("#set").append( content ).collapsibleset('refresh');
        $("#list").append( content2 ).listview('refresh');
    });
});*/

</script>

	