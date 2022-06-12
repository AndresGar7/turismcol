//FUNCION ENCARGADA DE DEJAR PEGADA LA BARRA DEL MENU DE LA PAGINA CUANDO SE MUEVA EL SCROLL HACIA ABAJO
$(document).ready(function(){
    var altura = $('.menu').offset().top;
    
    $(window).on('scroll', function(){
        if($(window).scrollTop() > altura){
            $('.menu').addClass('menu-fixed');
            $('.menu').addClass('shadow-sm');
        }else{
            $('.menu').removeClass('menu-fixed'); 
            $('.menu').removeClass('shadow-sm');  
        }
    });
});

$(document).ready(function() {
} );
$('#example').DataTable();

// //FUNCION QUE SE ENCARGA DE CAMBIAR LAS FOTOS  Y NOMBRES DE LA GALERIA SEGUN EL DEPARTAMENTO QUE SE SELECCIONE

function traerFotos (dato){
    var nombre = [];
    
    document.getElementById(dato).checked = true;

    nombre = ['Guatape','Bosko','MetroCable','Hacienda Napoles']; // 

    for (i = 1; i<=4; i++){
        document.getElementById('foto' + i).src='../img/'+ dato + i + '.jpg';
    }

    if(dato == 'Antioquia'){
        nombre = ['Guatape','Bosko','MetroCable','Hacienda Napoles'];
    }else if(dato == 'San_Andres'){
        nombre = ['Morgan`s Head','Buceo Aquanautas','Johnny Cay','Cayo Bolívar'];
    }else if(dato == 'Bolivar'){
        nombre = ['Islas del Rosario','Castillo San Felipe de Barajas','Archipiélago San Bernardo','Torre del Reloj'];
    }else if(dato == 'Quindio'){
        nombre = ['Valle del Cocora','Parque del Café','Parque Los Arrieros','Nevado del Quindio'];
    }else if(dato == 'Cundinamarca'){
        nombre = ['Catedral de Sal','Termales Los Volcanes','Laguna de Guatavita','Salto del Tequendama'];
    }else if(dato == 'Magdalena'){
        nombre = ['Parque Tayrona','Ciudad Perdida','Pozo Azul','Bahia Concha'];
    }else if(dato == 'Guajira'){
        nombre = ['Punta Gallinas','Peninsula la Guajira','Dunas del Taroa','Playas de Mayapo'];
    }else if(dato == 'Choco'){
        nombre = ['La Coquerita','Capurgana','Bahía el Aguacate','Playa el Almejal'];
    }

    for (i = 0; i<=4; i++){
        document.getElementById('nombre' + i).innerHTML=nombre[i];
    }

}

// //FUNCION ENCARGADA DE CAMBIAR EL CONTENIDO QUE SE MUESTRA EN LA PARTE DE CONTACTOS SOBRE LA MISION, VISION  Y NOSOTROS.
// function contenido (valor){
//     if(valor === 'mision'){
//         document.getElementById("mision").classList.add("eleccion");
//         document.getElementById("vision").classList.remove("eleccion");
//         document.getElementById("nosotros").classList.remove("eleccion");
//         document.getElementById('contenido').innerHTML = "Brindar a nuestros clientes una experiencia unica y maravillosa a medida que conocen nuetro territorio lleno de riquezas en cuanto a la fauna y flora, al igual que nuestros hermosos paisajes.";
//     }else if (valor === 'vision'){
//         document.getElementById("vision").classList.add("eleccion");
//         document.getElementById("mision").classList.remove("eleccion");
//         document.getElementById("nosotros").classList.remove("eleccion");
//         document.getElementById('contenido').innerHTML = "Queremos ser una de las mejores y principales empresas de Colombia en ofrecer turismo a nivel mundial acerca de nuestro territorio nacional, en donde nuestros clientes van a vivir muchas experiencias y querran volver siempre a Colombia.";
//     }else {
//         document.getElementById("nosotros").classList.add("eleccion");
//         document.getElementById("mision").classList.remove("eleccion");
//         document.getElementById("vision").classList.remove("eleccion");
//         document.getElementById('contenido').innerHTML = "Somos una empresa seria y muy responsable con los clientes que quieren utilizar nuestros servicios para poder conocer los grandiosos lugares que ofrecemos dentro de nuestr linda Colombia.";
//     }   
// }

//FUNCION ENCARGADA DE REALIZAR LA CONEXION  CON EL ARCHIVO JSON QUE CONTIENE LAS NOTICIAS
function traerDatos(){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200){
            mostrarDatos(this);
        }
    };
    xhttp.open("GET","../json/noticias.json", true);
    xhttp.send(null);
}

//FUNCION ENCARGADA DE MOSTRAR LAS NOTICIAS EN LA PAGINA
function mostrarDatos(json){
    let datos = JSON.parse(json.responseText);
    let indice1 = '1';
    let indice2 = '0';
    let cantidad = 0;
    

    for(let item1  of datos){
        
        if(item1.prioridad == '1'){
            let res =  document.querySelector('#fondoNoticia'+indice1);
            res.innerHTML = '';
            
            res.innerHTML += `
                <div class="iniNoticia" id="noticia${indice1}">
                    <img src="../img/noticia${indice1}.jpg" alt="${item1.nameImagen}">
                    <div class="subir" id="subir${indice1}">
                        <h3>${item1.titulo}</h3>
                        <div class="fechaNoticia">
                            ${item1.fecha}
                        </div>
                        <div class="contenidoNoticia-primaria">
                            ${item1.resumen}
                        </div>
                    </div>
                </div>
                <div class="leerMas" id="leerMas${indice1}">
                    LEER MAS >
                </div>
            `;
            indice1++;           
        }        
    }

    indice2 =  indice1;

    for(let item of datos){
        if(item.prioridad == '2'){
            cantidad++;
        }
    }

    for( var i = 1; i < cantidad+1; i++){
        let res = document.querySelector('#notSecundarias');

        res.innerHTML += `<a href="#" class="cajaAltaNoticia" onmouseover="moverTitulo('${indice1}')" onmouseout="regresarTitulo('${indice1}')" id="fondoNoticia${indice1}"></a>`;
        indice1++;
    }   

    for(let item2 of datos){

        if(item2.prioridad == '2'){
            let res2 = document.querySelector('#fondoNoticia'+indice2);
            res2.innerHTML = '';

            res2.innerHTML = `
                <div class="iniNoticia2" id="noticia${indice2}">
                    <img src="../img/noticia${indice2}.jpg" alt="${item2.nameImagen}">
                    <div class="subir" id="subir${indice2}">
                        <h3>${item2.titulo}</h3>
                        <div class="fechaNoticia">
                            ${item2.fecha}
                        </div>
                        <div class="contenidoNoticia-secundaria">
                            ${item2.resumen}
                        </div>
                    </div>
                </div>
                <div class="leerMas" id="leerMas${indice2}">
                    LEER MAS >
                </div>
            `;
            indice2++;
        }
    }
}

// // AL PONER EL CURSOR DEL MOUSE SOBRE EL BLOQUE DE LA NOTICIA ACTIVARA VARIAS EFECTOS VISUALES 
// // PARA INDICAR QUE SE ESTA SELECCIONANDO ESE BLOQUE O NOTICIA EN ESPECIFICO
// function moverTitulo(valor){
//     //ESTAS SON LOS EFECTOS QUE SE LE DAN A LAS NOTICIAS PRIMARIAS
//     $("#noticia"+valor).css('background-color','white');    
//     $("#noticia"+valor).css('box-shadow','0px 0px 10px #000000');
//     $("#leerMas"+valor).css('font-size','2.5vw');
//     $("#leerMas"+valor).css('margin-top','-3.3vw');
//     $("#leerMas"+valor).css('color','green');
// }

// //REGRESA EL BLOQUE A SU ESTADO INICIAL CON UN POCO DE EFECTO
// function regresarTitulo(valor){
//     //ESTAS SON LOS EFECTOS QUE SE LE DAN A LAS NOTICIAS PRIMARIAS
//     $("#noticia"+valor).css('background-color','transparent');
//     $("#noticia"+valor).css('box-shadow','0px 0px 0px #000000');
//     $("#leerMas"+valor).css('font-size','1vw');
//     $("#leerMas"+valor).css('margin-top','-3.3vw');
//     $("#leerMas"+valor).css('color','black');
// }

