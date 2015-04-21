   <title>FLmail Registro</title>
 </head>
 <body>
	 <div id="contenedor_registro">
 	  	<h1 id="centrar">Registrarse</h1>
 	  	<form action="/CodeIgniter/usuario/registrar" method="post" accept-charset="utf-8">
            <label for="nombre">Nombre:</label>
            <input type="text" size="20" id="nombrereg" name="nombre" class = "inputreg" autofocus required/>
     		<br>
            <label for="usuario">Usuario:</label>
     		<input type="text" size="20" id="usuarioreg" name="usuario" placeholder="ejemplo@flmail.com" class = "inputreg" required/>
     		<br/>
     		<label for="contrasena">Contraseña:</label>
     		<input type="password" size="20" id="contrasenareg" name="password" placeholder="Contraseña" required/>
     		<br/>
            <label for="email">Correo:</label>
            <input type="email" size="20" id="emailreg" name="email" placeholder="ejemplo@ejemplo.com" required/>
            <br/>
        	<input type="submit" value="Registrarse" id = "registrar" class="btn btn-primary"/>
   		</form>
        <p id="loginfail">Usuario o correo duplicados</p>
 	 </div>
 	</body>
</html>