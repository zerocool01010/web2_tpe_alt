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
        {foreach from=$users item=$user}
            <tr>
                <td>{$user->email}</td>
                {if $user->administrador == 1}
                    <td>Sí</td>
                    {if $user->email != $admin}
                        <td><a href="{BASE_URL}getUpdate/user/{$user->id_user}">Convertir en usuario</a></td>
                        <td></td>
                    {else}
                        <td></td>
                        <td></td>
                    {/if}
                {else if $user->administrador == 0}
                    <td>No</td>
                    <td><a href="{BASE_URL}getUpdate/user/{$user->id_user}">Convertir en administrador</a></td>
                    <td><a href="{BASE_URL}warning/panel/{$user->id_user}">Eliminar</a></td>
                {/if}
            </tr>
        {/foreach}
    </tbody>
</table>

{include file="redirectHome.tpl"}
{include file="footer.tpl"}