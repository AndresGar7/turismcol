//PUNTO DE LAS COORDENADAS EXACTAS DE DONDE SE UBICA LA EMPRESA Y EL TIPO DE MAPA QUE QUIERO USAR
var myLatLng = { lat: 36.72263660765616, lng: -4.424550244070523 };
var mapOptions = {
    center: myLatLng,
    zoom: 8,
    mapTypeId: google.maps.MapTypeId.ROADMAP

};

//CREA O SE GENERA EL MAPA EN LA PAGINA
var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
var marker = new google.maps.Marker({
    position: myLatLng,
    map,
    title: 'TurismCol'
});

//CREA UNA VENTANA CON LA INFORMACIÓN DE LA EMPRESA ENCIMA DE LA MARCA QUE SE INDICA EN EL MAPA
var infoWindow = new google.maps.InfoWindow({
    content:'<h4 style="font-weight: bold;text-decoration-line: underline;">TurismCol</h4><div style="font-size:0.7vw;">Tel: 604168308<br>eddy_gc07@hotmail.com<br>C. Carreteria, 22<br>Málaga Centro<br>29008</div>'
});

infoWindow.open(map, marker);

marker.addListener('click',  function(){
    infoWindow.open(map, marker);
});
//CREA UN OBJETO DIRECTIONSSERVICE PARA USAR EL METODO DE RUTA Y OBTENER UN RESULTADO PARA NUESTRA SOLICITUD
var directionsService = new google.maps.DirectionsService();

//CREA UN OBJETO DIRECTIONSRENDERER QUE SE USARA PARA MOSTRAR LA RUTA DEL CLIENTE AL PUNTO DE LA EMPRESA
var directionsDisplay = new google.maps.DirectionsRenderer();

//SE ENLAZA EL DIRECTIONSRENDERER AL MAPA
directionsDisplay.setMap(map);


//FUNCION ENCARGADA DE REALIZAR EL CALCULO DEL PUNTO DEL CLIENTE AL PUNTO DE LA EMPRESA
function calcRoute() {

    var request = {
        origin: document.getElementById("from").value,
        destination: myLatLng,
        //SE CALCULA LA RUTA CONDUCIENDO UN VEHICULO
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.IMPERIAL
    }

    //SE PASA LA SOLICITUD AL METODO DE LA RUTA
    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {

            //SE OBTIENE LA DISTANCIA Y EL TIEMPO
            const output = document.querySelector('#output');
            output.innerHTML = "<div class='alert_info'>Desde(A): " + document.getElementById("from").value + ".<br />Hacia(B): TurismCol (" + document.getElementById("to").value + ").<br /> Distancia Manejando <i class='ruta-icon-alert fas fa-road'></i> : " + result.routes[0].legs[0].distance.text + ".<br />Duración <i class='ruta-icon-alert fas fa-hourglass-start'></i> : " + result.routes[0].legs[0].duration.text + ".</div>";

            //SE MUESTRA LA RUTA
            directionsDisplay.setDirections(result);
        } else {
            //BORRA LA RUTA DEL MAPA
            directionsDisplay.setDirections({ routes: [] });
            map.setCenter(myLatLng);

            //SE MUESTRA MENSAJE DE ERROR SINO SE PUEDE CALCULAR LA RUTA
            output.innerHTML = "<div class='alert_danger'><i class='ruta-icon fas fa-exclamation-triangle'></i> No se pudo calcular la distancia de conducción.</div>";
        }
    });

}



//SE CREA UN OBJETO PARA AUTOCOMPLETAR EL VALOR QUE INGRESA EL CLIENTE
var options = {
    types: ['(cities)']
}

var input1 = document.getElementById("from");
var autocomplete1 = new google.maps.places.Autocomplete(input1, options);

var input2 = document.getElementById("to");
var autocomplete2 = new google.maps.places.Autocomplete(input2, options);
