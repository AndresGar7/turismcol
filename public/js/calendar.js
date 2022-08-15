document.addEventListener('DOMContentLoaded', function() {

    const diaActual = new Date();
    const rol = document.getElementById('rol');
    const num_user = document.getElementById('num_user');
    let hoy = diaActual.toISOString().split('T')[0]; // Dia Actual
    let formulario = document.querySelector('#formulario');
    let movimiento = '';

    if (rol.value !== 'user') {
        movimiento = '/citas/mostrar/admin';
    } else {
        movimiento = '/citas/mostrar/'+num_user.value;
    }

    $('#alertTitle').hide();
    $('#alertDescripcion').hide();

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'UTC',
        displayEventTime:false,
        initialView: 'dayGridMonth',
        contentHeight: 420,
        locale: "es",
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',    
            right: 'dayGridMonth,listYear'
        },

        events:{
            url:movimiento,
        },
        dateClick:function(info) {

            if((hoy <= info.dateStr && rol.value == 'user' ) || rol.value !== 'user'){
                formulario.reset();
                formulario.start.value=info.dateStr;
                formulario.end.value=formulario.start.value;
                $('#cita').modal({
                    show: true,
                    backdrop: 'static',
                    keyboard: false
                });
                $("#btnGuardar").show();
                $("#btnActualizar").hide();
                $("#btnEliminar").hide();
                $('#alertDescripcion').hide();
                $('#alertTitle').hide();
                $('#title').removeClass('is-invalid');
                $('#descripcion').removeClass('is-invalid');
                $('#title').prop('disabled', false);
                $('#descripcion').prop('disabled', false);
                $('#fechaVencida').hide();
                $('#start').prop('disabled',false);

            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pueden agregar citas de fechas anteriores a la actual.',
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Aceptar!",
                    allowOutsideClick: false
                });
            }
        },
        eventClick:function(info){
            var evento = info.event;
            $('#alertDescripcion').hide();
            $('#alertTitle').hide();
            $('#title').removeClass('is-invalid');
            $('#descripcion').removeClass('is-invalid');                

            axios.post('/citas/editar/'+evento.extendedProps.idCita).then((respuesta) => {
                    
                    formulario.idUser.value = respuesta.data.idUser;
                    formulario.idCita.value = respuesta.data.idCita;
                    formulario.descripcion.value = respuesta.data.motivo_cita;
                    formulario.title.value = respuesta.data.titulo;
                    formulario.start.value = respuesta.data.start;
                    formulario.end.value = respuesta.data.end;

                    if (rol.value == 'admin') {
                        formulario.idUser.value = respuesta.data.idUser;
                        formulario.idUser.display = respuesta.data.usuario;
                    }else{

                        console.log(rol.value);
                    }


                    $('#cita').modal({
                        show: true,
                        backdrop: 'static',
                        keyboard: false
                    });
                    $("#btnGuardar").hide();
                    if((hoy <= respuesta.data.start && rol.value == 'user') || rol.value !== 'user'){
                        $("#btnEliminar").show();
                        $("#btnActualizar").show();
                        $('#title').prop('disabled', false);
                        $('#descripcion').prop('disabled', false);
                        $('#start').prop('disabled',false);
                        $('#fechaVencida').hide();
                    }else{
                        $("#btnActualizar").hide();
                        $("#btnEliminar").hide();
                        $('#title').prop('disabled', true);
                        $('#descripcion').prop('disabled', true);
                        $('#start').prop('disabled',true);
                        $('#fechaVencida').show();
                    }
                    
                }).catch(error => {
                    if(error.response){
                        console.log(error.response.data);
                    } 
                });
        }
    });
    calendar.render();

    document.getElementById('btnGuardar').addEventListener("click", function(){
        const datos = new FormData(formulario);

        axios.post('/citas/crear', datos).then((respuesta) => {
            Swal.fire({
                title: "Excelente",
                text: "La cita se creó correctamente.",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Aceptar!",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    calendar.refetchEvents();
                    $('#cita').modal('hide'); 
                }
            });
        }).catch(error => {
            if(error.response){
                if(error.response.data.errors.title){
                    $('#title').addClass('is-invalid');
                    $('#alertTitle').append('<small>El campo titulo es obligatorio.</small>');
                    $('#alertTitle').show();
                }else{
                    $('#alertTitle').hide();
                    $('#title').removeClass('is-invalid');
                }
                
                if(error.response.data.errors.descripcion){
                    $('#descripcion').addClass('is-invalid');
                    $('#alertDescripcion').append('<small>'+error.response.data.errors.descripcion+'</small>');
                    $('#alertDescripcion').show();
                }else{
                    $('#alertDescripcion').hide();
                    $('#descripcion').removeClass('is-invalid');
                }
            }
        });
    });

    document.getElementById('btnActualizar').addEventListener("click", function(){
        const datos = new FormData(formulario);
        console.log(formulario.start.value);

        if((hoy <= formulario.start.value && rol.value == 'user')|| rol.value !== 'user'){

            axios.post('/citas/actualizar/'+formulario.idCita.value, datos).then((respuesta) => {
                Swal.fire({ 
                    title: "Excelente",
                    text: "La cita se ha actualizado correctamente.",
                    icon: "success",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Aceptar!",
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        calendar.refetchEvents();
                        $('#cita').modal('hide'); 
                    }
                });
            }).catch(error => {
                if(error.response){
                    if(error.response){
                        if(error.response.data.errors.title){
                            $('#title').addClass('is-invalid');
                            $('#alertTitle').append('<small>El campo titulo es obligatorio.</small>');
                            $('#alertTitle').show();
                        }else{
                            $('#alertTitle').hide();
                            $('#title').removeClass('is-invalid');
                        }
                        
                        if(error.response.data.errors.descripcion){
                            $('#descripcion').addClass('is-invalid');
                            $('#alertDescripcion').append('<small>'+error.response.data.errors.descripcion+'</small>');
                            $('#alertDescripcion').show();
                        }else{
                            $('#alertDescripcion').hide();
                            $('#descripcion').removeClass('is-invalid');
                        }
                    }
                }
            });
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pueden agregar citas de fechas anteriores a la actual.',
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Aceptar!",
                allowOutsideClick: false
            });
        }
    });
    
    document.getElementById('btnEliminar').addEventListener("click", function(){
        const datos = new FormData(formulario);
        
        axios.post('/citas/borrar/'+formulario.idCita.value, datos).then((respuesta) => {
            Swal.fire({
                title: "Excelente",
                text: "La cita se ha borrado satisfactoriamente.",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Aceptar!",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    calendar.refetchEvents();
                    $('#cita').modal('hide'); 
                }
            });
        }).catch(error => {
            if(error.response){
                console.log(error.response.data);
            }
        });
    });

});