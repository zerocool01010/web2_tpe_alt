{include file="header.tpl"}
<div class="warning">
    <h1>¿Está seguro que desea eliminar esta reseña?</h1>
        <form>
        <button type="submit" id="delete">Sí</button>
        <input type="hidden" id="id-review" value="{$id}">
    </form>
</div>

{include file="js.tpl"}
{include file="redirectHome.tpl"}

{include file="footer.tpl"}