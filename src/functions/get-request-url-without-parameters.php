<?php
function get_request_url_without_parameters(){
    $withoutParameters = substr($_SERVER['REQUEST_URI'],0, strpos($_SERVER['REQUEST_URI'],'?') ? : -1);
    return get_site_url() . '/'. trim($withoutParameters, '/');
}