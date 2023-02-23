<div class="container-fluid bg-primary shadow">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 col-sm-12 py-0">
                <h2 class="fs-5 py-2 sombra-title text-white"><strong>Nuesta Oficina Central</strong></h2>
                <ul class="list-unstyled">
                    <li class="d-flex correr-r-md"><i class="fa-solid fa-location-dot my-1 mx-1"></i><p>C. Carreteria, #XX / Málaga</p></li>
                    <li class="d-flex correr-r-md"><i class="fa-solid fa-phone my-1 mx-1"></i><p>+34 604168308</p></li>
                    <li class="d-flex correr-r-md"><i class="fa-solid fa-envelope my-1 mx-1"></i><p>eddy_gc07@hotmail.com</p></li>
                    <li class="d-flex correr-r-md"></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 py-0">
                <h2 class="fs-5 py-2 sombra-title text-white"><strong>Aviso Legal</strong></h2>
                <ul class="list-unstyled">
                    <li class="d-flex correr-r-md"><a class="mostrar-link" href="#"><i class="fa-solid fa-angle-right me-2 mt-1"></i>Politica De Derechos</a></li>
                    <li class="d-flex correr-r-md"><a class="mostrar-link" href="#"><i class="fa-solid fa-angle-right me-2 mt-1"></i>Politica De Privacidad</a></li>
                    <li class="d-flex correr-r-md"><a class="mostrar-link" href="#"><i class="fa-solid fa-angle-right me-2 mt-1"></i>Politica De Cookies</a></li>
                    <li class="d-flex correr-r-md"><a class="mostrar-link" href="#"><i class="fa-solid fa-angle-right me-2 mt-1"></i>Términos y condiciones</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 py-0">
                <h2 class="fs-5 py-2 sombra-title text-white"><strong>Enlaces Populares</strong></h2>
                <ul class="list-unstyled">
                    <li class="d-flex correr-r-md"><a class="mostrar-link" href="#"><i class="fa-solid fa-angle-right me-2 mt-1"></i>Más Sobre Nosotros</a></li>
                    <li class="d-flex correr-r-md"><a class="mostrar-link" href="#"><i class="fa-solid fa-angle-right me-2 mt-1"></i>Contactanos</a></li>
                    <li class="d-flex correr-r-md"><a class="mostrar-link" href="#"><i class="fa-solid fa-angle-right me-2 mt-1"></i>Lugares Favoritos</a></li>
                    <li class="d-flex correr-r-md"><a class="mostrar-link" href="#"><i class="fa-solid fa-angle-right me-2 mt-1"></i>Promociones</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 py-0">
                <h2 class="fs-5 py-2 sombra-title text-white"><strong>Boletin Informativo</strong></h2>
                <input type="email" class="form-control" id="email_boletin" placeholder="Ingrese su E-mail">
                <br>
                <button class="btn btn-secondary form-control position-relative" id="enviar_boletin" onclick="enviarBoletin()">Enviar</button>
                <p>!No te preocupes, no hacemos spam¡</p>
            </div>
        </div>
        <p class="m-0 py-1 text-center" style="font-size: 1vw;"><strong>{{ config('app.name') }}</strong> | Copyright @ {{ date('Y') }}</p>
        <br>
    </div>
</div>
