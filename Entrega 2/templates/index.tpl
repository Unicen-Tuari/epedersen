{include file="header.tpl"}
<div class="row">
  <div class="col-md">
    <nav class="nav ">
      <a class="nav-link" href="perifericos">Periféricos</a>
      <a class="nav-link" href="categorias">Categorías</a>
    </nav>
  </div>
</div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form action="verificarUsuario" method="post">
            <div class="form-group">
              <label for="usuario">Usuario</label>
              <input type="email" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name ="password" placeholder="Password" required>
            </div>
            {if !empty($error) }
              <div class="alert alert-danger" role="alert">{$error}</div>
            {/if}
            <button type="submit" class="btn btn-default">Login</button>
            <a href="registrarse"><button type="button" class="btn btn-default">Registrarse</button></a>
          </form>
        </div>
      </div>
{include file="footer.tpl"}
