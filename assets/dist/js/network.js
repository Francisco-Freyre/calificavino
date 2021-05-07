$(document).ready(function() {

    let public_actual = -1;

    $('.btncoment').on('click', function(){
        public_actual = $(this).data('id');
        $.ajax({
            type:'GET',
            url:'controllers/modelo_coment.php',
            data:'accion=obtener-coment&&id_public='+public_actual,
            dataType: 'json',
            success:function(respuesta){
                let resp = respuesta;
                if(resp[0].respuesta === "sincomen"){
                    $('.modalbody').empty();
                    let comment = $(`
                            <div class="sincomentario">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><span>No hay comentarios aun</span></p>
                                    </div>
                                </div>
                            </div>
                        `);
                    $('.modalbody').append(comment);
                }
                else{
                    $('.modalbody').empty();
                    for(data of resp){
                        let comment = "";
                        if(data.img === ""){
                            comment = $(`
                                <div class="comentario">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="assets/images/usuariodefault.jpg" alt="user" class="rounded-circle" width="30" height="30">
                                        </div>
                                        <div class="col-md-11">
                                            <p><span>`+data.nombre_usuario+`</span></p>
                                            <p>`+data.contenido+`</p>
                                        </div>
                                    </div>
                                </div>
                            `);
                        }else{
                            comment = $(`
                                <div class="comentario">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="`+data.img+`" alt="user" class="rounded-circle" width="30" height="30">
                                        </div>
                                        <div class="col-md-11">
                                            <p><span>`+data.nombre_usuario+`</span></p>
                                            <p>`+data.contenido+`</p>
                                        </div>
                                    </div>
                                </div>
                            `);
                        }
                        $('.modalbody').append(comment);
                    }
                    $('.modaltitulo').text('Comentarios ('+ $('.comentario').length +')');
                }
                
            },
            error:function(respuesta){
                console.log(respuesta);
            }   
        });
        
    });

    $('#add-coment').keypress(function(e){
        let contenido = $('#add-coment').val();
        let id = $('#add-coment').data('iduser');
        let nombre = $('#add-coment').data('name');
        let img = $('#add-coment').data('img');
        let formdata = new FormData();
            formdata.append('accion', 'insertar-coment');
            formdata.append('id_user', id);
            formdata.append('id_public', public_actual);
            formdata.append('contenido', contenido);
        if(e.which == 13){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'controllers/modelo_coment.php',
                data: formdata,
                dataType: 'json',
                contentType: false,
                processData: false,
                async: true,
                cache: false,
                success:function(respuesta){
                    let resp = respuesta;
                    if(resp.respuesta === "exito"){
                        let comment = "";
                        if(img === ""){
                            comment = $(`
                                <div class="comentario">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="assets/images/usuariodefault.jpg" alt="user" class="rounded-circle" width="30" height="30">
                                        </div>
                                        <div class="col-md-11">
                                            <p><span>`+nombre+`</span></p>
                                            <p>`+contenido+`</p>
                                        </div>
                                    </div>
                                </div>
                            `);
                        }
                        else{
                            comment = $(`
                                <div class="comentario">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="`+img+`" alt="user" class="rounded-circle" width="30" height="30">
                                        </div>
                                        <div class="col-md-11">
                                            <p><span>`+nombre+`</span></p>
                                            <p>`+contenido+`</p>
                                        </div>
                                    </div>
                                </div>
                            `);
                        }
                        
                        $('.modalbody').append(comment);
                        $('.modaltitulo').text('Comentarios ('+ $('.comentario').length +')');
                        $('#add-coment').val("");
                    }
                    else if(resp.respuesta === "error"){
                        alert("No se pudo añadir el comentario: " + contenido);
                    }
                },
                error:function(respuesta){
                    console.log(respuesta);
                }   
            }); 
        }
    });
    
    $(document).on('click', '.btn-like', function(){
        let btn = $(this).parent();
        let id = btn.data('id');
        let formdata = new FormData();
        formdata.append('accion', 'like');
        formdata.append('id_public', id);
        $.ajax({
            type: 'POST',
            url: 'controllers/modelo_coment.php',
            data: formdata,
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success:function(respuesta){
                let resp = respuesta;
                console.log(resp);
                if(resp.respuesta == "exito"){
                    let likes = btn.text();
                    btn.empty();
                    let imagen = $(`
                        <img src="assets/images/like-24.png" class="btn-dislike fixed">
                    `);
                    let newlike = parseInt(likes.replace(/ /g, "")) + 1;
                    btn.text(" "+newlike);
                    btn.prepend(imagen);
                }
            },
            error:function(respuesta){
                console.log(respuesta);
            }   
        }); 
    });

    $(document).on('click', '.btn-dislike', function(){
        let btn = $(this).parent();
        let id = btn.data('id');
        let formdata = new FormData();
        formdata.append('accion', 'dislike');
        formdata.append('id_public', id);
        $.ajax({
            type: 'POST',
            url: 'controllers/modelo_coment.php',
            data: formdata,
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success:function(respuesta){
                let resp = respuesta;
                console.log(resp);
                if(resp.respuesta == "exito"){
                    let likes = btn.text();
                    btn.empty();
                    let imagen = $(`
                        <img src="assets/images/dislike-24.png" class="btn-like fixed">
                    `);
                    let newlike = parseInt(likes.replace(/ /g, "")) - 1;
                    btn.text(" "+newlike);
                    btn.prepend(imagen);
                }
            },
            error:function(respuesta){
                console.log(respuesta);
            }   
        }); 
    });

    $('.comp').on('click', function(){
        let idCata = $(this).data('id');
        console.log(idCata);
        $('#compcata').data('idcata', idCata);
    });

    $('#compcata').on('submit', function(e){
        let id = $(this).data('id');
        let id_cata = $(this).data('idcata');
        let contenido = $('#contenido').val();
        e.preventDefault();
        let formdata = new FormData();
            formdata.append('accion', 'compartir-cata');
            formdata.append('id_user', id);
            formdata.append('id_cata', id_cata);
            formdata.append('contenido', contenido);
        $.ajax({
            type: 'POST',
            data: formdata,
            url: 'controllers/modelo_compartir.php',
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function(data){
                let result = data;
                console.log(result);
            },
            error:function(respuesta){
                $(location).attr('href','network.php');
            }   
        });
    });

    $('.editar').on('click', function(){
        let id = $(this).data('id');
        $.ajax({
            type:'GET',
            url:'controllers/modelo_compartir.php',
            data:'accion=obtener&&id='+id,
            dataType: 'json',
            success:function(respuesta){
                let resp = respuesta;
                if(resp.respuesta == 'exito'){
                    $('#contenido2').text(resp.public.contenido);
                    $('#id_public').val(resp.public.id);
                }
                else{
                    alert("No se pudieron obtener datos");
                }
            },
            error: function(respuesta){
                console.log(respuesta);
                alert("La comunicacion fallo");
            }
        });
    });

    $('#buscarvino').on('input', function(){
        let nombre = $(this).val();
        let formdata = new FormData();
            formdata.append('accion', 'buscar_vino');
            formdata.append('nombre', nombre);
            $.ajax({
                type: 'POST',
                url: 'controllers/modelo_buscar.php',
                data: formdata,
                dataType: 'json',
                contentType: false,
                processData: false,
                async: true,
                cache: false,
                success:function(respuesta){
                    let resp = respuesta;
                    console.log(resp);
                    if(resp.resultado === "Fallo"){
                        $('#conenido').empty();
                        let comment = $(`
                                <div class="col-md-12">
                                    <p><span>No se encontraron vinos que coincidan con la busqueda</span></p>
                                </div>
                            `);
                        $('#conenido').append(comment);
                    }else{
                        $('#conenido').empty();
                        for(data of resp){
                            let uvas = "";
                            for(datos of data.uvas){
                                uvas += datos + ' - ';
                            }
                            let vino = $(`
                                <div class="col-lg-3 col-md-6">
                                    <div class="card vinos" style="width: 232px; height: 550px;">
                                        <img class="card-img-top img-fluid" width="232" height="288" src="`+data.imagen+`" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">`+data.nombre+` - `+uvas+`</h4>
                                            <p class="card-text">Calificación: `+data.promedio+`</p>
                                        </div>
                                    </div>
                                </div>
                            `);
                            uvas = "";
                            $('#conenido').append(vino);
                        }
                    }
                },
                error:function(respuesta){
                    console.log(respuesta);
                    alert("Fallo la conexion");
                }   
            }); 
    });
});