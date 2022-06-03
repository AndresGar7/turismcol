//VARIABLES GLOBALES
const enviar = document.getElementById('enviar');
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const select = document.getElementById('producto');
const checks = document.querySelectorAll('.cajaPresupuesto input[type="checkbox"]');
const pres = document.querySelector('.cajaPresupuesto');
const descuento = document.getElementById('grupo_descuento');

// ESTAS SON LAS CONSTANTES PARA EL VALOR DE LOS EXTRAS QUE VA A TENER EL PRODUCTO
const valorExtras = {
    extra1:10,
    extra2:25,
    extra3:15,
    extra4:50,
} 

//ESTAS SON LAS CONSTANTES PARA PODER VALIDAR LOS CAMPOS DE LA PAGINA PRESUPUESTO
const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{4,15}$/, // Letras y espacios, pueden llevar acentos.
    apellidos: /^[a-zA-ZÀ-ÿ\s]{4,40}$/, // Letras y espacios, pueden llevar acentos.
	correo: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/, // Que sea un correo valido.
	telefono: /^(6|7|8|9)[0-9]{8}$/, // Numero inicial Mayor a 6 hasta 9 y con longitud de 9 digitos
    plazo: /^[1-9]\d{0,2}$/ // Mayor de 1 a 999 dias.
}
const campos = {
    nombre: false,
    apellidos: false,
    correo: false,
    telefono: false,
    plazo: false,
    producto: false
}


// FUNCION QUE SE ENCARGADA DE VERIFCAR EL CAMPO QUE SE ESTA LLENANDO
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
        break;
        case "apellidos":
            validarCampo(expresiones.apellidos, e.target, 'apellidos');
        break;
        case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono');
        break;
        case "correo":
            validarCampo(expresiones.correo, e.target, 'correo');
        break;
        case "plazo":
            validarCampo(expresiones.plazo, e.target, 'plazo');
        break;
    }
}

//FUNCION QUE SE ENCARGA DE RESALTAR LOS INPUTS Y MOSTRAR LOS MENSAJES
const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.getElementById(`grupo_${campo}`).classList.remove('formulario_grupo-incorrecto');
        document.getElementById(`grupo_${campo}`).classList.add('formulario_grupo-correcto');
        document.querySelector(`#grupo_${campo} .formulario_grupo-input .icon`).classList.add('fa-circle-check');
        document.querySelector(`#grupo_${campo} .formulario_grupo-input .icon`).classList.remove('fa-circle-xmark');
        document.querySelector(`#grupo_${campo} .formulario_input-error`).classList.remove('formulario_input-error-activo');
        campos[campo] = true;
    }else {
        document.getElementById(`grupo_${campo}`).classList.remove('formulario_grupo-correcto');
        document.getElementById(`grupo_${campo}`).classList.add('formulario_grupo-incorrecto');
        document.querySelector(`#grupo_${campo} .formulario_grupo-input .icon`).classList.add('fa-circle-xmark');
        document.querySelector(`#grupo_${campo} .formulario_grupo-input .icon`).classList.remove('fa-circle-check');
        document.querySelector(`#grupo_${campo} .formulario_input-error`).classList.add('formulario_input-error-activo');
        campos[campo] = false;
    }
}


//FUNCION QUE SE ENCARGA DE VALIDAR LOS CAMPOS DEL PRESUPUESTO
pres.addEventListener('change', (e) => {

    if(select.value !== '0' ){
        $('#plazo').prop('disabled', false);
        $('#presupuesto').prop('disabled', false);
        $('#plazo').removeClass('deshabilitar');
        $('#plazo').addClass('habilitar');
        
        if(document.getElementById('plazo').value !== '' && document.getElementById('plazo').value > '0'){
            var suma = 0 ;
            var valor = 0;
            var descue = 0;
            $('#grupo_descuento').removeClass('grupo-descuento');
            $('#grupo_descuento').removeClass('grupo-sinDescuento-mostrar');
            $('#grupo_descuento').addClass('grupo-descuento-mostrar');

            checks.forEach((check) => {
                $(`#${check.name}`).removeAttr("disabled");
                if(check.checked){
                    valor += valorExtras[check.name];
                }
            }); 

            suma = parseInt(select.value) + parseInt(valor);
            descuento.innerHTML = ``;

            if(document.getElementById('plazo').value > 0 && document.getElementById('plazo').value <= 3){
                descue = suma * 0.3;
                descuento.innerHTML = `<div class="formulario_grupo-descuento">De 1 a 3 días de plazo tendrá un descuento del 30% en su producto.</div>`;
            }else if(document.getElementById('plazo').value >= 4 &&document.getElementById('plazo').value <= 6){
                descue = suma * 0.2;
                descuento.innerHTML = `<div class="formulario_grupo-descuento">De 4 a 6 días de plazo tendrá un descuento del 20% en su producto.</div>`;
            }else if(document.getElementById('plazo').value >= 6 &&document.getElementById('plazo').value <= 10){
                descue = suma * 0.1;
                descuento.innerHTML = `<div class="formulario_grupo-descuento">De 6 a 10 días de plazo tendrá un descuento del 10% en su producto.</div>`;
            }else{
                descuento.innerHTML = `<div class="formulario_grupo-descuento">Mayor a 10 días de plazo no se aplicara ningún descuento en su producto.</div>`;
                $('#grupo_descuento').removeClass('grupo-descuento');
                $('#grupo_descuento').removeClass('grupo-escuento-mostrar');
                $('#grupo_descuento').addClass('grupo-sinDescuento-mostrar');
            }

            suma = suma - descue;
            $('#presupuesto').val(suma + ' €');

        }else {
            descuento.innerHTML = ``;
            $('#grupo_descuento').addClass('grupo-descuento');
            $('#grupo_descuento').removeClass('grupo-descuento-mostrar');
            $('#grupo_descuento').removeClass('grupo-sinDescuento-mostrar');
            checks.forEach((check) => { 
                $(`#${check.name}`).prop('disabled', true);
            });
            $('#presupuesto').val('0 €');
        }
    }else {
        $('#plazo').prop('disabled', true);
        $('#plazo').addClass('deshabilitar');
        $('#plazo').removeClass('habilitar');
        $('#presupuesto').prop('disabled', true);
        $('#mensaje-error').removeClass('formulario_input-error-activo');
        $('#grupo_plazo').removeClass('formulario_grupo-incorrecto');
        $('#grupo_plazo').removeClass('formulario_grupo-incorrecto');
        $('#grupo_descuento').addClass('grupo-descuento');
        $('#grupo_descuento').removeClass('grupo-descuento-mostrar');
        $('#grupo_descuento').removeClass('grupo-sinDescuento-mostrar');

        checks.forEach((check) => { 
            $(`#${check.name}`).prop('disabled', true);
        });
        
        $('#presupuesto').val('0 €');
    }
});

// EN ESTA PARTE SE VERIFICA SI ALGUN INPUT DEL FORMULARIO ESTAN ESCRIBIENDO ALGUNA TECLA O CUANDO SE DA CLICK  TAMBIEN SE VALIDA TODOS LOS INPUTS
inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});



// EN ESTA PARTE SE VERIFICA QUE EL VALOR DE SELECT SEA DIFERENTE AL INICIAL PARA PODER REALIZAR LOS CALCULOS DEL PRESUEPUESTO
select.addEventListener('change', (e) => {
    if(e.target.value !== '0'){
        document.getElementById(`grupo_${e.target.name}`).classList.remove('formulario_grupo-incorrecto');
        document.getElementById(`grupo_${e.target.name}`).classList.add('formulario_grupo-correcto');
        document.querySelector(`#grupo_${e.target.name} .formulario_grupo-input .icon`).classList.add('fa-circle-check');
        document.querySelector(`#grupo_${e.target.name} .formulario_grupo-input .icon`).classList.remove('fa-circle-xmark');
        document.querySelector(`#grupo_${e.target.name} .formulario_input-error`).classList.remove('formulario_input-error-activo');
        campos[e.target.name] = true;
    }else{
        document.getElementById(`grupo_${e.target.name}`).classList.remove('formulario_grupo-correcto');
        document.getElementById(`grupo_${e.target.name}`).classList.add('formulario_grupo-incorrecto');
        document.querySelector(`#grupo_${e.target.name} .formulario_grupo-input .icon`).classList.add('fa-circle-xmark');
        document.querySelector(`#grupo_${e.target.name} .formulario_grupo-input .icon`).classList.remove('fa-circle-check');
        document.querySelector(`#grupo_${e.target.name} .formulario_input-error`).classList.add('formulario_input-error-activo');
        campos[e.target.name] = false;
    }
});

// FUNCION ENCARGADA DE  REALIZAR EL ENVIO DE LOS DATOS SI SE OPRIME LA TECLA ENVIAR Y TODOS LOS CAMPOS SE ENCUENTRAN CORRECTAMENTE DILIGENCIADOS
formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    const terminos = document.getElementById('terminos');
    if(campos.nombre && campos.apellidos && campos.telefono && campos.correo && terminos.checked && campos.plazo && campos.producto){
        formulario.reset();
        $('#grupo_descuento').addClass('grupo-descuento');
        $('#grupo_descuento').removeClass('grupo-descuento-mostrar');
        $('#grupo_descuento').removeClass('grupo-sinDescuento-mostrar');
        document.querySelectorAll('.formulario_grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario_grupo-correcto');
        });

        swal({
            title: "Correcto!",
            text: "Formulario diligenciado exitosamente!",
            icon: "success",
            button: "Aceptar",
        })
        .then((value) => {
            document.getElementById('formulario_mensaje-exito').classList.add('formulario_mensaje-exito-activo');
            setTimeout(() => {
                document.getElementById('formulario_mensaje-exito').classList.remove('formulario_mensaje-exito-activo');
            }, 5000);

            document.getElementById('formulario_mensaje').classList.remove('formulario_mensaje-activo');

            campos['nombre'] = false;
            campos['apellidos'] = false;
            campos['correo'] = false;
            campos['telefono'] = false;
            campos['plazo'] = false;
            campos['producto'] = false;
        });

    }else {
        swal({
            title: "Error!",
            text: "El formulario se encuentra mal diligenciado!",
            icon: "error",
            button: "Aceptar",
            dangerMode: true,
        })
        .then((value) => {
            document.getElementById('formulario_mensaje').classList.add('formulario_mensaje-activo');
        })
    }
});