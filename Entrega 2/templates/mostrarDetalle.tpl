{include file="header.tpl"}
<div class="card">
  <div class="card-body">
    <h1 class="card-title">{$marca}</h1>
    <p class="card-text">{$descripcion}</p>
    <p class="card-text">Tipo: {$tipo['nombre']}</p>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h1>Editar</h1>
  </div>
  <div class="card-body">
    <form action="editar" method="post">
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
{include file="footer.tpl"}
