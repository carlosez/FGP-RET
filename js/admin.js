
$(document).ready(function() 
{
  $("#encuesta").click(function()
    {
      $("#content2").hide();
      $("#content").show();
      $("#content").load("digitador/ing_encuesta");
   });
   $("#helpd").click(function()
    {
      $("#content").hide();
      $("#content2").show();
      $("#content2").load("digitador/help");
   });
  $("#helpl").click(function()
    {
      $("#content").hide();
      $("#content2").show();
      $("#content2").load("lector/help");
   });
  $("#helpa").click(function()
    {
      $("#content").hide();
      $("#content2").show();
      $("#content2").load("administrador/help");
   });
  $("#helpr").click(function()
    {
      $("#content").hide();
      $("#content2").show();
      $("#content2").load("recepcionista/help");
   });

  $("#ingresar_encuesta").click(function()
    {
      $("#content2").hide();
      $("#content").show();
      $("#content").load("digitador/ing_encuesta");
   });

  $("#excel").click(function()
    {
      $("#content").load("administrador/excel");
      $("#content2").hide();
      $("#content").show();
   });

$("#subir").click(function()
    {
      $("#content2").hide();
      $("#content").show();
      $("#content").load("administrador/do_upload");
   });
$("#addopen").click(function()
    {
      $("#content").hide();
      $("#content2").show();
      $("#content2").load("administrador/addopen");
   });
$("#addcustomer").click(function()
    {
      $("#content").hide();
      $("#content2").show();
      $("#content2").load("recepcionista/ingresar_cliente");
   });


$("#btnconfyes").click(function()
    {
     $("#areyou").hide();
     $("#info").hide();
     $("#editar_info").show();
     $("#ingresar_info").hide();
   });
  $("#btnconfno").click(function()
    {
    $("#areyou").hide();
     $("#info").hide();
     $("#editar_info").hide();
     $("#ingresar_info").show();

   });

  $("#OH").click(function()
  {
  window.open("digitador/ing_openhouse")
  }); 
  
  $("#enviar").mouseover(function(){$(this).css("opacity","1");});

  $("#enviar").mouseout(function(){$(this).css("opacity","0.7");});


});


  