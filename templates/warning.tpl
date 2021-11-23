{include file="header.tpl"}

<div class="warning">
<h1>¿Está seguro que desea eliminar {$deleted}?</h1> {* email o zonas a eliminar *}
<h2>Se eliminarán a su vez los {$risk} relacionados.</h2> {* se eliminaran los comentarios o valoraciones *}
</div>

<a href="delete/{$param1}/{$id}" class="btn btn-danger">Sí</a> {* param1 es user para ir al route y eliminar con el id*}
<a href="request/{$param2}" class="btn btn-primary">No</a> {* param2 es el panel para ir al route *}

{include file="footer.tpl"}
