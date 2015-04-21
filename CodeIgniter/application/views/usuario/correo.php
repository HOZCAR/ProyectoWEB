   <title>Correos - FLmail</title>
 </head>
 <body>
	<header id="header">
		<form action="/CodeIgniter/usuario/salir" method="post" accept-charset="utf-8">
 			<input id ="btnsalir" type="submit" value="Salir" class="btn btn-primary btn-lg"/>
 		</form>
		<h1 id="costado">FLmail</h1>
		
	</header>
 	<div class="contenedor">
        <div class="titulo">Buzón</div>
        <div id="pestanas">
            <ul id="lista" onclick=	"/CodeIgniter/usuario/correo">
                <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>Salida</a></li>
                <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>Enviados</a></li>
            </ul>
        </div>
 
        <body onload="javascript:cambiarPestanna(pestanas,pestana1);">
 
        <div id="contenidopestanas">
            <div id="cpestana1">
                <?php foreach ($correosa as $correo) { ?>
                	
                	<?php echo $correo->contenido; ?>
                	
                <?php } ?>
            </div>
            <div id="cpestana2">
                <? foreach ($Correoenv as $correo) {
                	# code...
                }
                ?>
            </div>
    </div>

 </body>
</html>