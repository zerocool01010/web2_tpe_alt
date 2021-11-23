{include file="header.tpl"}

<h1 class="title">Panel de administrador</h1>

<table class="table table-light table-hover">
    <thead>
        <th>Email</th>
        <th>Administrador</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        {foreach from=$users item=$user} {* se recorre la tabla de usuarios y se iran creando columnas *}
            <tr>
                <td>{$user->email}</td> {* columna del email de los usuarios *}
                {if $user->administrador == 1} {* si el usuario recorrido en el foreach es admin *}
                    <td>Sí</td> {* se agrega una columna que dice SI, ES ADMIN *}
                    {if $user->email != $admin} {* el email de este usuario debe ser diferente del email del admin que ingresa al panel *}
                        <td><a href="{BASE_URL}getUpdate/user/{$user->id_user}">Convertir en usuario</a></td> {* aca el administrador puede quitar permisos a otro admin, por eso la logica de arriba de que debe cumplirse que el email recorrido en el foreach no sea el del admin que ingresó al panel*}
                        <td></td>
                    {else}
                        <td></td>
                        <td></td>
                    {/if}
                {else if $user->administrador == 0} {* si el que se recorre en la tabla con en el foreach no es admin*}
                    <td>No</td> {* NO ES ADMIN *}
                    <td><a href="{BASE_URL}getUpdate/user/{$user->id_user}">Convertir en administrador</a></td> {* aca se le pueden asignar permisos *}
                    <td><a href="{BASE_URL}warning/panel/{$user->id_user}">Eliminar</a></td> {* para eliminar un usuario *}
                {/if}
            </tr>
        {/foreach}
    </tbody>
</table>

{include file="redirectHome.tpl"}
{include file="footer.tpl"}