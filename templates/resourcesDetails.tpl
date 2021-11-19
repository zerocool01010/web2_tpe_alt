{include file="header.tpl"}

<h1 class="title">Detalles de {$resource->recurso|lower}</h1>
<p>Época de germinación: 
{if {$resource->germinacion}}
    {$resource->germinacion}
{else} --
{/if}
</p>
<p>Zona donde se encuentra: {$resource->zona}</p>
<form id="form">
<input placeholder="Introduce tu reseña de {$resource->recurso|lower}" type="text" size="110" id="review" name="review">
<button type="submit" id="post">Enviar reseña!</button>
<button type="submit" id="getAll">Ver reseñas anteriores!</button>
</form>
<ul id="list">
</ul>
{include file="js.tpl"}
{include file="redirectHome.tpl"}
{include file="footer.tpl"}