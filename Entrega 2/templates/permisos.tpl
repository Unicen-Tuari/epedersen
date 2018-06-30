{include file="header.tpl"}
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
        {if !empty($user) }
          {foreach from=$user item=usuario}
            <form class="form-inline" action="actualizarUsuario" method="post" >
              <div class="form-group mb-2">
                <input type="email" class="form-control" id="usuario" name="usuario" value="{$usuario.usuario}" placeholder="Usuario" required>
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <input type="number" class="form-control" name="admin" id="permiso" min="0" max="1" value="{$usuario.admin}">
              </div>
              <div class="form-group mb-2">
                <button type="submit" name="id" value="{$usuario.id_usuario}" class="btn btn-default">Actualizar</button>
              </div>
              <div class="form-group mb-2">
                <a href="borrarUsuario/{$usuario.id_usuario}"><button type="button" class="btn btn-outline-warning">Borrar</button></a>
              </div>
            </form>

          {/foreach}
        {/if}
        </div>
      </div>
{include file="footer.tpl"}
