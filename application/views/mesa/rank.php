

<div data-role="page" id="page1">
    <div data-role="header" data-theme="f" class="ui-header ui-bar-f" role="banner">
        <h1 class="ui-title" role="heading" aria-level="1">RET</h1>
    </div> 
    <div data-role="content">
        <br>
        <form action="">
            <h3>
                ¿Que tanto safisfecho está con el resultado de nuestra comida?
            </h3>
            <div data-role="fieldcontain">
                <label for="nota">
                    Calificación
                </label>
                <input id="nota" name="nota" type="range" name="slider" value="3" min="1" max="5"
                data-highlight="true">
            </div>
            <center>
                <a data-role="button" data-inline="true" data-theme="b" onclick="acep()">
                    Aceptar
                </a>
            </center>
        </form>
        <br>
    </div>