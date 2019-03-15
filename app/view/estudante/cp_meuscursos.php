<div class="container">

    <div class="row">

        <div class="col-12 text-center mt-5">

            <h1 class="display-5">Meus Cursos</h1>
            <hr>
        </div>

    </div>

    <div class="row justify-content-center">

        <div class="form-group">

            <div class="btn-group btn-group-toggle" data-toggle="buttons">


                <label class="btn btn-success active">
                    <input type="radio" name="nservidor" value="andamento" autocomplete="off"> Cursos em Andamento
                </label>

                <label class="btn btn-success">
                    <input type="radio" name="servidor" value="encerrados" autocomplete="off"> Encerrados
                </label>

            </div>

        </div>
    </div>

    <div class="col-lg-12">
        <div id="cursos"></div>
    </div>

</div> <!-- container -->

<script>
    //    O bloco de comando abaixo irá exibir ou não o campo de matrícula, de acordo com o que for selecionado pelo usuário

    $("input[type=radio]").on("change", function() {

        var opcao = $(this).val();

        if (opcao == "andamento") {

            $('#cursos').load("<?=BASE_URL?>Estudante/table/table_cursoandamento");

        } else if (opcao == "encerrados") {

            $('#cursos').load("<?=BASE_URL?>Estudante/table/table_cursoencerrado");

        }
    });

    $(document).ready(function() {

        $('#cursos').load("<?=BASE_URL?>Estudante/table/table_cursoandamento");
    });

</script>
