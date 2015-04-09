   <title>FLmail Registro</title>
 </head>
 <body>
	 <div id="contenedor_registro">
 	  	<h1>Registrarse</h1>
 	  	<form action="usuario/autentificar" method="post" accept-charset="utf-8">
            <label for="nombre">Nombre:</label>
            <input type="text" size="20" id="nombrereg" name="nombre" class = "inputreg" autofocus/>
     		<br>
            <label for="usuario">Usuario:</label>
     		<input type="text" size="20" id="usuarioreg" name="usuario" placeholder="ejemplo@flmail.com" class = "inputreg"/>
     		<br/>
     		<label for="contrasena">Contraseña:</label>
     		<input type="password" size="20" id="contrasenareg" name="contrasena" placeholder="Contraseña"/>
     		<br/>
            <label for="email">Correo:</label>
            <input type="email" size="20" id="emailreg" name="email" placeholder="ejemplo@ejemplo.com"/>
            <br/>
        	<input type="submit" value="Registrarse" id = "registrar" class="btn btn-primary"/>
   		</form>
 	 </div>
 	</body>
</html>