$(document).ready(function() {

    $('#pregunta').hide();
    $('#guardar-vino-imagen').hide();
    $('#guardar-perfil-imagen').hide();
    $('#existe-vino').hide();

    $('#nombre').on('change', function(){
        let seleccion = $(this).val();
        let id = $('#nombres').find('option[value="'+seleccion+'"]').data('id');
        $.ajax({
            type:'GET',
            url:'controllers/obtener_vino.php',
            data:'id='+id,
            success:function(respuesta){
                console.log(respuesta);
                var resp = $.parseJSON(respuesta);
                $('#nombre').val(resp.vino.nombre);
                $('#pais').val(resp.vino.pais);
                $('#region').val(resp.vino.region);
                $('#uva').val(resp.uvas);
                $('#productor').val(resp.vino.productor);
                $("#img").attr("src",resp.vino.url_img);
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
        $('html, body').animate({scrollTop: 0}, 300);
    });

    $('#aromas').keypress(function(e){
        let contenido = $('#aromas').val();
        let id = $('#aromas').data('id');
        if(e.which == 13 || e.which == 44){
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
        $('html, body').animate({scrollTop: 0}, 300);
    });

    $('#sabores').keypress(function(e){
        let contenido = $('#sabores').val();
        let id = $(this).data('id');
        if(e.which == 13 || e.which == 44){
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
        $('html, body').animate({scrollTop: 0}, 300);
    });

    $('#uva').keypress(function(e){
        let contenido = $('#uva').val();
        let id = $('#uva').data('id');
        if(e.which == 13){
            e.preventDefault();
            $.ajax({
                type:'GET',
                url:'controllers/modelo_palabras.php',
                data:'accion=insertar-uva&&id='+id+'&&palabra='+contenido,
                dataType: 'json',
                success:function(respuesta){
                    let resp = respuesta;
                    if(resp.respuesta === "exito"){
                        let chip = $(`<div class="chip" id="uva`+resp.id+`">`+contenido+`<span id="closebtn3" class="closebtn" data-id="`+resp.id+`">&times;</span></div>`);
                        $('#chipss3').append(chip);
                        $('#uva').val("");
                    }
                    else if(resp.respuesta === "error"){
                        alert("No se pudo añadir la uva: " + contenido);
                    }
                },
                error:function(respuesta){
                    console.log(respuesta);
                }   
            }); 
        }
    });

    $(document).on('click', '#closebtn3',function(){
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: 'controllers/modelo_palabras.php',
            data: 'accion=borrar-uva&&id='+id,
            dataType: 'json',
            success:function(respuesta){
                let resp = respuesta;
                if(resp.respuesta === "exito"){
                    $('#uva'+id).hide();
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

    $('#guardar-uva').on('click', function(){
        let id = $(this).data('id');
        $(location).attr('href','controllers/modelo_palabras.php?accion=verif-uvas&&id_vino='+id);
    });

    $('#uva2').keypress(function(e){
        let contenido = $('#uva2').val();
        let id = $('#uva2').data('id');
        if(e.which == 13){
            e.preventDefault();
            $.ajax({
                type:'GET',
                url:'controllers/modelo_palabras.php',
                data:'accion=insertar-uva&&id='+id+'&&palabra='+contenido,
                dataType: 'json',
                success:function(respuesta){
                    let resp = respuesta;
                    if(resp.respuesta === "exito"){
                        let chip = $(`<div class="chip" id="uva`+resp.id+`">`+contenido+`<span id="closebtn4" class="closebtn" data-id="`+resp.id+`">&times;</span></div>`);
                        $('#chipss4').append(chip);
                        $('#uva2').val("");
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

    $(document).on('click', '#closebtn4',function(){
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: 'controllers/modelo_palabras.php',
            data: 'accion=borrar-uva&&id='+id,
            dataType: 'json',
            success:function(respuesta){
                let resp = respuesta;
                if(resp.respuesta === "exito"){
                    $('#uva'+id).hide();
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

    $('#guardar-uva-dos').on('click', function(){
        let id = $(this).data('id');
        let id_cata = $(this).data('idcata');
        $(location).attr('href','controllers/modelo_palabras.php?accion=verif-uvas-2&&id_vino='+id+'&&id_cata='+id_cata);
    });

    $('#comentario').keypress(function(){
        let id = $('#comentario').data('id');
        $.ajax({
            type:'GET',
            url:'controllers/modelo_coment.php',
            data:'accion=findcoment&&id='+id,
            dataType: 'json',
            success:function(respuesta){
                let resp = respuesta;
                if(resp.respuesta === "exito"){

                }
                else if(resp.respuesta === "error"){
                    
                }
            },
            error:function(respuesta){
                console.log(respuesta);
            }   
        }); 
    });

    $('#editar_perfil').on('click', function(){
        $('#perfil').hide();
        $('#guardar-perfil-imagen').show();
    });

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
});