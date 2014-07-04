function graphic1(a1,a2,a3,a4,a5,a6){
  $.jqplot.config.enablePlugins = true;
  a1= parseInt(a1);
  a2= parseInt(a2);
  a3= parseInt(a3);
  a4= parseInt(a4);
  a5= parseInt(a5);
  a6= parseInt(a6);

        var data = [
        ['Radio: '+a1, a1],['Prensa: '+a2, a2],['Carteleras: '+a3,a3],['Visitas: '+a4,a4],['TV: '+a5,a5],['Otras: '+a6,a6]
        ];
         
      var  plot1 = $.jqplot('chart1', [data], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
  /*    animate: !$.jqplot.use_excanvas,
  */    title:"COMPARACION MEDIOS PUBLICITARIOS CON ESTUDIANTES UDB",     
    seriesDefaults:{
                renderer:$.jqplot.PieRenderer,
                rendererOptions:{
                  
                  showDataLabels:true,
                  /*sliceMargin:4,
                  fill: false,
                  lineWidth:5*/
            }
          },
             legend: {show:true,location:'e'}
      /*axesDefaults: {tickOptions: {
             fontSize: '14pt'}},
       
       axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },*/
        });
}
function graphic2(a1,a2,a3){
  var s1=a1.split(",");
  var s2=a2.split(",");
  var s3=a3.split(",");

  var i;
  for(i=0;i<s1.length;i++){
  s1[i]=parseInt(s1[i]);
  s2[i]=parseInt(s2[i]);

  }

  $.jqplot('chart2', [s1,s2], {
    animate: !$.jqplot.use_excanvas,
              seriesColors: ["#4D86C1" ,"#E7734A"],
   title:"Preferencia de Estudiantes hacia Carreras UDB",
    stackSeries: true,
    captureRightClick: true,
     seriesDefaults:{

      
       renderer:$.jqplot.BarRenderer,
     rendererOptions: {
          // Put a 30 pixel margin between bars.
  barDirection: 'horizontal',         

          // Highlight bars when mouse button pressed.
          // Disables default highlighting on mouse over.
            
      },
      pointLabels: { show: true, location: 'e', edgeTolerance: -5},
    },
     axesDefaults: {
        tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
        tickOptions: {
          angle: 30,
          fontSize: '8pt'
        }
    },  
       
       
       
                    axes: {
      xaxis:  {autoscale:true,
      
      },
      yaxis: {
         ticks:s3,
 renderer: $.jqplot.CategoryAxisRenderer
      }
    }   ,    legend: {
      show: true,
      location: 'we',
      placement: 'outside',
       labels:['OPCION 1','OPCION 2']
    } 
          
                });
}

function graphic3(a1,a2,a3){
  var s1=a1.split(",");
  var s2=a2.split(",");
  var s3=a3.split(",");

  var i;
  for(i=0;i<s1.length;i++){
  s1[i]=parseInt(s1[i]);
  s2[i]=parseInt(s2[i]);

  }

  $.jqplot('chart3', [s1,s2], {
    animate: !$.jqplot.use_excanvas,
              seriesColors: ["#4D86C1" ,"#E7734A"],
   title:"Preferencia de Estudiantes hacia Universidades",
    stackSeries: true,
    captureRightClick: true,
     seriesDefaults:{

      
       renderer:$.jqplot.BarRenderer,
     rendererOptions: {
          // Put a 30 pixel margin between bars.
    barDirection: 'horizontal',         

          // Highlight bars when mouse button pressed.
          // Disables default highlighting on mouse over.
            
      },
      pointLabels: { show: true, location: 'e', edgeTolerance: -5},
    },
     axesDefaults: {
        tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
        tickOptions: {
          angle: 30,
          fontSize: '8pt'
        }
    },  
       
       
       
                    axes: {
      xaxis:  {autoscale:true,
      
      },
      yaxis: {
         ticks:s3,
 renderer: $.jqplot.CategoryAxisRenderer
      }
    }   ,    legend: {
      show: true,
      location: 'we',
      placement: 'outside',
       labels:['OPCION 1','OPCION 2']
    } 
          
                });
}
function graphic4(a1,a2,a3,a4,a5,a6,a7){
  $.jqplot.config.enablePlugins = true;
  a1= parseInt(a1);
  a2= parseInt(a2);
  a3= parseInt(a3);
  a4= parseInt(a4);
  a5= parseInt(a5);
  a6= parseInt(a6);
  a7= parseInt(a7);
                 
      var  plot1 = $.jqplot('chart4', [[['Open House y Paquete: '+a1,a1],['Paquete y Matricula: '+a2,a2],['Matricula e Inscritos: '+a3,a3],['Solo Encuesta: '+a4,a4],['Solo Open House: '+a5,a5],['Solo Paquete: '+a6,a6],['Solo Matricula: '+a7,a7]]], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
    /*animate: !$.jqplot.use_excanvas,*/
    title:"COMPARACION PROCESOS REALIZADOS ENTRE ESTUDIANTES",      
    seriesDefaults:{
                /*renderer:$.jqplot.BarRenderer,*/
                renderer:$.jqplot.PieRenderer,
                rendererOptions:{
                  
                  showDataLabels:true,
                  sliceMargin:4,
                  fill: false,
                  lineWidth:5
                }
              },
               legend: {show:true,location:'e'}

               /*pointLabels: { show: true, location: 'wo', edgeTolerance: -5,   angle: 30,},
            },
      axesDefaults: {tickOptions: {
             fontSize: '14pt'}},
       */
      /* axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },*/
        });
}

function graphic5(v1)
{
  
  $(document).ready(function(){
  /*var line1=[['23-May-08', 578], ['20-Jun-08', 566], ['25-Jul-08', 480], ['22-Aug-08', 509],
      ['26-Sep-08', 454], ['24-Oct-08', 379], ['21-Nov-08', 303], ['26-Dec-08', 308],
        ['23-Jan-09', 299], ['20-Feb-09', 346], ['20-Mar-09', 325], ['24-Apr-09', 386]];*/
  //var now = new Date();
  //now =dateFormat(now, "dd-mmmm-yyyy");


  var line1=JSON.parse(v1);
    var plot1 = $.jqplot('chart5', [line1], {
        title:'Tendencia de Estudiantes en Open House a la Fecha',
        axes:{
          xaxis:{
            renderer:$.jqplot.DateAxisRenderer,
            tickOptions:{
              formatString:'%#d-%b-%Y', 
             
            } 
          },
          yaxis:{
            tickOptions:{
              formatString:''
              }
          }
        },
        highlighter: {
          show: true,
          sizeAdjust: 7.5
        },
        cursor: {
          show: false
        }
    });
  });
}
function graphic6(a1,a2,a3,a4,a5,a6,a7){
  $.jqplot.config.enablePlugins = true;
  a1= parseInt(a1);
  a2= parseInt(a2);
  a3= parseInt(a3);
  a4= parseInt(a4);
  a5= parseInt(a5);
  a6= parseInt(a6);
  a7= parseInt(a7);

        var data = [
        ['Radio: '+a1, a1],['Prensa: '+a2, a2],['TV: '+a3,a3],['Cartelera: '+a4,a4],['Visita: '+a5,a5],['Sitio Web: '+a6,a6],['Facebook: '+a7,a7]
        ];
         
      var  plot1 = $.jqplot('chart6', [data], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
  /*    animate: !$.jqplot.use_excanvas,
  */    title:"Comparacion Medios Publicitarios con Asistencia a Open House",     
      seriesDefaults:{
                  renderer:$.jqplot.PieRenderer,
                rendererOptions:{
                  
                  showDataLabels:true,
                  /*sliceMargin:4,
                  fill: false,
                  lineWidth:5*/
            }
          },
             legend: {show:true,location:'e'}
      /*axesDefaults: {tickOptions: {
             fontSize: '14pt'}},
       
       axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },*/
        });
}

function graphic7(a1,a2)
{
   $.jqplot.config.enablePlugins = true;
  a1= parseInt(a1);
  a2= parseInt(a2);

   var data = [['Visita: '+a1, a1],['Llamada: '+a2, a2]];
         
      var  plot1 = $.jqplot('chart7', [data], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
  /*    animate: !$.jqplot.use_excanvas,
  */    title:"Comparacion de Registros en Recepcion por Tipo de Contacto a la Fecha",     
      seriesDefaults:{
                  renderer:$.jqplot.PieRenderer,
                rendererOptions:{
                  
                  showDataLabels:true,
                  /*sliceMargin:4,
                  fill: false,
                  lineWidth:5*/
            }
          },
             legend: {show:true,location:'e'}
      /*axesDefaults: {tickOptions: {
             fontSize: '14pt'}},
       
       axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },*/
        });

}

function carreras(id,name){
  var id=id.split("|");
  var name=name.split("|");
  var carrera={};
  carrera = [{id:id[0], name:name[0]}];
  for(i=1;i<id.length;i++){
  id[i]=parseInt(id[i]);
  carrera = carrera.concat([{id:id[i], name:name[i]}]);
  }
  $("#input-local").tokenInput(carrera,
  { 
    hintText: "Escriba un término para la búsqueda",theme: "facebook",searchingText: "Buscando...",noResultsText: "Carrera No Encontrada..."});
    $("#token-input-input-local").attr("placeholder","Buscar Carreras");
  }

  function conteo(op){
      if(op==1){
        var carreras =$("#input-local").val();
          if(carreras!=""){
          carreras=carreras.replace(/,/g,"-");
          $("#load_emails").load("lector/get_emails_carreras/"+carreras);
          }else{
          $("#load_emails").html("<h3>Destinatarios:</h3><br/>0");
          }
      }else{
        if(document.email.c_all.checked){
          $("#load_emails").load("lector/get_all_emails");
        }else{
        conteo(1);
      }   
    }
  }
  function validations(){
     var asunto =$("#asunto").val();
        var destino =$("#input-local").val();
      if(destino!=""){
      if(asunto==""){
      if(confirm('Esta apunto de enviar un mensaje sin asunto ¿Desea Continuar?'))
      send();
     }else{
      send();
     }
     }else{
      alert("Por Favor escoja al menos una Carrera Destino");
     }
  }
  function send(){
      var oEditor = CKEDITOR.instances.msj;
      var contenido = oEditor.getData();
      $('#msj').val(contenido);
      if("")
      alert("Enviando Mensaje");
      document.email.submit();
  }
 function cargar_email(id,etapa,first){
  $("#content2").remove();
  $("#content").load("lector/email_customer/"+id+"/"+etapa+"/"+first);
 }

function back(first,etapa){
  $("#gestion").remove();
  $("#seleccion").html("<center><h1>Cargando...</h1><center/>");
  $("#seleccion").load("lector/start_gestion/"+etapa+"/"+first);

}
function load_gestion(){
      var gestionar =$("#select_gestion").val();
      var op;
      $("#select-etapa").remove();
      $("#seleccion").html("<center><h1>Cargando...</h1><center/>");
      $("#seleccion").load("lector/start_gestion/"+gestionar+"/"+op);
}
var cuenta=0;
function send_interaction(){
  var inf = $('#inf').val();
  if (inf=="")
  {
    alert("Debe Ingresar una Gestion");

  }
  else{
      if (cuenta == 0)
      {
      cuenta++;
      } else{
      var customerid = $('#customerid').val();
      
      var procesoid = $('#procesoid').val();
      var etapa = $('#etapa').val();
      var finalizar = $("#finalizar").is(":checked");
       if(finalizar){
        aux=1;
       }else{
        aux=0;
       }
       $.ajax({
      type: 'POST',
      url: 'lector/send_interaction', //petición al metodo send_interaction del controlador lector

     data: 'etapa='+etapa +'&'+ 'customerid='+customerid  +'&'+ 'inf='+inf  +'&'+ 'procesoid='+procesoid +'&'+'check='+aux, //Pasamos parametros x POS
      success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
       alert("Gestion Realizada Exitosamente");
     
             $("#content").load("lector/management_customer");
      }
      });
      }}
   }
$(document).ready(function() 
{
  
  //GRAFICAS

 $("#graphics").click(function()
   {
    $("#content2").hide();
    $("#content").show();
   $("#content").load("lector/all_graphics");
 });

       //$("#howenc").click(function()
         // {
           // $("#content").load("lector/graph1_model");
         //});
      //$("#opcarreras").click(function()
        //  {
          //  $("#content").load("lector/graph2_model");
         //});
      //$("#opuniv").click(function()
        //  {
          //  $("#content").load("lector/graph3_model");
         //});
      //$("#howopen").click(function()
        //  {
          //  $("#content").load("lector/graph4_model");
         //});

  //EMAILS
  $("#x_facultad").click(function()
    {
      $("#content2").hide();
      $("#content").show();
      $("#content").load("lector/emails_facultad");
    

   });
   $("#x_carrera").click(function()
    {
      $("#content2").hide();
      $("#content").show();
      $("#content").load("lector/emails_carrera");
   });
   $("#x_etapa").click(function()
    {
      $("#content2").hide();
      $("#content").show();
      $("#content").load("lector/emails_etapa");
   });


   $("#load_email").click(function()
    {
      var facultad =$("#select_facultades").val();
      $("#load_emails").load("lector/get_emails_facultad/"+facultad);
   });

   $("#load_email_etapa").click(function()
    {
      var etapa =$("#select_etapas").val();
      $("#load_emails").load("lector/get_emails_etapa/"+etapa);
   });


//GESTION
 $("#start_manage").click(function()
    {
      $("#content2").hide();
      $("#content").show();
      $("#content").load("lector/management_customer");
   });
$("#view_manage").click(function()
    {
      $("#content2").hide();
      $("#content").show();
      $("#content").load("lector/all_managements");
   });
 //$("#gestion").click(function()
   // {
     // var gestionar =$("#select_gestion").val();

//      $("#manage").load("lector/start_gestion/"+gestionar);
  // });
  });



