{include file="header.tpl"}
<div class="row">
  <div class="col-md">
    <nav class="nav ">
      <a class="nav-link" href="perifericos">Perifericos</a>
      <a class="nav-link" href="categorias">Categorias</a>
      {if $permiso == "administrador"}
      <a class="nav-link" href="permisos">Permisos</a>
      <a class="nav-link" href="logout">Logout</a>
      {elseif $permiso == "usuario"}
      <a class="nav-link" href="logout">Logout</a>
      {else}
      <a class="nav-link" href="login">Login</a>
      {/if}
    </nav>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h1 class="card-title">Lista de Categorias</h1>
    <ul class="list-group">
      {foreach from=$categorias item=categoria}
      <li class="list-group-item">
        {if $permiso == "administrador"}
        <a href="borrarCategoria/{$categoria['id']}" class="card-link"><button type="button" class="btn btn-primary btn-lg">Borrar</button></a>
        {/if}
        <a href="detalleCategoria/{$categoria['id']}" class="card-link">{$categoria['nombre']}</a>
      </li>
      {/foreach}
    </ul>
    {if $permiso == "administrador"}
    <a href="crearCategoria" class="btn btn-primary">Crear Categoria</a>
    {/if}
  </div>
</div>
{include file="footer.tpl"}
