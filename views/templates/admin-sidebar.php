<aside class="dashboard__sidebar">

    <div class="dashboard__header--grid">
        <a href="/">
            <h2 class="dashboard__logo--sidebar">&#60;DevWebCamp/></h2>
        </a>

        <div class="menu-sidebar">
            <img id="cerrar-menu" src="../../build/img/cerrar.svg" alt="icono menu">
        </div>
    </div>


    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span> 
        </a>

        <a href="/admin/ponentes" class="dashboard__enlace <?php echo pagina_actual('/ponentes') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-microphone dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Ponentes
            </span> 
        </a>

        <a href="/admin/eventos" class="dashboard__enlace <?php echo pagina_actual('/eventos') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-calendar dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Eventos
            </span> 
        </a>

        <a href="/admin/registrados" class="dashboard__enlace <?php echo pagina_actual('/registrados') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-users dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Registrados
            </span> 
        </a>

        <a href="/admin/regalos" class="dashboard__enlace <?php echo pagina_actual('/regalos') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-gift dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Regalos
            </span> 
        </a>

    </nav>

    <form method="POST" action="/logout" class="menu-sidebar__form">
        <input type="submit" class="menu-sidebar__submit--logout" value="Cerrar Sesión">
    </form>


</aside>