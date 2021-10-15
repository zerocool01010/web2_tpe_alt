{include file="header.tpl"}

<div class="warning">
<h1>¿Está seguro que desea eliminar {$zone}?</h1>
<h2>Se eliminarán a su vez los recursos relacionados.</h2>
</div>

<a href="delete/zone/{$id_zone}" class="btn btn-danger">Sí</a>
<a href="request/zones" class="btn btn-primary">No</a>

{include file="footer.tpl"}
