{include file="header.tpl"}

<h1 class="title">Registro de zonas</h1>

{if !empty($id)} 
    <form action="updateZone" method="post">
        <input type="text" name="zone" value="{$zone}" required>
        <input type="text" name="prefecture" value="{$prefecture}" required>
        <input type="text" name="city" placeholder="Ciudad más cercana" value="{$city}">
        <select name="id">
            <option>{$id}</option>
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

{include file="zonesTable.tpl"}

{include file="redirectHome.tpl"}
{include file="footer.tpl"}