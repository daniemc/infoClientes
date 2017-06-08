jQuery(function($){

    $("#pais").on('change', function(e){
        var id_pais = e.target.value;
        var url = $(this).data('url');
        $("#departamento").empty();
        $("#ciudad").empty();
        $.get(url+'/'+id_pais, function(response){
            $("#departamento").append("<option value='' ></option>");
            $.each(response, function(index, value){
                $("#departamento").append("<option value='"+value.id+"' >"+value.nombre+"</option>");
            })
        });        
    });

    $("#departamento").on('change', function(e){
        var id_departamento = e.target.value;
        var url = $(this).data('url');
        $("#ciudad").empty();
        $.get(url+'/'+id_departamento, function(response){
            $("#ciudad").append("<option value='' ></option>");
            $.each(response, function(index, value){
                $("#ciudad").append("<option value='"+value.id+"' >"+value.nombre+"</option>");
            })
        });        
    });

    $("a[name='visitas_cliente']").on('click', function(e){
        e.preventDefault();
        $("#cargar_visitas").empty();
        var cliente = $(this).data('cliente');
        var url = $(this).data('url').replace("{id}", cliente);
        $("#cargar_visitas").load(url);
    });

    $("input[name='fecha']").datepicker({
        format: 'yyyy-mm-dd'
    });

    $("#valor_neto").on('keyup', function(e){
        var porcentaje = parseInt($("#cliente :selected").data('porcentaje'));
        var valor_neto = $.trim($(this).val()) == '' ? '0' : parseInt($(this).val());
        calcularValorVisita(valor_neto, porcentaje);
    });

    $("#cliente").on('change', function(e){
        var porcentaje = parseInt($("#cliente :selected").data('porcentaje'));
        var valor_neto = $.trim($("#valor_neto").val()) == '' ? '0' : parseInt($("#valor_neto").val());
        calcularValorVisita(valor_neto, porcentaje);
    });

    function calcularValorVisita(valor_neto, porcentaje)
    {
        console.log(porcentaje);
        $("#valor_visita").val(parseInt(valor_neto)*parseFloat(porcentaje/100));
    }

});