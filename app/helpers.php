<?php

function setActive($routeName)
{
    // return $routeName;
    // return request();   
    return request()->routeIs($routeName) ? 'active' : '' ;
}