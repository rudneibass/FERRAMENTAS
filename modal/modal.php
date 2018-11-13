        <!-- MODAL  -->
        <br />
        <a href="#janela1" rel="modal" >Janela modal</a>
        <br/>
        <div class="window" id="janela1">
            <a href="#" class="fechar">X Fechar</a>
            <img src="loading_100_x_100.gif">
        </div>
        <!-- mascara para cobrir o site -->  
        <div id="mascara"></div>


<style>

    .window{
        display:none;
        width:90%;
        height:100%;
        position:absolute;
        left:0;
        top:0;
        background:#FFF;
        z-index:9900;
        padding:10px;
        border-radius:10px;
    }

    #mascara{
        display:none;
        position:absolute;
        left:0;
        top:0;
        z-index:9000;
        background-color:#000;
    }

    .fechar{display:block; text-align:right;}

</style>
<script>
    $(document).ready(function () {

        $("a[rel=modal]").click(function (ev) {
            ev.preventDefault();

            var id = $(this).attr("href");

            var alturaTela = $(document).height();
            var larguraTela = $(window).width();

            //colocando o fundo preto
            $('#mascara').css({'width': larguraTela, 'height': alturaTela});
            $('#mascara').fadeIn(1000);
            $('#mascara').fadeTo("slow", 0.8);

            var left = ($(window).width() / 2) - ($(id).width() / 2);
            var top = ($(window).height() / 2) - ($(id).height() / 2);

            $(id).css({'top': top, 'left': left});
            $(id).show();

        });

        $("#mascara").click(function () {
            $(this).hide();
            $(".window").hide();
        });

        $('.fechar').click(function (ev) {
            ev.preventDefault();
            $("#mascara").hide();
            $(".window").hide();
        });
    });
</script>