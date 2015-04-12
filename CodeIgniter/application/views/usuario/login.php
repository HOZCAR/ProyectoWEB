   <title>FLmail</title>
 </head>
 <body>
    <div id="contenedor_login">
      <h1 id="centrar">FLmail</h1>
        <form action="usuario/autentificar" method="post" accept-charset="utf-8">
          <label for="usuario">Usuario:</label>
          <input type="text" size="20" id="usuario" name="usuario" placeholder="Usuario" autofocus/>
          <br/>
          <label for="contrasena">Contraseña:</label>
          <input type="password" size="20" id="contrasena" name="contrasena" placeholder="Contraseña"/>
          <br/>
          <div id = "btnlogin">
            <input type="submit" value="Iniciar Sesion" id = "log" class="btn btn-primary"/>
            <input type="submit" value="Registrarse" class="btn btn-primary"/>
          </div>
        </form>
    </div>
  </body>
</html>