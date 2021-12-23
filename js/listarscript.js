$ (function() {
    // pesquisar sem refresh
    $("#pesquisa").keyup(function() {
        var pesquisa = $(this).val();
        
        //verifica se há algo digitado
        if(pesquisa != '') {
            var dados = {
                palavra : pesquisa
            }
            $.post('buscar.php', dados, function(retorna){
                //mostra dentro os resultados
                $(".resultado").html(retorna);
                $("#card").hide(); //esconde os filmes ja listados
            });
        } else {
            $(".resultado").html('');
            $("#card").show(); //mostra os filmes

        } 
    });
});