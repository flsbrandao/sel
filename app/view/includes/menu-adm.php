<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container">


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSite">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDropCursos">Curso Presencial</a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?=BASE_URL?>Adm/pagina/cp_aberto">Abertos</a>
                        <a class="dropdown-item" href="<?=BASE_URL?>Adm/pagina/cp_andamento">Em andamento</a>
                        <a class="dropdown-item" href="<?=BASE_URL?>Adm/pagina/cp_encerrado">Encerrados</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?=BASE_URL?>Adm/pagina/cp_adicionar">Adicionar curso</a>
                    </div>

                </li>


                <li class="nav-item">
                    <a class="nav-link" href="<?=BASE_URL?>Adm/pagina/instrutores">Instrutores</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=BASE_URL?>Adm/pagina/estudantes">Estudantes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Certificados</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Material</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Olá Severino</a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?=BASE_URL?>Adm/pagina/meuperfil">Meu perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Sair</a>

                    </div>

                </li>
            </ul>

        </div>

    </div>

</nav>
