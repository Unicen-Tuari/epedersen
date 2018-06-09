<h1>Lista de Perifericos</h1>
<ul>
{foreach from=$perifericos item=periferico}
<li>
<a href="detalle/{$perifericos['id']}">{$periferico['descripcion']}</a>
</li>
{/foreach}
</ul>
