<?php 
use Config\Services;
function LoggedIn(){
    $session=Services::session();
    if($session->has('isLoginUserAdmin') AND $session->get('isLoggedIn')){
        return true;
    }
    return false;
}