{include file="header.tpl"}
<div class="card">
  <div class="card-body">
    <h1 class="card-title">Lista de Perifericos</h5>
    <ul class="list-group">
      {foreach from=$perifericos item=periferico}
      <li class="list-group-item">
        <a href="borrar/{$periferico['id']}" class="card-link"><button type="button" class="btn btn-primary btn-lg">Borrar</button></a>
        <a href="detalle/{$periferico['id']}" class="card-link">{$periferico['titulo']}</a>
      </li>
      {/foreach}
    </ul>
    <a href="crear" class="btn btn-primary">Crear Periferico</a>
  </div>
</div>
{include file="footer.tpl"}
