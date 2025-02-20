<?php
session_start();
require_once "database.php"; 


$url = isset($_GET['url']) ? $_GET['url'] : '';

switch ($url) {
    case 'register':
        include "register.php";
        break;
    case 'login':
        include "login.php";
        break;
    case 'dashboard':
        include "dashboard.php";
        break;
    case 'produtos':
        include "produtos.php";
        break;
    case 'carrinho':
        include "carrinho.php";
        break;
    case 'checkout':
        include "checkout.php";
        break;
    case 'logout':
        include "logout.php";
        break;
}
