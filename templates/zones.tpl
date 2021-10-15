{include file="header.tpl"}

<h2>Lista de zonas con recursos disponibles</h2>
<ul class="list-group list-group-flush">
    {foreach from=$zones item=$zone}
        <li class="list-group-item"><a href="resourcesPerZone/{$zone->id_zona}/{$zone->zona}">{$zone->zona}</a></li>
    {/foreach}
</ul>

{include file="redirectHome.tpl"}
{include file="footer.tpl"}