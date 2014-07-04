$(document).ready(function() 
{
$("#paq").click(function()
   {
      
      $("#load").load("administrador/up_excel");
    });

$("#reg").click(function()
   {
      
      $("#load").load("administrador/up_matricula");
    });

$("#ins").click(function()
   {
      
      $("#load").load("administrador/up_inscritos");
    });

});


/*Funcion Ajax para subir excel de compra de paquetes*/

$(function() {
   $('#upload_file').submit(function(e) {
      e.preventDefault();
      $.ajaxFileUpload({
         url         :'./administrador/subirPaquete/', 
         secureuri      :false,
         fileElementId  :'userfile',
         dataType    : 'json',
         data        : {
         },
         success  : function (data,status)
         {
           if(data.status != 'error')
            {
               $('#er').hide();
               
            $('#files').html('<div style="color:black"><center><p>'+data.msg + '...</p>'+
'<p>Clientes Agregados: '+data.cli+'</p>'+
'<p>Paquetes Agregados: '+data.paq+'</p>'+
'</div>');
            }
            else
            {

            $('#files').html('<?php echo link_tag('+'style/menu_excel.css'+');?><center><div id="paquete"><p>'+data.msg + '...</p></div>');
            
            }
         }
      });
      return false;
   });
});

/*Funcion Ajax para subir excel de Matriculados*/

$(function() {
   $('#up_registro').submit(function(e) {
      e.preventDefault();
      $.ajaxFileUpload({
         url         :'./administrador/subirMatriculados/', 
         secureuri      :false,
         fileElementId  :'userfile',
         dataType    : 'json',
         data        : {
         },
         success  : function (data,status)
         {
           if(data.status != 'error')
            {
               $('#er').hide();
               
            $('#files_res').html('<div style="color:black"><center><p>'+data.msg + '...</p>'+
'<p>Clientes Actualizados: '+data.cli+'</p>'+
'<p>Matriculados Agregados: '+data.reg+'</p>'+
'</div>');
            }
            else
            {

               $('#files_res').html('<?php echo link_tag('+'style/index.css'+');?><center><div id="paquete"><p>'+data.msg + '...</p></div>');
            
            }
         }
      });
      return false;
   });
});


/*Funcion Ajax para subir excel de inscritos*/

$(function() {
   $('#up_inscrito').submit(function(e) {
      e.preventDefault();
      $.ajaxFileUpload({
         url         :'./administrador/subirInscritos/', 
         secureuri      :false,
         fileElementId  :'userfile',
         dataType    : 'json',
         data        : {
         },
         success  : function (data,status)
         {
           if(data.status != 'error')
            {
               $('#er').hide();
               
            $('#file_insc').html('<div style="color:black"><center><p>'+data.msg + '...</p>'+
'<p>Clientes Actualizados: '+data.cli+'</p>'+
'<p>Inscritos Agregados: '+data.insc+'</p>'+
'</div>');
            }
            else
            {

            $('#file_insc').html('<?php echo link_tag('+'style/menu_excel.css'+');?><center><div id="paquete"><p>'+data.msg + '...</p></div>');
            
            }
         }
      });
      return false;
   });
});


