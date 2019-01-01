<!DOCTYPE html>
<html>
    <head>
        <title>Formulário dinâmico por LipESprY</title>
        <!-- <script type="text/javascript" src="prereq/jquery-3.3.1.min.js"></script> -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    </head>

    <body>

        <h2 style='color:blue;'>Escolha o tipo de anúncio:</h2>
        <select name="aaa" id="valorSel" size="1">
            <option value="0" disabled="disabled" selected="selected">Selecione:</option>
            <option value="1">Imóveis</option>
            <option value="2">Veículos</option>
            <option value="3">Produtos</option>
        </select>

        <div id="formHide"  style="display:none;">
            <form action="trata_formulario.php" method="post" id="submit-form" class="submit-form" enctype="multipart/form-data">
                <div id="form-resultado"></div>
            </form>
        </div>

    </body>

    <script>
        //$("#valorSel").change(function(event){
        $("#valorSel").on('change', function(event){

            $("#formHide").show();  // exibir o form principal (oculto)
            // event.preventDefault(); // Não tem necessidade, já que vai pegar o evento 'change'
            $.ajax({
                url: "retorno.php",
                data: {
                    aaa: $('#valorSel').val()
                },
                type: "post",
                dataType: "html"
            })
            .done(function(data){
                $("#form-resultado").html(data);
            })
            .fail(function(erro){
                console.log(erro);
                alert('Problema ao carregar o formulário via ajax');
            });

        });
    </script>

</html>
