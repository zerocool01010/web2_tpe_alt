<nav>
    <ul class="nav justify-content-end">
        {if isset($user) || !empty($user)}
            <li class="nav-item welcome">Bienvenido, usuario {$user|upper|truncate:13}</li>
            <li class="nav-item"><a href="requestZones" class="nav-link">Zonas</a></li>
            <li class="nav-item"><a href="request/resources" class="nav-link">Ingresar al administrador de recursos</a></li>
            <li class="nav-item"><a href="request/zones" class="nav-link">Ingresar al administrador de zonas</a></li>
            <li class="nav-item"><a href="logout" class="nav-link">Desloguearse</a></li>
		{else if isset($admin) || !empty($admin)}
            <li class="nav-item welcome">Bienvenido, administrador {$admin|upper|truncate:13}</li>
            <li class="nav-item"><a href="requestZones" class="nav-link">Zonas</a></li>
            <li class="nav-item"><a href="request/resources" class="nav-link">Ingresar al administrador de recursos</a></li>
            <li class="nav-item"><a href="request/zones" class="nav-link">Ingresar al administrador de zonas</a></li>
            <li class="nav-item"><a href="request/panel" class="nav-link">Panel</a></li>
            <li class="nav-item"><a href="logout" class="nav-link">Desloguearse</a></li>
        {else}
            <li class="nav-item welcome">Bienvenido, usuario anónimo</li>
            <li class="nav-item"><a href="requestZones" class="nav-link">Zonas</a></li>
            <li class="nav-item"><a href="login" class="nav-link">Loguearse</a></li>
            <li class="nav-item"><a href="register" class="nav-link">Registrarse</a></li>  
        {/if}
    </ul>
</nav>
