<script type="text/javascript">
    
    $(document).ready(function(){
   
      $('#inputCpf').mask('000.000.000-00');
      $('#inputCelular').mask('(00) 00000-0000');
      $('#inputTelefone').mask('(00) 0000-0000');
       $('#inputCep').mask(' 00000-000');
        
      $('#matricula').hide();

      function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#inputCep").val("");
                $("#inputEndereco").val("");
                $("#inputBairro").val("");
                $("#inputMunic").val("");
                $("#inputUf").val("");
      }

       $("#inputCep").blur(function() {

             //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            if(cep != ""){
                
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    swal({title: "Aguarde!", text: "Carregando...", icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif", button: false});

                 //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            swal.close();
                            //Atualiza os campos com os valores da consulta.
                            $("#inputEndereco").val(dados.logradouro);
                            $("#inputBairro").val(dados.bairro);
                            $("#inputMunic").val(dados.localidade);
                            $("#inputUf").val(dados.uf);
          
                        
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            swal( "Atenção!", "CEP não encontrado.", "warning", { timer: 3000, button: false});
                        }
                    });
                }else{
                     //cep é inválido.
                      limpa_formulário_cep();
                     swal( "Atenção!", "Formato de CEP inválido .", "error", { timer: 3000, button: false});
                }

            }else{
                alert("CEP Vazio!");
            }
           
       });    

    }); //document.ready

</script>

<div class="container">

    <div class="row">
    
        <div class="col-12 text-center mt-3">
        
            <h1 class="display-4"><i class="fas fa-user-plus text-primary"></i> Cadastro</h1> 
            <p class="mt-4">Os campos que tiverem * são de preenchimento obrigatório.</p>
        </div>
    </div>
    
    <hr>
    
    <div class="row justify-content-center">
        
        <div class="col-sm-12 col-md-10 col-lg-8 mt-5">

            <form id="formCadastro">

                <div class="form-row">

                    <div class="form-group col-md-10 col-sm-10 col-12 col-lg-12">

                      <label class="" for="inputNome">Nome Completo *</label>
                      <input type="text" class="form-control" name="inputNome" placeholder="Nome" required>

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-lg-3 col-md-3 col-sm-4 col-12">

                        <label for="inputCpf">CPF *</label>
                        <input type="text" class="form-control" id="inputCpf" name="inputCpf" placeholder="123.456.789-0" required role="button" data-toggle="popover" data-placement="right" data-trigger="focus" title="" data-content="Digite somente números">

                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-4 col-12">

                        <label for="inputCpf">RG *</label>
                        <input type="text" class="form-control" id="inputRg" name="inputRg" placeholder="12.345.679-X" required  role="button" data-toggle="popover" data-placement="right" data-trigger="focus" title="" data-content="Digite exatamente como consta no RG">

                    </div>

                    <div class="form-group col-12 col-md-3 col-sm-4 col-lg-3">

                      <label class="label_formulario" for="inputData">Data de Nascimento*</label>
                      <input type="date" class="form-control" id="inputData" name="inputData" required>

                    </div>

                </div>
                
                <div class="form-row">
                
                     <div class="form-group col-lg-7 col-md-10 col-sm-10 col-12">

                        <label for="inputEmail">Email *</label>
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="meuemail@email.com" required>

                    </div>
                
                </div>
                
                <div class="form-row">
                
                     <div class="form-group col-lg-3 col-md-4 col-sm-4 col-12">

                        <label for="inputCelular">Celular *</label>
                        <input type="text" class="form-control" id="inputCelular" name="inputCelular" placeholder="(11) 97070-7070" required>

                    </div>
                    
                    <div class="form-group col-lg-3 col-md-4 col-sm-4 col-12">

                        <label for="inputTelefone">Telefone</label>
                        <input type="text" class="form-control" id="inputTelefone" name="inputTelefone" placeholder="(11) 1234-5678">

                    </div>
                
                </div>
                
                <div class="form-row">
                    
                     <div class="form-group col-lg-3 col-md-4 col-sm-4 col-6">

                        <label for="inputCep">CEP *</label>
                        <input type="text" class="form-control" id="inputCep" name="inputCep" placeholder="12345-555" required>
                    
                    </div>
                    
                    <div class="form-group col-lg-2 col-md-2 col-sm-2 col-3">

                        <label for="inputUf">UF</label>
                        <input type="text" class="form-control" id="inputUf" name="inputUf" placeholder="DF" readonly>
                    
                    </div> 
                    
                    <div class="form-group col-lg-5 col-md-5 col-sm-5 col-7">

                        <label for="inputMunic">Munícipio</label>
                        <input type="text" class="form-control" id="inputMunic" name="inputMunic" placeholder="Distrito Federal" readonly>
                    
                    </div>
                
                </div>
                
                <div class="form-row">
                
                    <div class="form-group col-lg-6 col-md-5 col-sm-5 col-12">

                        <label for="inputEndereco">Endereço</label>
                        <input type="text" class="form-control" id="inputEndereco" name="inputEndereco" placeholder="Rua do Brasil" readonly>
                    
                    </div> 
                    
                    <div class="form-group col-lg-6 col-md-5 col-sm-5 col-12">

                        <label for="inputBairro">Bairro</label>
                        <input type="text" class="form-control" id="inputBairro" name="inputBairro" placeholder="Jardim Venezuela" readonly>
                    
                    </div>
                
                </div>
                
                <div class="form-row">
                
                     <div class="form-group col-lg-2 col-md-2 col-sm-2 col-3">

                        <label for="inputNumero">Número*</label>
                        <input type="text" class="form-control" name="inputNumero" placeholder="100" required>
                    
                    </div> 
                    
                    <div class="form-group col-lg-5 col-md-5 col-sm-5 col-6">

                        <label for="inputComplemento">Complemento</label>
                        <input type="text" class="form-control" name="inputComplemento" placeholder="Apt 3 Bloco Z">
                    
                    </div>   
                
                </div>
                
                <div class="form-row">
                
                     <div class="form-group col-lg-5 col-md-5 col-sm-5 col-9">

                        <label for="inputUsuario">Login *</label>
                        <input type="text" class="form-control" id="inputLogin" name="inputLogin" maxlength="15" required role="button" data-toggle="popover" data-placement="right" data-trigger="focus" title="" data-content="Você terá acesso ao sistema com esse login. Não coloque carecteres especiais e nem espaço. Máximo 15 carecteres.">
                    
                    </div>
                    
                </div>
                
                <div class="form-row">
                
                    <div class="form-group col-lg-5 col-md-5 col-sm-5 col-6">

                        <label for="inputSenha">Senha *</label>
                        <input type="password" class="form-control" id="inputSenha" name="inputSenha" placeholder="" required>
                    
                    </div>
                    
                    <div class="form-group col-lg-5 col-md-5 col-sm-5 col-6">

                        <label for="inputRSenha">Repetir Senha *</label>
                        <input type="password" class="form-control" id="inputRSenha" name="inputRSenha" placeholder="" required>
                    
                    </div>
                
                </div>
                
                
                <div class="form-row mt-5">
                
                    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-12">

                       <div class="btn-group btn-group-toggle" data-toggle="buttons">
                           
                           
                          <label class="btn btn-secondary active">
                            <input type="radio" name="categoria" value="M" id="nservidor" autocomplete="off" checked> Não sou servidor
                          </label>
                           
                          <label class="btn btn-secondary">
                            <input type="radio" name="categoria" value="S" id="servidor" autocomplete="off"> Sou servidor da Câmara Municipal
                          </label>
                           
                        </div>
                    
                    </div>
                
                </div>
                
                <div class="form-row" id="matricula">
                
                    <div class="form-group col-lg-6 col-md-10 col-sm-10 col-12">

                        <label for="inputMatricula">Matrícula *</label>
                        <input type="text" class="form-control" id="inputMatricula" name="inputMatricula" maxlength="10">
                    
                    </div>
                
                </div>
                
                <div class="form-row">
                
                    <div class="form-group col-lg-12 mt-5">

                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    
                    </div>
                
                
                </div>

            </form>

        </div>
        
    </div>

</div> <!-- container -->

<script>
        $(function(){
            $('[data-toggle="popover"]').popover()
        })
    
//    O bloco de comando abaixo irá exibir ou não o campo de matrícula, de acordo com o que for selecionado pelo usuário
    
      $("input[type=radio]").on("change", function() {
        
          var opcao = $(this).val();
            
            if (opcao == "S") {
                    
                      $('#matricula').show();

            } else if (opcao == "M") {
              
                      $('#matricula').hide();

            }
          });

      $(document).ready(function(){

        $("#formCadastro").submit(function(event){

            if ($("#inputSenha").val() !== $("#inputRSenha").val()){

                 swal( "Atenção!", "As senhas digitadas não conferem!", "warning");
                         $("#inputSenha").val("");
                         $("#inputRSenha").val("");

            }else{

                $.ajax({
                    type:"POST",
                    url: '<?=BASE_URL?>Cadastro/cadastrar_usuario',
                    data: $("#formCadastro").serialize(),
                    success: function (data){
                        
                        if($.trim(data) == '1'){

                            $('#formCadastro').trigger("reset");

                             swal("OK!","Cadastro realizado com sucesso!", "success" ,{ timer: 3000, button: false});
                             //Depois de 3,1 segundos, o usuário será redirecionado
                             setTimeout(function(){ window.location.href = '<?=BASE_URL?>Login/index'; }, 3100); 

                        }else{
                            swal( "Atenção!", "Erro ao realizar cadastro. Entre em contato com suporte.", "error", { timer: 3000, button: false});
                        }
                    },beforeSend: function (){

                        swal({title: "Aguarde!", text: "Carregando...", icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif", button: false});
                    },
                    error: function(){
                        alert('Unexpected error.');
                    }

                }); // Ajax

            }

            return false;
        }); //Cadastrar Dados


        $("#inputCpf").blur(function(){
            
            $.ajax({
                type:"POST",
                url: "<?=BASE_URL?>Cadastro/validar_cpf",
                data: {'cpf': $("#inputCpf").val()},

                success: function(data){

                    if(data == true){
                         swal( "Atenção!", "CPF inválido! Tente novamente.", "warning");
                         $("#inputCpf").val("");
                    }

                },error: function(){
                    alert('Unexpected ERROR.')
                }
            });
        });//Validar CPF

        $("#inputLogin").blur(function(){

            $.ajax({
                type:"POST",
                url: "<?=BASE_URL?>Cadastro/validar_login",
                data: {'login': $("#inputLogin").val()},

                success: function(data){

                    if(data == true){
                         swal( "Atenção!", "Login inválido! Tente novamente.", "warning");
                         $("#inputLogin").val("");
                    }

                },error: function(){
                    alert('Unexpected ERROR.')
                }
            });

        });//Valida usuário

         $("#inputEmail").blur(function(){

            $.ajax({
                type:"POST",
                url: "<?=BASE_URL?>Cadastro/validar_email",
                data: {'email': $("#inputEmail").val()},

                success: function(data){

                    if(data == true){
                         swal( "Atenção!", "Esse email já possui um cadastrado.", "warning");
                         $("#inputEmail").val("");
                    }

                },error: function(){
                    alert('Unexpected ERROR.')
                }
            });

        });//Valida email

         $("#inputMatricula").blur(function(){
            
            $.ajax({
                type:"POST",
                url: "<?=BASE_URL?>Cadastro/validar_matricula",
                data: {'matricula': $("#inputMatricula").val()},

                success: function(data){

                    if(data == true){
                         swal( "Atenção!", "Matrícula já cadastrada no sistema!", "warning");
                         $("#inputMatricula").val("");
                    }

                },error: function(){
                    alert('Unexpected ERROR.')
                }
            });
        });//Validar Matricula

        $("#inputRg").blur(function(){
            
            $.ajax({
                type:"POST",
                url: "<?=BASE_URL?>Cadastro/validar_rg",
                data: {'rg': $("#inputRg").val()},

                success: function(data){

                    if(data == true){
                         swal( "Atenção!", "RG já cadastrado no sistema!", "warning");
                         $("#inputRg").val("");
                    }

                },error: function(){
                    alert('Unexpected ERROR.')
                }
            });
        });//Validar Matricula

         $(function(){
              var regex = new RegExp('[^0-9a-zA-Zàèìòùáéíóúâêîôûãõ\b]', 'g');
              // repare a flag "g" de global, para substituir todas as ocorrências
              $('#inputLogin').bind('input', function(){
                $(this).val($(this).val().replace(regex, ''));
              });
            })

      }); //document
</script>
