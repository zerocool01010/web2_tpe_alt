<table class="table table-light table-hover">
    <thead>
        <th>Zona</th>
        <th>Prefectura</th>
        <th>Ciudad más cercana</th>
        {if $admin}
            <th></th>
            <th></th>
        {/if}
    </thead>
    <tbody>
        {foreach from=$zones item=$zone}
            <tr>
                <td>{$zone->zona}</td>
                <td>{$zone->prefectura}</td>
                {if !empty($zone->ciudad_cercana)}
                    <td>{$zone->ciudad_cercana}</td>
                {else}
                    <td>--</td> 
                {/if}
                {if $admin}
                    {if !empty($zone->ciudad_cercana)}
                        <td><a href="{BASE_URL}getUpdate/zone/{$zone->zona}/{$zone->prefectura}/{$zone->id_zona}/{$zone->ciudad_cercana}">Modificar</a></td>
                    {else} 
                        <td><a href="{BASE_URL}getUpdate/zone/{$zone->zona}/{$zone->prefectura}/{$zone->id_zona}">Modificar</a></td>
                    {/if}
                    <td><a href="{BASE_URL}warning/{$zone->id_zona}/{$zone->zona}">Eliminar</a></td>
                {/if}
            </tr>
        {/foreach}
    </tbody>
</table>