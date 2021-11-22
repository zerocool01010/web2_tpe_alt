{include file="header.tpl"}

<h2>Bienvenido, ingrese sus datos</h2>

<form action="verifyLogin" method="POST">
        <input placeholder="Ingrese su email" type="text" name="email" required>
        <input placeholder="Contraseña" type="password" name="password" required>
        <button type="submit" class="btn btn-primary">Ingresar</button>
</form>

{if !empty($user)}
        <a href="logout">Desloguearse</a>
{/if}

{include file="redirectHome.tpl"}
{include file="footer.tpl"}