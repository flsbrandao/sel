<script>
    $(document).ready(function() {

        $('#inputCpf').mask('000.000.000-00');
        $('#inputCelular').mask('(00) 00000-0000');
        $('#inputTelefone').mask('(00) 0000-0000');
        $('#inputCep').mask(' 00000-000');

    });

</script>

<div class="container">

    <div class="row">

        <div class="col-12 text-center mt-3">

            <h1 class="display-4"><i class="fas fa-user-edit text-primary"></i> Meu perfil</h1>
            <p class="mt-4">Os campos que tiverem * são de preenchimento obrigatório.</p>
        </div>
    </div>

    <hr>

    <div class="row justify-content-center">

        <div class="col-sm-12 col-md-10 col-lg-8 mt-5">

            <form>

                <div class="form-row">

                    <div class="form-group col-md-10 col-sm-10 col-12 col-lg-12">

                        <label class="" for="inputNome">Nome Completo *</label>
                        <input type="text" class="form-control" id="inputNome" placeholder="Nome" required>

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-lg-3 col-md-3 col-sm-4 col-12">

                        <label for="inputCpf">CPF *</label>
                        <input type="text" class="form-control" id="inputCpf" placeholder="123.456.789-0" disabled>

                    </div>

                    <div class="form-group col-12 col-md-5 col-sm-5 col-lg-4">

                        <label class="label_formulario" for="inputData">Data de Nascimento *</label>
                        <input type="date" class="form-control" id="inputData" disabled>

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-lg-7 col-md-10 col-sm-10 col-12">

                        <label for="inputEmail">Email *</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="meuemail@email.com" required>

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-lg-3 col-md-4 col-sm-4 col-12">

                        <label for="inputCelular">Celular *</label>
                        <input type="text" class="form-control" id="inputCelular" placeholder="(11) 97070-7070" required>

                    </div>

                    <div class="form-group col-lg-3 col-md-4 col-sm-4 col-12">

                        <label for="inputTelefone">Telefone</label>
                        <input type="text" class="form-control" id="inputTelefone" placeholder="(11) 1234-5678">

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-lg-3 col-md-4 col-sm-4 col-6">

                        <label for="inputCep">CEP *</label>
                        <input type="text" class="form-control" id="inputCep" placeholder="12345-555" required>

                    </div>

                    <div class="form-group col-lg-2 col-md-2 col-sm-2 col-3">

                        <label for="inputUf">UF</label>
                        <input type="text" class="form-control" id="inputUf" placeholder="DF" disabled>

                    </div>

                    <div class="form-group col-lg-5 col-md-5 col-sm-5 col-7">

                        <label for="inputMunic">Munícipio</label>
                        <input type="text" class="form-control" id="inputMunic" placeholder="Distrito Federal" disabled>

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-lg-6 col-md-5 col-sm-5 col-12">

                        <label for="inputEndereco">Endereço</label>
                        <input type="text" class="form-control" id="inputEndereco" placeholder="Rua do Brasil" disabled>

                    </div>

                    <div class="form-group col-lg-6 col-md-5 col-sm-5 col-12">

                        <label for="inputBairro">Bairro</label>
                        <input type="text" class="form-control" id="inputBairro" placeholder="Jardim Venezuela" disabled>

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-lg-2 col-md-2 col-sm-2 col-3">

                        <label for="inputNumero">Número*</label>
                        <input type="text" class="form-control" id="inputNumero" placeholder="100" required>

                    </div>

                    <div class="form-group col-lg-5 col-md-5 col-sm-5 col-6">

                        <label for="inputComplemento">Complemento</label>
                        <input type="text" class="form-control" id="inputComplemento" placeholder="Apt 3 Bloco Z">

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-lg-5 col-md-5 col-sm-5 col-9">

                        <label for="inputMatricula">Matrícula</label>
                        <input type="password" class="form-control" id="inputMatricula" placeholder="" disabled>

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-lg-12 mt-5">

                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalAlterarSenha">Alterar Senha</button>

                    </div>


                </div>

            </form>

        </div>

    </div>

</div> <!-- container -->

<script>
    //    O bloco de comando abaixo irá exibir ou não o campo de matrícula, de acordo com o que for selecionado pelo usuário

    $("input[type=radio]").on("change", function() {

        var opcao = $(this).val();

        if (opcao == "servidor") {

            $('#matricula').show();

        } else if (opcao == "nservidor") {

            $('#matricula').hide();

        }
    });

</script>

<!-- ### MODAL #### -->

<div class="modal fade" id="modalAlterarSenha" tabindex="-1" role="dialog">

    <div class="modal-dialog  modal-md" role="document">

        <div class="modal-content">

            <div class="modal-header">


                <h5 class="modal-title">Alterar Senha</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <div class="row justify-content-center">

                    <div class="col-sm-12 col-md-10 col-lg-8">


                        <form>

                            <div class="form-row">

                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">

                                    <label for="inputUsuario">Usuário</label>
                                    <input type="text" class="form-control" id="inputUsuario" placeholder="" disabled>

                                </div>

                            </div>


                            <div class="form-row">

                                <div class="form-group col-lg-7 col-md-7 col-sm-7 col-12">

                                    <label for="inputSenha">Senha Antiga *</label>
                                    <input type="password" class="form-control" id="inputSenha" placeholder="" required>

                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">

                                    <label for="inputSenha">Senha *</label>
                                    <input type="password" class="form-control" id="inputSenha" placeholder="" required>

                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6">

                                    <label for="inputRSenha">Repetir Senha *</label>
                                    <input type="password" class="form-control" id="inputRSenha" placeholder="" required>

                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group ">

                                    <button type="submit" class="btn btn-success">Alterar</button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Fechar
                </button>
            </div>

        </div>
    </div>

</div>
