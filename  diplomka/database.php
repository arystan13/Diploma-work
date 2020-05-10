<?php

require 'assets/libs/rb.php';

R::setup( 'mysql:host=localhost;dbname=diplom_db', 'root', '1234' );

session_start();

if( !R::testConnection() ) {
    exit('Нет подключение к базам данных!');
}

?>
