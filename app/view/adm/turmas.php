<div class="container">

    <div class="row">

        <div class="col-12 text-center mt-5">

            <h1 class="display-4"><i class="fas fa-chalkboard text-primary"></i> Turmas</h1>
            <hr>
        </div>

    </div>

    <div class="row justify-content-center mt-3">

        <div class="form-group">

            <div class="btn-group btn-group-toggle" data-toggle="buttons">


                <label class="btn btn-success active">
                    <input type="radio" name="" value="abertas" autocomplete="off"> Abertas
                </label>

                <label class="btn btn-success">
                    <input type="radio" name="" value="andamento" autocomplete="off"> Andamento
                </label>

                <label class="btn btn-success">
                    <input type="radio" name="" value="encerradas" autocomplete="off"> Encerradas
                </label>

            </div>

        </div>

        <div class="col-lg-12">
            <div id="turmas"></div>
        </div>

    </div>
</div> <!-- container -->

<script type="text/javascript">
    //    O bloco de comando abaixo irá exibir ou não o campo de matrícula, de acordo com o que for selecionado pelo usuário
    $("input[type=radio]").on("change", function() {

        var opcao = $(this).val();

        if (opcao == "abertas") {

            $('#turmas').load("<?=BASE_URL?>Adm/table/turma_aberta");

        } else if (opcao == "andamento") {

            $('#turmas').load("<?=BASE_URL?>Adm/table/turma_andamento");

        }else if(opcao == 'encerradas'){

             $('#turmas').load("<?=BASE_URL?>Adm/table/turma_encerrada");
        }
    });

    $(document).ready(function() {

        $('#turmas').load("<?=BASE_URL?>Adm/table/turma_aberta");
    });
</script>