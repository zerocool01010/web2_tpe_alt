{include file="header.tpl"}

<h1 class="title">Registro de nuevo usuario</h1>

<form action="registerUser" method="post">
    <input type="text" name="email" placeholder="Ingrese su email" required>
    <input type="password" name="password" placeholder="Ingrese su contraseña" required>
    <input type="password" name="checkpassword" placeholder="Repita su contraseña" required>
    <button type="submit" class="btn btn-primary">Registrarse</button>
</form>

<h2>{$warning}</h2>

{include file="redirectHome.tpl"}
{include file="footer.tpl"}