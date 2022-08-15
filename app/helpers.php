<?php
//FUNCION UTILIZADA PARA DEJARA SELECCIONADA O RESALTADA LA RUTA SOBRE LA CUAL SE ESTA NAVEGANDO EN EL MOMENTO
function setActive($routeName)
{ 
    return request()->routeIs($routeName) ? 'active' : '' ;
}