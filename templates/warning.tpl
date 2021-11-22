{include file="header.tpl"}

<div class="warning">
<h1>¿Está seguro que desea eliminar {$deleted}?</h1>
<h2>Se eliminarán a su vez los {$risk} relacionados.</h2>
</div>

<a href="delete/{$param1}/{$id}" class="btn btn-danger">Sí</a>
<a href="request/{$param2}" class="btn btn-primary">No</a>

{include file="footer.tpl"}
