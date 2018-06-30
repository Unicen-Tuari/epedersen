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
    <h1 class="card-title">{$marca}</h1>
    <p class="card-text">{$descripcion}</p>
    <p class="card-text">Tipo: {$tipo['nombre']}</p>
  </div>
</div>
{if $permiso == "administrador"}
<div class="card">
  <div class="card-header">
    <h1>Editar</h1>
  </div>
  <div class="card-body">
    <form action="../editarPeriferico" method="post">
      <div class="form-group">
        <label for="marca">Marca</label>
        <input type="text" class="form-control" name="Marca" value="{$marca}" placeholder="Marca">
      </div>
      <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" name="Titulo" value="{$titulo}" placeholder="Titulo">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" name="Descripcion" value="{$descripcion}" placeholder="Descripcion">
      </div>
      <div class="form-group">
        <label for="tipo">Tipo</label>
        <select class="form-control"  name="id_tipo">
          {foreach from=$tipos item=$type}
          {if ($type['id'] == $id_tipo)}
            <option value="{$type['id']}" selected>{$type['nombre']}</option>
          {else}
            <option value="{$type['id']}">{$type['nombre']}</option>
          {/if}
          {/foreach}
        </select>
      </div>
      <button type="submit" class="btn btn-primary" value="{$id_periferico}" name="id_periferico">Editar</button>
    </form>
  </div>
</div>
{/if}
{include file="footer.tpl"}
