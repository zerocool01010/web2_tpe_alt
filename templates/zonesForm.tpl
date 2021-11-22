{include file="header.tpl"}

<h1 class="title">Administrador de zonas</h1>

{if $admin}
{if isset($zone->id_zona)} 
    <form action="updateZone" method="post">
        <input type="text" name="zone" value="{$zone->zona}" required>
        <input type="text" name="prefecture" value="{$zone->prefectura}" required>
        <input type="text" name="city" placeholder="Ciudad más cercana" value="{$zone->ciudad_cercana}">
        <select name="id">
            <option>{$zone->id_zona}</option>
        </select>
        <button type="submit" class="btn btn-primary">Modificar</button>
    </form>
{else}
    <form action="add/zone" method="post">
        <input type="text" name="zone" placeholder="Nombre de la zona" required>
        <input type="text" name="prefecture" placeholder="Prefectura" required>
        <input type="text" name="city" placeholder="Ciudad más cercana">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
{/if}
{/if}

{include file="zonesTable.tpl"}

{include file="redirectHome.tpl"}
{include file="footer.tpl"}