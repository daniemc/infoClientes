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

    $("input[name='fecha']").datepicker({
        format: 'yyyy-mm-dd'
    });

});