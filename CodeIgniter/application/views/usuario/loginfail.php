   <title>FLmail</title>
 </head>
 <body>
    <div id="contenedor_login">
      <h1 id="centrar">FLmail</h1>
        <form action="/CodeIgniter/usuario/autenticar" method="post" accept-charset="utf-8">
          <label for="usuario">Usuario:</label>
          <input type="text" size="20" id="usuario" name="usuario" placeholder="Usuario" autofocus required/>
          <br/>
          <label for="contrasena">Contraseña:</label>
          <input type="password" size="20" id="contrasena" name="contrasena" placeholder="Contraseña" required/>
          <br/>
            <input id = "btnlogin" type="submit" value="Iniciar Sesion" id = "log" class="btn btn-primary"/>
        </form>
        <form action="/CodeIgniter/usuario/registro" method="post" accept-charset="utf-8">
          <input id="btnregistro" type="submit" value="Registrarse" class="btn btn-primary"/>
        </form>
        <p id="loginfail">Usuario o contraseña Incorrecto <br> Cuenta no Activada</p>
    </div>
  </body>
</html>