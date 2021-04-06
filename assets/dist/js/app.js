$(document).ready(function() {

    $('#pregunta').hide();
    $('#guardar-vino-imagen').hide();
    $('#existe-vino').hide();
    $('#aromatico').hide();
    $('#gustativo').hide();
    $('#personal').hide();


    /*$('#guardar-vino-').on('submit', function(e) {
        e.preventDefault();

        let datos = new FormData(this);

        $.ajax({
            type:$(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function(data){
                console.log(data);
                let resultado = data;
                if(resultado.respuesta == 'exito'){
                    alert('bien');
                }
                else{
                    alert('mal');
                }
            },
            error: function(data){
                console.log(data);
            }
        });
    });*/

    $('#nombre').on('change', function(){
        let seleccion = $(this).val();
        let id = $('#nombres').find('option[value="'+seleccion+'"]').data('id');
        $.ajax({
            type:'GET',
            url:'controllers/obtener_vino.php',
            data:'id='+id,
            success:function(respuesta){
                var resp = $.parseJSON(respuesta);
                $('#nombre').val(resp.nombre);
                $('#pais').val(resp.pais);
                $('#region').val(resp.region);
                $('#uva').val(resp.uva);
                $('#productor').val(resp.productor);
            }
        });
        $('#pregunta').show();
        $('#id_vino').val(id);
    });

    $('#si').on('click', function(){
        $('#existe-vino').show();
    });

    $('#no').on('click', function(){
        $('#guardar-vino-imagen').show();
        $('#busca-vino').hide();
        alert('Puedes crear un nuevo vino, solo llena el siguiente formulario');
    });

    $('#visual').on('submit', function(e){
        e.preventDefault();
        let datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                let result = data;
                if(result.respuesta === 'exito'){
                    $('#visual').hide();
                    $('#aromatico').show();
                }
            }
        });
    });

    $('#aromas').keypress(function(e){
        let contenido = $('#aromas').val();
        let id = $('#aromas').data('id');
        if(e.which == 13){
            e.preventDefault();
            $.ajax({
                type:'GET',
                url:'controllers/modelo_palabras.php',
                data:'accion=insertar-aroma&&id='+id+'&&palabra='+contenido,
                dataType: 'json',
                success:function(respuesta){
                    let resp = respuesta;
                    if(resp.respuesta === "exito"){
                        let chip = $(`<div class="chip" id="aroma`+resp.id+`">`+contenido+`<span id="closebtn" class="closebtn" data-id="`+resp.id+`">&times;</span></div>`);
                        $('#chipss').append(chip);
                        $('#aromas').val("");
                    }
                    else if(resp.respuesta === "error"){
                        alert("No se pudo añadir el aroma: " + contenido);
                    }
                },
                error:function(respuesta){
                    console.log(respuesta);
                }   
            }); 
        }
    });

    $(document).on('click', '#closebtn',function(){
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: 'controllers/modelo_palabras.php',
            data: 'accion=borrar-aroma&&id='+id,
            dataType: 'json',
            success:function(respuesta){
                let resp = respuesta;
                if(resp.respuesta === "exito"){
                    $('#aroma'+id).hide();
                }
                else if(resp.respuesta === "error"){
                    alert("No se pudo eliminar el aroma");
                }
            },
            error:function(respuesta){
                console.log(respuesta);
            }  
        });
    });

    $('#aromatico').on('submit', function(e){
        e.preventDefault();
        let datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                let result = data;
                if(result.respuesta === 'exito'){
                    $('#aromatico').hide();
                    $('#gustativo').show();
                }
            }
        });
    });

    $('#sabores').keypress(function(e){
        let contenido = $('#sabores').val();
        let id = $(this).data('id');
        if(e.which == 13){
            e.preventDefault();
            $.ajax({
                type:'GET',
                url:'controllers/modelo_palabras.php',
                data:'accion=insertar-sabor&&id='+id+'&&palabra='+contenido,
                dataType: 'json',
                success:function(respuesta){
                    let resp = respuesta;
                    if(resp.respuesta === "exito"){
                        let chip = $(`<div class="chip" id="gusto`+resp.id+`">`+contenido+`<span id="closebtn2" class="closebtn" data-id="`+resp.id+`">&times;</span></div>`);
                        $('#chipss2').append(chip);
                        $('#sabores').val("");
                    }
                    else if(resp.respuesta === "error"){
                        alert("No se pudo añadir el aroma: " + contenido);
                    }
                },
                error:function(respuesta){
                    console.log(respuesta);
                }   
            }); 
        }
    });

    $(document).on('click', '#closebtn2',function(){
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: 'controllers/modelo_palabras.php',
            data: 'accion=borrar-sabor&&id='+id,
            dataType: 'json',
            success:function(respuesta){
                let resp = respuesta;
                if(resp.respuesta === "exito"){
                    $('#gusto'+id).hide();
                }
                else if(resp.respuesta === "error"){
                    alert("No se pudo eliminar el aroma");
                }
            },
            error:function(respuesta){
                console.log(respuesta);
            }  
        });
    });

    $('#gustativo').on('submit', function(e){
        e.preventDefault();
        let datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                let result = data;
                if(result.respuesta === 'exito'){
                    $('#gustativo').hide();
                    $('#personal').show();
                }
            },
            error: function(data){
                console.log(data);
            }
        });
    });
});