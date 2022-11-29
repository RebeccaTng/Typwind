<?php function potato(){
    $session=session();
    $session->set('isLoggedIn',FALSE);
    $session->set('firstname','potato potato');
}?>