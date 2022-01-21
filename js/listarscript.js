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
                $("#pags").hide(); //esconde a paginação
            });
        } else {
            $(".resultado").html('');
            $("#card").show(); //mostra os filmes
            $("#pags").show(); //mostra a paginação


        } 
    });
});

/* botão voltar para o topo */
$(document).ready(function(){

    //Verifica se a Janela está no topo
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Onde a mágia acontece! rs
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},500);
        return false;
    });
});
/* botão voltar para o topo */
