
<table class="table table-light table-hover">
    <thead>
        <th>Recurso</th>
        <th>Germinación</th>
        <th>Zona</th>
        {if $admin}
            <th></th>
            <th></th>
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
                {if $admin}
                    <td><a href="{BASE_URL}getUpdate/resource/{$resource->id_recurso}/{$resource->recurso}">Modificar</a></td>
                    <td><a href="{BASE_URL}delete/resource/{$resource->id_recurso}">Eliminar</a></td>
                {/if}
            </tr>
        {/foreach}
    </tbody>
</table>