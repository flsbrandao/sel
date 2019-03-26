<div class="container">

    <div class="row">

        <div class="col-12 text-center mt-5">

            <h1 class="display-4"><i class="fas fa-user-graduate text-primary"></i> Estudantes</h1>
            <hr>
        </div>

    </div>

    <div class="row justify-content-center mt-5">

        <div class="form-group">

            <div class="btn-group btn-group-toggle" data-toggle="buttons">


                <label class="btn btn-success active">
                    <input type="radio" name="nservidor" value="servidor" id="nservidor" autocomplete="off"> Servidores
                </label>

                <label class="btn btn-success">
                    <input type="radio" name="servidor" value="municipe" id="servidor" autocomplete="off"> Munícipes
                </label>

            </div>

        </div>

    </div>

    <div class="col-lg-12">

        <div id="estudantes"></div>

    </div>

</div> <!-- container -->



<script>
    //    O bloco de comando abaixo irá exibir ou não o campo de matrícula, de acordo com o que for selecionado pelo usuário

    $("input[type=radio]").on("change", function() {

        var opcao = $(this).val();

        if (opcao == "servidor") {

            $('#estudantes').load("<?=BASE_URL?>Adm/table/servidores");

        } else if (opcao == "municipe") {

            $('#estudantes').load("<?=BASE_URL?>Adm/table/municipes");

        }
    });

    $(document).ready(function() {

        $('#estudantes').load("<?=BASE_URL?>Adm/table/servidores");
    });

</script>
