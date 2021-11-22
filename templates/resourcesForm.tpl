{include file="header.tpl"}

<h1 class="title">Administración de recursos</h1>

{if $admin}
{if !empty($id)}
    <form action="updateResource" method="post">
        <input type="text" name="resource" value="{$resource->recurso}" required>
        <select name="season">
            <option hidden value="Error">Época de germinación</option required>
            <option value="Verano">Verano</option>
            <option value="Primavera">Primavera</option>
            <option value="Invierno">Invierno</option>
            <option value="Otoño">Otoño</option>
            <option value="Perenne">Perenne</option>
            <option value="">--</option>
        </select>
        <select name="zone" required>
            <option hidden value="Error">Zona donde se encuentra</option>
            {foreach from=$zones item=$zone}
            <option value="{$zone->id_zona}">{$zone->zona}</option>
            {/foreach}
        </select>
        <select name="id">
            <option>{$id}</option>
        </select>
        <button type="submit" class="btn btn-primary">Modificar</button>
    </form>
{else}
    <form action="add/resource" method="post">
        <input type="text" name="resource" placeholder="Nombre del recurso" required>
        <select name="season">
            <option hidden value="Error">Época de germinación</option required>
            <option value="Verano">Verano</option>
            <option value="Primavera">Primavera</option>
            <option value="Invierno">Invierno</option>
            <option value="Otoño">Otoño</option>
            <option value="Perenne">Perenne</option>
            <option value="">--</option>
        </select>
        <select name="zone">
            <option hidden value="Error">Zona donde se encuentra</option>
            {foreach from=$zones item=$zone}
            <option value="{$zone->id_zona}">{$zone->zona}</option>
            {/foreach}
        </select>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
{/if}
{/if}

{include file="resourcesTable.tpl"}

{include file="redirectHome.tpl"}
{include file="footer.tpl"}