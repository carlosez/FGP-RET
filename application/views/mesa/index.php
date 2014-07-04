<?php
$script='';

for($i=0; $i<count($ca);$i++)
{
    $script=$script.'<div data-role="collapsible" id="set1" data-collapsed="true">
                        <h3>'.$ca[$i].'</h3>
                        <ul id="list" class="touch" data-role="listview" data-icon="false" data-split-icon="plus" data-split-theme="d"> ';
    for($x=0; $x<count($id);$x++)
    {
        if($cateid[$x]==$idc[$i])
        {
            $nom='"'.$nombre[$x].'"';
            $script=$script."<li>
            <a href='#' class='cars' id='".$imgurl[$x]."'>
            <img  style='width:100px; top:15px; ' src='".base_url()."style/imagenes/".$imgurl[$x].".jpg'  alt='".$imgurl[$x].".'> 
            <h3>&nbsp;".$nombre[$x]."</h3>
            <p class='topic'><strong>&nbsp;".$descripcion[$x]."</strong></p><p>&nbsp;Tiempo: ".$tiempo[$x]." (h/m/s)</p>
            <p class='ui-li-aside'><strong>Precio: $".$precio[$x]."</strong></p>
            </a>
            <a id='append' onclick='preventa(".$id[$x].",".$nom.")'  >Agregar a Preventa</a>
            <input type='hidden' name='idventa' id='idventa' value='".$id[$x]."' />
            </li>";
        }
        
    }
    $script=$script.'</ul></div>';
}

$sc="";
            for($i =0 ;$i < $cont ; $i++)
            {
                $sc=$sc."<li id='".$idale[$i]."'><a href='#'><h3>".$nombre2[$i]."</h3>(".$cantidad[$i].")</a><a href='#' onclick='cancelarventa(".$idale[$i].")'  class='delete'>Delete</a></li>";
            }

$sc2="";
            for($i =0 ;$i < $cont4 ; $i++)
            {
                $sc2=$sc2."<li ><a href='#'>".$nombre3[$i]."<span class='ui-li-count'>".$cantidad3[$i]."</span></a></li>";
            }
?>

<div data-role="page" class="type-interior ui-page ui-body-c ui-page-active" id="album-list" tabindex="0" style="min-height: 346px;">
    <div data-role="header" data-theme="f" class="ui-header ui-bar-f" role="banner">
        <h1 class="ui-title" role="heading" aria-level="1">RET</h1>
        <a href="#left-panel" data-role="button" data-inline="true" data-theme="a" 
        data-icon="arrow-l" data-iconpos="left">
            Preventa
        </a>
        <a href="#right-panel" data-role="button" data-inline="true" data-theme="a" 
        data-icon="arrow-r" data-iconpos="right">
            Venta
        </a>
    </div> 
    <div data-role="content" class="ui-content" role="main">

        <center>
    <img  src="<?php echo base_url(); ?>style/imagenes/food_banner.jpg" /> 
    </center>
   <div data-role="collapsible-set" data-content-theme="d" id="se">
        <ul data-role="listview" data-divider-theme="b" data-inset="true">
             <li data-role="list-divider" role="heading">
                    MENU
            </li>
        </ul>
       <?php
        echo $script;
        ?>
        <!--ul data-role="listview">
            <li><a href="#" class="cars" id="food_banner"><img src="http://4.bp.blogspot.com/_oeQOzzonRQY/S60O9-s5xBI/AAAAAAAAAbQ/qiGsEjzmQz8/s1600/vuelve_pronto.gif" alt="BMW"><h2>BMW</h2><p>5 series</p></a></li>
            <li><a href="#" class="cars" id="landrover"><img src="http://4.bp.blogspot.com/_oeQOzzonRQY/S60O9-s5xBI/AAAAAAAAAbQ/qiGsEjzmQz8/s1600/vuelve_pronto.gif" alt="Land Rover"><h2>Land Rover</h2><p>Discovery 4</p></a></li>
            <li><a href="#" class="cars" id="tesla"><img src="http://4.bp.blogspot.com/_oeQOzzonRQY/S60O9-s5xBI/AAAAAAAAAbQ/qiGsEjzmQz8/s1600/vuelve_pronto.gif" alt="Tesla"><h2>Tesla</h2><p>Model S</p></a></li>
        <button type="button" data-icon="gear" data-theme="b" data-iconpos="right" data-mini="true" data-inline="true" id="add">Add</button>
    </ul-->
        

        </div>

<!--...................................................................................................................-->


</div>
<!--...................................................................................................................-->





<!--..................................................left-panel.................................................................-->
<div data-role="panel" id="left-panel" data-theme="b">

       <ul id="list1" class="touch" data-role="listview" data-icon="false" data-split-icon="delete" data-split-theme="d">
       <?php 
    
echo $sc;
    ?> 
    </ul>
    <div data-role="content">
        <a data-role="button"  onclick='comprar()'  data-theme="a" href="#page1"
        data-icon="check" data-iconpos="left">
            Comprar
        </a>
    </div>
    <ul id="precio1" data-role="listview" data-inset="true" data-theme="c">
            <li data-icon="false"><a href="#">Total a pagar $<?php echo $total; ?></a></li>
    </ul>
    </div>
<!--..................................................left-panel.................................................................-->



<!--..................................................right-panel.................................................................-->
     <div data-role="panel" id="right-panel" data-display="push" data-position="right"  data-theme="b">

    <ul id="list2" class="touch" data-role="listview" data-count-theme="c" data-inset="true">
       <?php 
    
      echo $sc2;
    ?> 
    </ul>
    <div >
        <a data-role="button" onclick="location.href = 'mesa/gracias1'"  data-theme="a" data-icon="check" data-iconpos="left"
       >
            Pagar
        </a>

    </div>
    <ul id="precio2" data-role="listview" data-inset="true" data-theme="c">
            <li data-icon="false"><a href="#">Total a pagar $<?php echo $total2; ?></a></li>
    </ul>
    </div>






<!--..................................................java.................................................................-->
<SCRIPT TYPE="text/javascript">
/*$("#append").bind ("click", function (event)
{

  $("#list1").append ("<li><a href='#'><h3>Avery Walker</h3><p class='topic'><strong>Re: Dinner Tonight</strong></p><p>Sure, let's plan on meeting at Highland Kitchen at 8:00 tonight. Can't wait! </p><p class='ui-li-aside'><strong>4:48</strong>PM</p></a><a href='#' class='delete'>Delete</a></li><li><a href='#'><h3>Amazon.com</h3><p class='topic'><strong>4-for-3 Books for Kids</strong></p><p>As someone who has purchased children's books from our 4-for-3 Store, you may be interested in these featured books.</p><p class='ui-li-aside'><strong>4:37</strong>PM</p></a><a href='#' class='delete'>Delete</a></li>");
  $("#list1").listview ("refresh");
});*/


setInterval(verificar_salida, 5000); 





$( document ).on( "pageinit", "#album-list", function() {
    $( ".cars" ).on( "click", function() {
        var target = $( this ),
            brand = target.find( "h3" ).html(),
            short = target.attr( "id" ),
            closebtn = '<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" data-shadow="false" data-iconshadow="false" class="ui-btn-right">Close</a>',
            header = '<div data-role="header"><h2>' + brand + '</h2></div>',
            img = '<img src="../style/imagenes/' + short + '.jpg" alt="' + brand + '" class="photo">',
            popup = '<div data-role="popup" id="popup-' + short + '" data-short="' + short +'" data-theme="none" data-overlay-theme="a" data-corners="false" data-tolerance="15">' + closebtn + header + img + '</div>';
        // Create the popup. Trigger "pagecreate" instead of "create" because currently the framework doesn't bind the enhancement of toolbars to the "create" event (js/widgets/page.sections.js).
        $.mobile.activePage.append( popup ).trigger( "pagecreate" );
        // Wait with opening the popup until the popup image has been loaded in the DOM.
        // This ensures the popup gets the correct size and position
        $( ".photo", "#popup-" + short ).load(function() {
            var height = $( this ).height(),
                width = $( this ).width();
            // Set height and width attribute of the image
            $( this ).attr({ "height": height, "width": width });
            // Open the popup
            $( "#popup-" + short ).popup( "open" );
            // Clear the fallback
            clearTimeout( fallback );
        });
        // Fallback in case the browser doesn't fire a load event
        var fallback = setTimeout(function() {
            $( "#popup-" + short ).popup( "open" );
        }, 2000);
    });
    // Set a max-height to make large images shrink to fit the screen.
    $( document ).on( "popupbeforeposition", ".ui-popup", function() {
        // 68px: 2 * 15px for top/bottom tolerance, 38px for the header.
        var maxHeight = $( window ).height() - 68 + "px";
        $( "img.photo", this ).css( "max-height", maxHeight );
    });
    // Remove the popup after it has been closed to manage DOM size
    $( document ).on( "popupafterclose", ".ui-popup", function() {
        $( this ).remove();
    });
});

</SCRIPT>
