{include file="header.tpl"}

<h1 class="title">Detalles de {$resource->recurso|lower}</h1>
<p>Época de germinación: 
{if {$resource->germinacion}}
    {$resource->germinacion}
{else} --
{/if}
</p>
<p>Zona donde se encuentra: {$resource->zona}</p>

{include file="redirectHome.tpl"}
{include file="footer.tpl"}