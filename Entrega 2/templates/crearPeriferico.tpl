{include file="header.tpl"}
<form action="guardarPeriferico" method="post">
  <div class="form-group">
    <label for="marca">Marca</label>
    <input type="text" class="form-control" name="Marca" value="" placeholder="Marca">
  </div>
  <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" name="Titulo" value="" placeholder="Titulo">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input type="text" class="form-control" name="Descripcion" value="" placeholder="Descripcion">
  </div>
  <div class="form-group">
    <label for="tipo">Tipo</label>
    <select class="form-control"  name="id">
      {foreach from=$tipos item=$tipo}
      <option value="{$tipo['id']}">{$tipo['nombre']}</option>
      {/foreach}
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
{include file="footer.tpl"}
