{include file="header.tpl"}
<div class="row">
  <div class="col-md">
    <nav class="nav ">
      <a class="nav-link" href="../perifericos">Perifericos</a>
      <a class="nav-link" href="../categorias">Categorias</a>
      {if $permiso == "administrador"}
      <a class="nav-link" href="../permisos">Permisos</a>
      <a class="nav-link" href="../logout">Logout</a>
      {elseif $permiso == "usuario"}
      <a class="nav-link" href="../logout">Logout</a>
      {else}
      <a class="nav-link" href="../login">Login</a>
      {/if}
    </nav>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h1 class="card-title">{$nombre}</h1>
  </div>
</div>
{if $permiso == "administrador"}
<div class="card">
  <div class="card-header">
    <h1>Editar</h1>
  </div>
  <div class="card-body">
    <form action="../editarCategoria" method="post">
      <div class="form-group">
        <label for="nombre">Tipo</label>
        <input type="text" class="form-control" name="nombre" value="{$nombre}" placeholder="Tipo">
      </div>
      <button type="submit" class="btn btn-primary" value="{$id_categoria}" name="id_categoria">Editar</button>
    </form>
  </div>
</div>
{/if}
{include file="footer.tpl"}
