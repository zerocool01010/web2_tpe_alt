<h3>Lista de recursos</h3>
<ul class="list-group list-group-flush">
    {foreach from=$resources item=$resource}
        <li class="list-group-item"><a href="details/{$resource->id_recurso}">{$resource->recurso} ({$resource->zona})</a>
        <input placeholder="Introduce tu reseña" type="text" id="review">
        <button type="submit" id="post">Enviar reseña!</button>
        </li>
    {/foreach}
</ul>