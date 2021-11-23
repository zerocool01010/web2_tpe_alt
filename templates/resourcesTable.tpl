
<table class="table table-light table-hover">
    <thead>
        <th>Recurso</th>
        <th>Germinación</th>
        <th>Zona</th>
        <th>Imagen</th>
        {if $admin}
            <th></th>
            <th></th>
            <th>¿Eliminar imagen?</th>
        {/if}
    </thead>
    <tbody>
        {foreach from=$resources item=$resource}
            <tr>
                <td>{$resource->recurso}</td>
                {if !empty($resource->germinacion)}
                    <td>{$resource->germinacion}</td>
                {else}
                    <td>--</td> 
                {/if}
                <td>{$resource->zona}</td>
                {if $resource->imagen}
                    <td>Sí</td>
                {else}
                    <td>No</td>
                {/if}
                {if $admin}
                    <td><a href="{BASE_URL}getUpdate/resource/{$resource->id_recurso}">Modificar</a></td>
                    <td><a href="{BASE_URL}delete/resource/{$resource->id_recurso}">Eliminar</a></td>
                    {if $resource->imagen}
                        <td><a href="{BASE_URL}delete/image/{$resource->id_recurso}">x</a></td>
                    {else}
                        <td></td>
                    {/if}
                {/if}
            </tr>
        {/foreach}
    </tbody>
</table>