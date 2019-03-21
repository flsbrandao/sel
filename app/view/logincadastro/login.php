<div class="container">

    <div class="wrapper">

        <div class="col-lg-6 col-12 col-md-6">

            <div class="card">

               <!--  <div class="card-header text-center">
                    <h2 class="card-title">SEL</h2>
                    <p>Sistema da Escola Legislativa</p>
                </div>
 -->
                <img class="card-img-top" src="<?=BASE_URL?>app/view/assets/img/logo.png" alt="SEL">
                <div class="card-body">

                    <form id="formLogar">

                        <div class="col-auto">

                            <label class="sr-only" for="inputLogin">Usuário</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="inputLogin" placeholder="Usuário" required>
                            </div>

                        </div>

                        <div class="col-auto mt-4">

                            <label class="sr-only" for="inputSenha">Senha</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="inputSenha" id="inputSenha" placeholder="Senha" required>
                            </div>

                        </div>

                        <div class="form-group col-auto mt-4">

                            <button type="submit"  class="btn btn-success btn-block">Entrar</button>

                        </div>

                    </form>

                </div>

                <div class="card-footer text-center"><a href="<?=BASE_URL?>Cadastro">Ainda não tem cadastro? Cadastre-se aqui</a></div>

            </div>

        </div>

    </div>
</div>
<script type="text/javascript">
   $(document).ready(function() {

        $("#formLogar").submit(function(event) {

            $.ajax({
                type: "POST",
                url: '<?=BASE_URL?>Login/logar',
                data: $("#formLogar").serialize(),
                success: function(data) {
                    if ($.trim(data) === 'A') {

                        window.location.href = '<?=BASE_URL?>Adm/pagina/cp_aberto';

                    } else if ($.trim(data) === 'I') {

                        window.location.href = '<?=BASE_URL?>Instrutor/pagina/cp_aberto';

                    } else if ($.trim(data) === 'E') {

                        window.location.href = '<?=BASE_URL?>Estudante/pagina/cp_aberto';

                    } else {

                        swal("Acesso negado!", "Login e/ou senha inválido!", "error", {
                            timer: 2300,
                            button: false
                        });
                        $("#inputSenha").val("");

                    }
                },
                beforeSend: function() {

                    swal({
                        title: "Aguarde!",
                        text: "Carregando...",
                        icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",
                        button: false
                    });
                },
                error: function() {
                    alert('Unexpected error.');
                }

            }); // Ajax

            return false;
        }); //Cadastrar Dados

    }); //document
</script>