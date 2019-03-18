<nav class="navbar navbar-expand-lg navbar-dark bg-info">

    <div class="container">


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSite">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDropCursos">Curso Presencial</a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?=BASE_URL?>Instrutor/pagina/cp_aberto">Abertos</a>
                        <a class="dropdown-item" href="<?=BASE_URL?>Instrutor/pagina/cp_lecionando">Lecionando</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?=BASE_URL?>Instrutor/pagina/cp_meuscursos">Meus Cursos</a>
                    </div>

                </li>

            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Olá Severino</a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?=BASE_URL?>Instrutor/pagina/meuperfil">Meu perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Sair</a>

                    </div>

                </li>
            </ul>

        </div>

    </div>

</nav>
