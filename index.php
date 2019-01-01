<div class="container">
<form method ="" id="formStart" class="formStart" enctype="multipart/form-data">            
<h2 style='color:blue'>Escolha o tipo de anúncio:</h2>          
    <select name="aaa" id="valorSel" >
        <option value="-1">Selecionar...</option>           
        <option value="1">Imóveis</option>
        <option value="2">Veículos</option>     
        <option value="3">Produtos</option>
    </select>
    <!-- <input type="Submit" name="submit" value="Next step" /> -->
    <br><br>
</form>
<br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>    
<script>    
    $("#formStart").change(function(event){
        $("#formHide").show();  // exibir o form principal (oculto)
        event.preventDefault();
        $.ajax({
            data: $(this).serialize(),
            url: "retorno.php",
            type: "POST",
            dataType: "html",
            success: function(data){
                $("#resultado").html(data);
            },
            error: function(){
                alert("Problema ao carregar a solicitação via Ajax.");
            }
        });
    });
</script>

<div id="resultado"></div>

<div id="formHide"  style="display:none;"> 
    <form action="<?php echo esc_url( $action ); ?>" method="post" id="submit-form" class="submit-form" enctype="multipart/form-data">          
        <?php 
        // Usar o valor do select retornado via ajax pela página "retorno.php" como switch case 
        switch ($_POST["aaa"]) {
            case 1:
                echo "Imóveis";   // Para testes adicionei um echo e comentei os includes por enquanto.
                //include "imoveis.php";
                break;
            case 2:
                echo "Veículos";
                //include "veiculos.php";
                break;
            case 3:
                echo "Produtos";
                //include "produtos.php";
                break;
            case -1:
                echo "Por favor escolha uma opção.";
                break;
            default:
                echo "Nada foi selecionado ainda. Por favor escolha uma opção.";
                break;
        }       
        ?>
    </form>
</div>  
