<ul class="app-menu">
    <li><a class="app-menu__item <?php if(isRouteActive("dashboard")){ echo 'active';} ?>" href="/dashboard">
        <i class="app-menu__icon bi bi-speedometer"></i>
            <span class="app-menu__label">Dashboard</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item <?php if(isRouteActive("users")){ echo 'active';} ?>" href="/users">
            <i class="app-menu__icon bi bi-people"></i>
            <span class="app-menu__label">Users</span>
        </a>
    </li>
</ul>
