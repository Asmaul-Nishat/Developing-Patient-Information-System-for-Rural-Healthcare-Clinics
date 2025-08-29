<?php
session_start();

function checkLogin(){
    if(!isset($_SESSION['user_id'])){
        header('Location: ../login.php');
        exit;
    }
}

function checkRole($role){
    if(!isset($_SESSION['role']) || $_SESSION['role'] !== $role){
        header('Location: ../index.php');
        exit;
    }
}

// Flash messages
function setFlash($type, $message){
    $_SESSION['flash'] = ['type'=>$type, 'message'=>$message];
}

function getFlash(){
    if(isset($_SESSION['flash'])){
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}
?>
