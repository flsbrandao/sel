<div class="container">

    <div class="row">

        <div class="col-12 text-center mt-5">

            <h1 class="display-4"><i class="fas fa-chalkboard-teacher text-primary"></i> Lecionando</h1>
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

</div>

<script>
    //    O bloco de comando abaixo irá exibir ou não o campo de matrícula, de acordo com o que for selecionado pelo usuário

    $("input[type=radio]").on("change", function() {

        var opcao = $(this).val();

        if (opcao == "andamento") {

            $('#cursos').load("<?=BASE_URL?>Instrutor/table/table_instlecionando");

        } else if (opcao == "encerrados") {

            $('#cursos').load("<?=BASE_URL?>Instrutor/table/table_instencerrado");

        }
    });

    $(document).ready(function() {

        $('#cursos').load("<?=BASE_URL?>Instrutor/table/table_instlecionando");
    });

</script>
