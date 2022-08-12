function buscarNomeProduto(nomeProduto)
{
    $.ajax({
        url: "buscarProduto.php",
        method: "POST",
        data: {nomeProduto: nomeProduto},
        success: function(data)
        {
            $('#resultado').html(data);
        }
    });
}

$(document).ready(function()
{
    buscarNomeProduto();
    $('#buscaProduto').keyup(function(){
        var nomeProduto = $('#buscaProduto').val();
        console.log(nomeProduto);
        if(nomeProduto != '')
        {
            buscarNomeProduto(nomeProduto);
        }
        else
        {
            buscarNomeProduto();
        }
    })
});