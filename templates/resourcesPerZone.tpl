{include file="header.tpl"}
<h1>Recursos existentes en {$zone}</h1>
<ul class="list-group list-group-flush">
    {foreach from=$resources item=$resource}
        <li class="list-group-item"><a href="{BASE_URL}details/{$resource->id_recurso}">{$resource->recurso}</a></li>
    {/foreach}
</ul>

{include file="redirectHome.tpl"}
{include file="footer.tpl"}