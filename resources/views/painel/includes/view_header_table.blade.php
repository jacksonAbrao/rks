<?php 
    if(!isset($por_pagina) || $por_pagina == null) {
        $por_pagina = 20;
    }
    // dd($_GET['per_page']);

    if(isset($_GET['per_page'])){
        $por_pagina = intval($_GET['per_page']);
    }

    $paginacao = [10,20,30,40,50,100,150];
    
    function porPagina($numero){
        if(isset($por_pagina) && $por_pagina == $numero) {
            return 'selected';
        } else {
            return '';
        }
        
    }
?>

<div class="header_table margintm20">
    <form class="formFieldNormal" no-process="true" id="formFiltro2s">
        <div class="row d-flex align-center">
            <div class="col-lg-6">
                <div class="form-group d-flex justify-start align-center justify-center-m">
                    <select name="per_page" class="nomargint" id="per_page" style="width: 75px;">
                        @foreach ($paginacao as $item)
                            <option value="{{$item}}" {{porPagina($item)}}>{{$item}}</option>
                        @endforeach
                    </select>
                    <p class="marginl10">Resultados por página</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="vertical-row-center justify-content-end">
                    <div class="form-group bucar-table-responsive">
                        <p>Buscar:</p>
                        <input type="text" class="form-control" value="{{isset($_GET['search'])?$_GET['search']:''}}" placeholder="Pesquisar" id="texto_busca">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn w-100" id="btn_pesquisar_tabela" style="height: 46px;">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function reloadPage() {
        var url = new URL(window.location.href);
        if($("#per_page").val() != null){
            url.searchParams.set('per_page', $("#per_page").val());
        } else {
            url.searchParams.set('per_page', 20);
        }
        if(($('#texto_busca').val()) != null) {
            url.searchParams.set('search', $('#texto_busca').val());
        }
        window.location.href = url.toString();

    }

    $('#btn_pesquisar_tabela').on('click', function(e) {
        e.preventDefault();
        reloadPage();
    });

    // document.getElementById('aplicar_filtros').addEventListener('click', function(){
    //     reloadPage();
    // });


</script>