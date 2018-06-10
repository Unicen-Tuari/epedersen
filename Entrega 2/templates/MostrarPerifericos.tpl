{include file="header.tpl"}
<h1>Lista de Perifericos</h1>
<ul>
{foreach from=$perifericos item=periferico}
<li>
<a href="detalle/{$periferico['id']}">{$periferico['titulo']}</a>
</li>
{/foreach}
</ul>
<a href="crear">Crear Periferico</a>
{include file="footer.tpl"}
